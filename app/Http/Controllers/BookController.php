<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\DoctorSession;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Patient;
use App\Models\Specialization;
class BookController extends Controller
{
    //
    public function index($id)
    {
        // $doctor = Doctor::where('user_id', $id)->first();
        // $doctor_id = $doctor->id;
        // $service = Service::with('serviceDoctors')->whereHas('serviceDoctors', function ($q) use ($doctor_id) {
        //     $q->where('doctor_id', $doctor_id)->whereStatus(Service::ACTIVE);
        // })->get()->toArray();
        // $outletServices = array_chunk($service, 2);     

        $data = [];
        $serviceCategories = ServiceCategory::with('activatedServices')->withCount('services')->get();
        $setting = Setting::pluck('value', 'key')->toArray();
        $services = Service::with('media')->whereStatus(Service::ACTIVE)->latest()->get();
        return view('book_slot.index', compact('serviceCategories', 'setting', 'services'));

    }
}
