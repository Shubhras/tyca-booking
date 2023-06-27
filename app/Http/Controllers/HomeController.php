<?php
  
namespace App\Http\Controllers;
use App\DataTables\DoctorAppointmentDataTable;
use App\Events\DeleteAppointmentFromGoogleCalendar;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Requests\CreateFrontAppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserGoogleAppointment;
use App\Repositories\AppointmentRepository;
use App\Repositories\GoogleCalendarRepository;
use Carbon\Carbon;
use Exception;
use Flash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Stripe\Exception\ApiErrorException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Yajra\DataTables\Facades\DataTables;   
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\UserRepository;
class HomeController extends Controller
{
    /**
     * @var UserRepository
     */
    public $userRepo;

    /**
     * UserController constructor.
     *
     * @param  UserRepository  $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function authorizeCheck(Request $request)
    {

        if(auth()->check()){
            return response()->json(['success'=> true]);
        }else{
            return response()->json(['success'=> false]);
        }
        
    }

    /**
     * Update Member a controller instance.
     *
     * @return void
     */
    public function UpdateMember(Request $request)
    {
        $this->userRepo->memberProfile($request->all());
        $id = Auth::id();
        
        if(!empty($request->password)){
            DB::table('users')
            ->where('id', $id)
            ->update(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'password' => Hash::make($request->password)]);
        }else{
            DB::table('users')
            ->where('id', $id)
            ->update(['first_name' => $request->first_name, 'last_name' => $request->last_name]);
        }

        Flash::success(__('messages.flash.your_reg_success'));
        return Redirect::back();
        
    }
        /**
     * Cancel Appointment a controller instance.
     *
     * @return void
     */
    public function CancelAppoint(Request $request)
    {

       /* Flash::success(__('messages.flash.your_reg_success'));
        return Redirect::back();*/

        if(auth()->check()){
            $patientId = Auth::id();
            $id = $request->id;
            DB::table('appointments')
            ->where('id', $id)
            //->where('patient_id', $patientId)
            ->update(['status' => 4]);
            return response()->json(['success'=> true]);
        }else{
            return response()->json(['success'=> false]);
        }
        
    }
    
}