<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Setting;
use Auth;
class BookingdetailsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
        } else {
            return redirect('login');
        }
        $UserData = user::where('id', $id)->first();
        // print_r($UserData);die;
        $patientID = getLogInUser()->patient->id;
        $AppointData = Appointment::where('patient_id', $patientID)->orderBy('id','desc')->first();
        $ServiceData = Service::where('id', $AppointData->service_id)->first();
        $doctorData = Doctor::where('id', $AppointData->doctor_id)->first();
        $outletName = User::where('id',$doctorData->user_id)->first();
        $bodyimage1 = Setting::where('key', 'body_image')->first();
        return view('booking_details.index',compact('UserData','AppointData','ServiceData','outletName','bodyimage1'));
    }

}
