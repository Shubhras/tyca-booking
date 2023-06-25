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
use DB;
class BookController extends Controller
{
    //
    public function index($id)
    {
        $user = User::where('id',$id)->first();
        $doctor = Doctor::where('user_id', $id)->first();
        $servicesID = DB::table('service_doctor')->where('doctor_id',$doctor->id)->get();
        $aa = [];
        foreach($servicesID as $getData){
            array_push($aa,$getData->service_id); 
        }  
        $doctorSpecialization = DB::table('doctor_specialization')->where('doctor_id',$doctor->id)->get();
        $bb = [];
        foreach($doctorSpecialization as $getData){
            array_push($bb,$getData->specialization_id); 
        } 
        $user1 = User::with('media')->where('id',$id)->first();
        $specialization = Specialization::with('media')->whereIn('id', $bb)->get();

        $services = Service::with('media')->whereIn('id', $aa)->whereStatus(Service::ACTIVE)->latest()->get();
        return view('book_slot.index', compact('services','user','user1','doctor','specialization'));

    }
}
