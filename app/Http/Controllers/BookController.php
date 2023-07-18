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
use App\Models\Address;
use App\Models\Specialization;
use DB;
use Illuminate\Support\Facades\Session;


class BookController extends Controller
{
    //
    public function index($id)
    {
        $user = User::where('id',$id)->first();
        $doctor = Doctor::where('user_id', $id)->first();

        $addressData = DB::table('addresses')->where('owner_id',$id)
        ->leftjoin('countries', 'countries.id', '=', 'addresses.country_id')
        ->leftjoin('states', 'states.id', '=', 'addresses.state_id')
        ->leftjoin('cities', 'cities.id', '=', 'addresses.city_id')
        ->select('addresses.*','countries.name AS country_name','states.name AS state_name','cities.name AS cities_name')
        ->first();

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
        $bodyimage1 = Setting::where('key', 'body_image')->first();
        $specialization = Specialization::with('media')->whereIn('id', $bb)->get();
        Session::flash('message', 'This is a message'); 
        $services = Service::with('media')->whereIn('id', $aa)->whereStatus(Service::ACTIVE)->latest()->get();
        $appointmentDoctors = Doctor::with('user')->whereIn('id',
            DoctorSession::pluck('doctor_id')->toArray())->get()->where('user.status',
            User::ACTIVE)->pluck('user.full_name', 'id');
        return view('book_slot.index', compact('services','appointmentDoctors','user','user1','doctor','specialization','bodyimage1','addressData'));

    }
}
