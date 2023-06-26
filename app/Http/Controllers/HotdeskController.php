<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialization;
class HotdeskController extends Controller
{

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
        return view('hotdesk.index', compact('user','doctor','servicesData','specialization'));
    }
}
