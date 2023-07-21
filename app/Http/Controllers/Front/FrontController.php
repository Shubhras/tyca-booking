<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\AppBaseController;
use App\Models\ClinicSchedule;
use App\Models\Doctor;
use App\Models\DoctorSession;
use App\Models\Faq;
use App\Models\FrontPatientTestimonial;
use App\Models\Patient;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use stdClass;

class FrontController extends AppBaseController
{
    /**
     * @return Application|Factory|View
     */
    public function medical()
    {
        $doctors = Doctor::with('user', 'specializations')->whereHas('user', function (Builder $query) {
            $query->where('status', User::ACTIVE);
        })->latest()->take(10)->get();
        $sliders = Slider::with('media')->first();
        $frontMedicalServicesArray = Service::with('media')->whereStatus(Service::ACTIVE)->latest()->get()->toArray();
        $frontMedicalServices = array_chunk($frontMedicalServicesArray, 2);
        $frontPatientTestimonials = FrontPatientTestimonial::with('media')->latest()->take(6)->get();
        $appointmentDoctors = Doctor::with('user')->get()->where('user.status', User::ACTIVE)->pluck('user.full_name',
            'id');
        
        // $dataoutlet = DB::table('users')
        // ->leftjoin('doctors', 'doctors.user_id', '=', 'users.id')
        // ->leftjoin('service_doctor', 'service_doctor.doctor_id', '=', 'doctors.id')
        // ->leftjoin('services', 'services.id', '=', 'service_doctor.service_id')
        // ->select('users.id','users.first_name', 'users.last_name','users.status', 'services.charges', 'services.charges_daily')
        // ->where('users.type', '2')
        // ->groupBy('users.id')
        // ->get();

        
        // $outletUser = array();
        // foreach($dataoutlet as $datainformation){
        //     $userData = User::where('id', $datainformation->id)->first();
        //     //$dataObj = new \stdClass();
        //     $outletUse = array (
        //     "id" => $datainformation->id,
        //     "first_name" => $datainformation->first_name,
        //     "last_name" => $datainformation->last_name,
        //     "charges" => $datainformation->charges,
        //     "status" => $datainformation->status,
        //     "charges_daily" => $datainformation->charges_daily,
        //     "profile_image" => $userData->profile_image
        // );
        // array_push($outletUser, $outletUse);


            $dataoutlet = DB::table('users')
            ->leftjoin('doctors', 'doctors.user_id', '=', 'users.id')
            ->leftjoin('service_doctor', 'service_doctor.doctor_id', '=', 'doctors.id')
            ->leftjoin('services', 'services.id', '=', 'service_doctor.service_id')
            ->select('users.id', 'users.first_name', 'users.last_name', 'users.status', 
                DB::raw('MIN(services.charges) AS min_charges'), 
                DB::raw('MIN(services.charges_daily) AS min_charges_daily')
            )
            ->where('users.type', '2')
            ->groupBy('users.id', 'users.first_name', 'users.last_name', 'users.status')
            ->get();

            $outletUser = array();
            foreach($dataoutlet as $datainformation){
                $userData = User::where('id', $datainformation->id)->first();
            
                $outletUse = array (
                    "id" => $datainformation->id,
                    "first_name" => $datainformation->first_name,
                    "last_name" => $datainformation->last_name,
                    "charges" => $datainformation->min_charges, // Use the calculated minimum charges here
                    "status" => $datainformation->status,
                    "charges_daily" => $datainformation->min_charges_daily, // Use the calculated minimum charges_daily here
                    "profile_image" => $userData->profile_image
                );
            
                array_push($outletUser, $outletUse);
            }

        // echo "<pre>"; print_r($outletUser); die;
        $aboutExperience = Setting::where('key', 'about_experience')->first();
        $aboutTitle = Setting::where('key', 'about_title')->first();
        $aboutShortDescription = Setting::where('key', 'about_short_description')->first();
        $abouTimage1 = Setting::where('key', 'about_image_1')->first();
        $bodyimage1 = Setting::where('key', 'body_image')->first();
        return view('fronts.medicals.index',
            compact('doctors', 'sliders', 'frontMedicalServices', 'frontPatientTestimonials',
                'appointmentDoctors', 'aboutExperience','userData','outletUser','aboutTitle','aboutShortDescription','abouTimage1','bodyimage1'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalAboutUs()
    {
        $data = [];
        $data['doctorsCount'] = Doctor::with('user')->get()->where('user.status', true)->count();
        $data['patientsCount'] = Patient::get()->count();
        $data['servicesCount'] = Service::whereStatus(true)->get()->count();
        $data['specializationsCount'] = Specialization::get()->count();
        $clinicSchedules = ClinicSchedule::all();
        $setting = Setting::where('key', 'about_us_image')->first();
        $frontPatientTestimonials = FrontPatientTestimonial::with('media')->latest()->take(6)->get();
        $doctors = Doctor::with('user', 'appointments', 'specializations')->whereHas('user', function (Builder $query) {
            $query->where('status', User::ACTIVE);
        })->withCount('appointments')->orderBy('appointments_count', 'desc')->take(3)->get();

        return view('fronts.medical_about_us',
            compact('doctors', 'data', 'setting', 'clinicSchedules', 'frontPatientTestimonials'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalServices()
    {
        $data = [];
        $serviceCategories = ServiceCategory::with('activatedServices')->withCount('services')->get();
        $setting = Setting::pluck('value', 'key')->toArray();
        $services = Service::with('media')->whereStatus(Service::ACTIVE)->latest()->get();
        $data['doctorsCount'] = Doctor::with('user')->get()->where('user.status', true)->count();
        $data['patientsCount'] = Patient::get()->count();
        $data['servicesCount'] = Service::whereStatus(true)->get()->count();
        $data['specializationsCount'] = Specialization::get()->count();

        return view('fronts.medical_services', compact('serviceCategories', 'setting', 'services', 'data'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalAppointment()
    {
        $faqs = Faq::latest()->get();

        $appointmentDoctors = Doctor::with('user')->whereIn('id',
            DoctorSession::pluck('doctor_id')->toArray())->get()->where('user.status',
            User::ACTIVE)->pluck('user.full_name', 'id');

        return view('fronts.medical_appointment', compact('faqs', 'appointmentDoctors'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalDoctors()
    {
        $doctors = Doctor::with('specializations', 'user')->whereHas('user', function (Builder $query) {
            $query->where('status', User::ACTIVE);
        })->latest()->take(9)->get();

        return view('fronts.medical_doctors', compact('doctors'));
    }

    /**
     * @return Application|Factory|View
     */
    public function medicalContact()
    {
        $clinicSchedules = ClinicSchedule::all();

        return view('fronts.medical_contact', compact('clinicSchedules'));
    }

    /**
     * @return Application|Factory|View
     */
    public function termsCondition()
    {
        $termConditions = Setting::pluck('value', 'key')->toArray();

        return view('fronts.terms_conditions', compact('termConditions'));
    }

    /**
     * @return Application|Factory|View
     */
    public function privacyPolicy()
    {
        $privacyPolicy = Setting::pluck('value', 'key')->toArray();

        return view('fronts.privacy_policy', compact('privacyPolicy'));
    }

    /**
     * @return Application|Factory|View
     */
    public function faq()
    {
        $faqs = Faq::latest()->get();

        return view('fronts.faq', compact('faqs'));
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function changeLanguage(Request $request)
    {
        Session::put('languageName', $request->input('languageName'));

        return $this->sendSuccess(__('messages.flash.language_change'));
    }
}