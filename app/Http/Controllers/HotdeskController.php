<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\Appointment;
use Illuminate\Support\Arr;
use App\Repositories\AppointmentRepository;
use App\Models\Patient;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\DoctorSession;
class HotdeskController extends Controller
{
     /** @var AppointmentRepository */
     private $appointmentRepository;

     public function __construct(AppointmentRepository $appointmentRepo)
     {
         $this->appointmentRepository = $appointmentRepo;
     }

    public function index($slot,$id)
    {
        $user = User::where('id',$slot)->first();
        $doctor = Doctor::where('user_id', $slot)->first();
        $servicesData = Service::where('id', $id)->first();
        $serviceSpecializations = DB::table('service_specialization')->where('service_id', $id)->get();
        $aa = [];
        foreach($serviceSpecializations as $getData){
            array_push($aa,$getData->specialization_id); 
        }  
        $specialization = Specialization::with('media')->whereIn('id', $aa)->get();
        $allPaymentStatus = getAllPaymentStatus();
        $paymentStatus = Arr::except($allPaymentStatus, [Appointment::MANUALLY]);
        $paymentGateway = getPaymentGateway();
        $data = $this->appointmentRepository->getData();
        $data['status'] = Appointment::BOOKED_STATUS_ARRAY;
        // $patient = Patient::where('user_id', getLogInUserId())->get();
        $faqs = Faq::latest()->get();

        $appointmentDoctors = Doctor::with('user')->whereIn('id',
            DoctorSession::pluck('doctor_id')->toArray())->get()->where('user.status',
            User::ACTIVE)->pluck('user.full_name', 'id');
        $aboutTitle = Setting::where('key', 'about_title')->first();
        $aboutShortDescription = Setting::where('key', 'about_short_description')->first();
        $abouTimage1 = Setting::where('key', 'about_image_1')->first();
        return view('hotdesk.index', compact('data','user','doctor','faqs','appointmentDoctors','servicesData','specialization','allPaymentStatus', 'paymentGateway', 'paymentStatus','aboutTitle','aboutShortDescription','abouTimage1'));
    }
}
