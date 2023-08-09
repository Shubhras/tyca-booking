<?php

namespace App\Repositories;

use App\Events\CreateGoogleAppointment;
use App\Http\Controllers\GoogleCalendarController;
use App\Mail\AppointmentBookedMail;
use App\Mail\DoctorAppointmentBookMail;
use App\Mail\PatientAppointmentBookMail;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Google\Service\Vault\Export;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use DateTime;

/**
 * Class AppointmentRepository
 *
 * @version August 3, 2021, 10:37 am UTC
 */
class AppointmentRepository extends BaseRepository
{
    /**
     * @var GoogleCalendarController
     */
    public function __construct(GoogleCalendarController $googleCalendarController)
    {
        $this->googleCalendarController = $googleCalendarController;
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Appointment::class;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            if ($input['plan_type'] == 'hourly') {
                $fromTime = explode(' ', $input['from_time']);
                $toTime = explode(' ', $input['to_time']);
            } else {
                $blank = '12:00 AM';
                $fromTime = explode(' ', date('H:i A'));
                $toTime = explode(' ', $blank);
            }


            $input['appointment_unique_id'] = strtoupper(Appointment::generateAppointmentUniqueId());
            // $fromTime = explode(' ', $input['from_time']);
            // $toTime = explode(' ', $input['to_time']);
            $input['from_time'] = $fromTime[0];
            $input['from_time_type'] = $fromTime[1];
            $input['to_time'] = $toTime[0];
            $input['to_time_type'] = $toTime[1];
            $input['payment_type'] = Appointment::MANUALLY;
            $input['payment_method'] = Appointment::MANUALLY;

            $appointment = Appointment::create($input);
            $patient = Patient::whereId($input['patient_id'])->with('user')->first();
            $input['patient_name'] = $patient->user->full_name;
            $input['original_from_time'] = $fromTime[0] . ' ' . $fromTime[1];
            $input['original_to_time'] = $toTime[0] . ' ' . $toTime[1];
            $service = Service::whereId($input['service_id'])->first();
            $input['service'] = $service->name;

            if ($patient->user->email_notification) {
                Mail::to($patient->user->email)->send(new PatientAppointmentBookMail($input));
            }

            $input['full_time'] = $input['original_from_time'] . '-' . $input['original_to_time'] . ' ' . Carbon::parse($input['date'])->format('jS M, Y');
            if (!getLogInUser()->hasRole('patient')) {
                $patientNotification = Notification::create([
                    'title' => Notification::APPOINTMENT_CREATE_PATIENT_MSG . ' ' . $input['full_time'],
                    'type' => Notification::BOOKED,
                    'user_id' => $patient->user->id,
                ]);
            }

            $doctor = Doctor::whereId($input['doctor_id'])->with('user')->first();
            $input['doctor_name'] = $doctor->user->full_name;
            if ($doctor->user->email_notification) {
                Mail::to($doctor->user->email)->send(new DoctorAppointmentBookMail($input));
            }

            $doctorNotification = Notification::create([
                'title' => $patient->user->full_name . ' ' . Notification::APPOINTMENT_CREATE_DOCTOR_MSG . ' ' . $input['full_time'],
                'type' => Notification::BOOKED,
                'user_id' => $doctor->user->id,
            ]);

            DB::commit();

            try {
                CreateGoogleAppointment::dispatch(true, $appointment->id);
                CreateGoogleAppointment::dispatch(false, $appointment->id);
            } catch (Exception $exception) {
                Log::error($exception->getMessage());
            }

            return $appointment;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @return mixed
     */
    public function storeBackend($input)
    {
        echo "<pre>"; print_r($input); die;
        try {
            DB::beginTransaction();

            $input['appointment_unique_id'] = strtoupper(Appointment::generateAppointmentUniqueId());

            if ($input['type_of_payment'] == 'hourly') {
                $fromTime = explode(' ', $input['from_time']);
                $toTime = explode(' ', $input['to_time']);
                $input['payable_amount'] =  $input['backend_account'];
            } else {
                $blank = '12:00 AM';
                $blank1 = '12:00 PM';
                $fromTime = explode(' ', $blank);
                $toTime = explode(' ', $blank1);

                $asd =  explode(" - ", $input['date1']);
                $input['from_date'] = Carbon::parse($asd[0])->format('Y-m-d');
                $input['to_date'] = Carbon::parse($asd[1])->format('Y-m-d');
                $earlier = new DateTime($input['from_date']);
                $later = new DateTime($input['to_date']);
                // $abs_diff = $later->diff($earlier)->format("%a");
                // $input['date'] = Carbon::parse($asd[0])->format('Y-m-d');
                // if ($abs_diff == 0) {
                //     $input['total_counts'] = $input['charge'] * 1;
                // } else {
                //     $input['total_counts'] = $input['charge'] * $abs_diff;
                // }
                $input['total_counts'] = $input['backend_account'];
                $input['payable_amount'] = $input['backend_account'];
            }
            $input['from_time'] = $fromTime[0];
            $input['from_time_type'] = $fromTime[1];
            $input['to_time'] = $toTime[0];
            $input['to_time_type'] = $toTime[1];
            $input['plan_type'] = $input['type_of_payment'];
            $input['payment_type'] = $input['payment_type'];
            $input['payment_method'] = $input['payment_type'];
            $input['show_appointment'] = 'true';
            // if($name = DB::table('appointments')->where('date', $input['date'])->where('doctor_id', $input['doctor_id'])->where('service_id', $input['service_id'])->exists()){
            //     return false;        
            // }
            // else 
            if ($name = DB::table('appointments')->where('date', $input['date'])->where('doctor_id', $input['doctor_id'])->where('service_id', $input['service_id'])->where('plan_type', 'daily')->exists()) {
                return false;
            }
            $appointment = Appointment::create($input);
            $patient = Patient::whereId($input['patient_id'])->with('user')->first();
            $input['patient_name'] = $patient->user->full_name;
            $input['original_from_time'] = $fromTime[0] . ' ' . $fromTime[1];
            $input['original_to_time'] = $toTime[0] . ' ' . $toTime[1];
            $service = Service::whereId($input['service_id'])->first();
            $input['service'] = $service->name;

            $input['full_time'] = $input['original_from_time'] . '-' . $input['original_to_time'] . ' ' . Carbon::parse($input['date'])->format('jS M, Y');
            if (!getLogInUser()->hasRole('patient')) {
                $patientNotification = Notification::create([
                    'title' => Notification::APPOINTMENT_CREATE_PATIENT_MSG . ' ' . $input['full_time'],
                    'type' => Notification::BOOKED,
                    'user_id' => $patient->user->id,
                ]);
            }

            $transaction = [
                'user_id' => $patient->user->id,
                'transaction_id' =>  $input['appointment_unique_id'] . '_' . rand(0, 99999),
                'appointment_id' => $input['appointment_unique_id'],
                'amount' => $input['payable_amount'],
                'status' => 0,
                'type' => $input['payment_type'],
                'meta' => json_encode($input),
            ];

            Transaction::create($transaction);


            $doctor = Doctor::whereId($input['doctor_id'])->with('user')->first();
            $input['doctor_name'] = $doctor->user->full_name;

            $doctorNotification = Notification::create([
                'title' => $patient->user->full_name . ' ' . Notification::APPOINTMENT_CREATE_DOCTOR_MSG . ' ' . $input['full_time'],
                'type' => Notification::BOOKED,
                'user_id' => $doctor->user->id,
            ]);

            DB::commit();

            try {
                CreateGoogleAppointment::dispatch(true, $appointment->id);
                CreateGoogleAppointment::dispatch(false, $appointment->id);
            } catch (Exception $exception) {
                Log::error($exception->getMessage());
            }

            return $appointment;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @return mixed
     */
    public function frontSideStore($input)
    {
        try {
            DB::beginTransaction();
            $oldUser = User::whereEmail($input['email'])->first();
            if (isset($input['is_patient_account']) && $input['is_patient_account'] == 1) {
                if (!$oldUser) {
                    throw new UnprocessableEntityHttpException('Email is not registered');
                }
                $input['patient_id'] = $oldUser->patient->id;
            } else {
                if ($oldUser) {
                    $input['patient_id'] = $oldUser->patient->id;
                    // throw new UnprocessableEntityHttpException('Email already taken');

                    if ($input['plan_type'] == 'Hour Plan') {
                        $fromTime = explode(' ', $input['from_time']);
                        $toTime = explode(' ', $input['to_time']);
                        $input['plan_type'] = 'hourly';
                    } else {
                        $blank = '12:00 AM';
                        $blank1 = '12:00 PM';
                        $fromTime = explode(' ', $blank);
                        $toTime = explode(' ', $blank1);
                        $input['from_time'] = date('H:i A');
                        $input['to_time'] = $blank;
                        $input['plan_type'] = 'daily';
                        $asd =  explode(" - ", $input['date1']);
                        $input['from_date'] = Carbon::parse($asd[0])->format('Y-m-d');
                        $input['to_date'] = Carbon::parse($asd[1])->format('Y-m-d');
                        $earlier = new DateTime($input['from_date']);
                        $later = new DateTime($input['to_date']);
                        $abs_diff = $later->diff($earlier)->format("%a");
                        $input['date'] = Carbon::parse($asd[0])->format('Y-m-d');
                        if ($abs_diff == 0) {
                            $input['total_counts1'] = $input['payable_amount'] * 1;
                        } else {
                            $input['total_counts1'] = $input['payable_amount'] * $abs_diff;
                        }
                        $input['total_counts'] = $input['payable_amount'];
                        $input['payable_amount'] = $input['total_counts'];
                    }
                    $input['appointment_unique_id'] = strtoupper(Appointment::generateAppointmentUniqueId());
                    $input['original_from_time'] = $input['from_time'];
                    $input['original_to_time'] = $input['to_time'];
                    $input['show_appointment'] = 'false';
                    $input['from_time'] = $fromTime[0];
                    $input['from_time_type'] = $fromTime[1];
                    $input['to_time'] = $toTime[0];
                    $input['to_time_type'] = $toTime[1];
                    $input['status'] = Appointment::BOOKED;
                    $input['payment_method'] = $input['payment_type'];
                    $input['payment_type'] = Appointment::PENDING;
                    $input['input_json'] = json_encode($input);

                    if ($name = DB::table('appointments')->where('date', $input['date'])->where('doctor_id', $input['doctor_id'])->where('service_id', $input['service_id'])->where('plan_type', 'daily')->exists()) {
                        return false;
                    }
                    $appointment = Appointment::create($input);


                    // $patientFullName = (isset($input['is_patient_account']) && $input['is_patient_account'] == 1) ? $oldUser->full_name : $user->full_name;
                    // $patientId = (isset($input['is_patient_account']) && $input['is_patient_account'] == 1) ? $oldUser->id : $user->id;
                    // $input['full_time'] = $input['original_from_time'] . '-' . $input['original_to_time'] . ' ' . \Carbon\Carbon::parse($input['date'])->format('jS M, Y');

                    $patientFullName = (isset($input['is_patient_account']) && $input['is_patient_account'] == 1) ? $oldUser->full_name : $oldUser->full_name;
                    $patientId = (isset($input['is_patient_account']) && $input['is_patient_account'] == 1) ? $oldUser->patient->id : $oldUser->patient->id;
                    $input['full_time'] = $input['original_from_time'] . '-' . $input['original_to_time'] . ' ' . \Carbon\Carbon::parse($input['date'])->format('jS M, Y');
                    if (getLogInUser() && !getLogInUser()->hasRole('patient')) {
                        $patientNotification = Notification::create([
                            'title' => Notification::APPOINTMENT_CREATE_PATIENT_MSG . ' ' . $input['full_time'],
                            'type' => Notification::BOOKED,
                            'user_id' => $oldUser->patient->id,
                        ]);
                    }

                    $doctor = Doctor::whereId($input['doctor_id'])->with('user')->first();
                    $input['doctor_name'] = $doctor->user->full_name;
                    $input['patient_name'] = $patientFullName;
                    $service = Service::whereId($input['service_id'])->first();
                    $input['service'] = $service->name;
                    if ($doctor->user->email_notification) {
                        Mail::to($doctor->user->email)->send(new DoctorAppointmentBookMail($input));
                    }
                    $doctorNotification = Notification::create([
                        'title' => $patientFullName . ' ' . Notification::APPOINTMENT_CREATE_DOCTOR_MSG . ' ' . $input['full_time'],
                        'type' => Notification::BOOKED,
                        'user_id' => $doctor->user->id,
                    ]);

                    DB::commit();

                    return $appointment;
                }
                $input['original_password'] = Str::random(8);
                $input['type'] = User::PATIENT;
                $userFields = ['first_name', 'last_name', 'email', 'password', 'type'];
                $input['password'] = Hash::make($input['original_password']);
                /** @var User $user */
                $user = User::create(Arr::only($input, $userFields));
                $patientArray['patient_unique_id'] = strtoupper(Patient::generatePatientUniqueId());

                /** @var Patient $patient */
                $patient = $user->patient()->create($patientArray);
                $user->assignRole('patient');
                $input['patient_id'] = $patient->id;
            }

            if ($input['plan_type'] == 'Hour Plan') {
                $fromTime = explode(' ', $input['from_time']);
                $toTime = explode(' ', $input['to_time']);
                $input['plan_type'] = 'hourly';
            } else {
                $blank = '12:00 AM';
                $blank1 = '12:00 PM';
                $fromTime = explode(' ', $blank);
                $toTime = explode(' ', $blank1);
                $input['from_time'] = date('H:i A');
                $input['to_time'] = $blank;
                $input['plan_type'] = 'daily';
                $asd =  explode(" - ", $input['date1']);
                $input['from_date'] = Carbon::parse($asd[0])->format('Y-m-d');
                $input['to_date'] = Carbon::parse($asd[1])->format('Y-m-d');
                $earlier = new DateTime($input['from_date']);
                $later = new DateTime($input['to_date']);
                $abs_diff = $later->diff($earlier)->format("%a");
                $input['date'] = Carbon::parse($asd[0])->format('Y-m-d');
                if ($abs_diff == 0) {
                    $input['total_counts1'] = $input['payable_amount'] * 1;
                } else {
                    $input['total_counts1'] = $input['payable_amount'] * $abs_diff;
                }
                $input['total_counts'] = $input['payable_amount'];
                $input['payable_amount'] = $input['total_counts'];
            }
            $input['appointment_unique_id'] = strtoupper(Appointment::generateAppointmentUniqueId());
            $input['original_from_time'] = $input['from_time'];
            $input['original_to_time'] = $input['to_time'];
            // $fromTime = explode(' ', $input['from_time']);
            // $toTime = explode(' ', $input['to_time']);
            $input['from_time'] = $fromTime[0];
            $input['from_time_type'] = $fromTime[1];
            $input['to_time'] = $toTime[0];
            $input['to_time_type'] = $toTime[1];
            $input['show_appointment'] = 'false';
            $input['status'] = Appointment::BOOKED;
            $input['payment_method'] = $input['payment_type'];
            $input['payment_type'] = Appointment::PENDING;
            $input['input_json'] = json_encode($input);
            // if($name = DB::table('appointments')->where('date', $input['date'])->where('doctor_id', $input['doctor_id'])->where('service_id', $input['service_id'])->exists()){
            //     return false;        
            // }
            // else 
            if ($name = DB::table('appointments')->where('date', $input['date'])->where('doctor_id', $input['doctor_id'])->where('service_id', $input['service_id'])->where('plan_type', 'daily')->exists()) {
                return false;
            }
            $appointment = Appointment::create($input);


            $patientFullName = (isset($input['is_patient_account']) && $input['is_patient_account'] == 1) ? $oldUser->full_name : $user->full_name;
            $patientId = (isset($input['is_patient_account']) && $input['is_patient_account'] == 1) ? $oldUser->id : $user->id;
            $input['full_time'] = $input['original_from_time'] . '-' . $input['original_to_time'] . ' ' . \Carbon\Carbon::parse($input['date'])->format('jS M, Y');

            // $patientFullName = (isset($input['is_patient_account']) && $input['is_patient_account'] == 1) ? $oldUser->full_name : $oldUser->full_name;
            // $patientId = (isset($input['is_patient_account']) && $input['is_patient_account'] == 1) ? $patientId : $patientId;
            // $input['full_time'] = $input['original_from_time'] . '-' . $input['original_to_time'] . ' ' . \Carbon\Carbon::parse($input['date'])->format('jS M, Y');
            if (getLogInUser() && !getLogInUser()->hasRole('patient')) {
                $patientNotification = Notification::create([
                    'title' => Notification::APPOINTMENT_CREATE_PATIENT_MSG . ' ' . $input['full_time'],
                    'type' => Notification::BOOKED,
                    'user_id' => $patientId,
                ]);
            }

            $doctor = Doctor::whereId($input['doctor_id'])->with('user')->first();
            $input['doctor_name'] = $doctor->user->full_name;
            $input['patient_name'] = $patientFullName;
            $service = Service::whereId($input['service_id'])->first();
            $input['service'] = $service->name;
            if ($doctor->user->email_notification) {
                Mail::to($doctor->user->email)->send(new DoctorAppointmentBookMail($input));
            }
            $doctorNotification = Notification::create([
                'title' => $patientFullName . ' ' . Notification::APPOINTMENT_CREATE_DOCTOR_MSG . ' ' . $input['full_time'],
                'type' => Notification::BOOKED,
                'user_id' => $doctor->user->id,
            ]);

            DB::commit();

            return $appointment;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data['doctors'] = Doctor::with('user')->get()->where('user.status', User::ACTIVE)->pluck(
            'user.full_name',
            'id'
        );
        $data['patients'] = Patient::with('user')->get()->pluck('user.full_name', 'id');
        $data['patientStatus'] = Appointment::PATIENT_STATUS;
        $data['services'] = Service::whereStatus(Service::ACTIVE)->pluck('name', 'id');

        return $data;
    }

    /**
     * @param $input
     * @return array
     */
    public function getDetail($input)
    {
        $input = Appointment::with(['patient.user', 'patient.address', 'doctor.user', 'services'])->where(
            'id',
            $input->id
        )->first();

        $data['name'] = $input->patient->user->full_name;
        $data['profile'] = $input->patient->profile;
        $data['Id'] = $input->patient->patient_unique_id;
        $data['email'] = $input->patient->user->email;
        $data['address_one'] = $input->patient->address->address1;
        $data['address_two'] = $input->patient->address->address2;
        $data['dob'] = $input->patient->user->dob;
        $data['contact'] = $input->patient->user->contact;
        $data['gender'] = $input->patient->user->gender;
        $data['blood_group'] = $input->patient->user->blood_group;
        $data['from_time'] = $input->from_time;
        $data['to_time'] = $input->to_time;
        $data['description'] = $input->discription;
        $data['doctor'] = $input->doctor->user->full_name;
        $data['service'] = $input->services->name;
        $data['count'] = $input->count();
        $data['date'] = $input->date;

        return $data;
    }

    /**
     * @return array
     */
    public function getAppointmentsData()
    {
        $doctorId = getLogInUser()->doctor->id;
        /** @var Appointment $appointment */
        $appointments = Appointment::with(['patient.user', 'user'])->where('doctor_id', $doctorId)->get();
        $data = [];
        $count = 0;
        foreach ($appointments as $key => $appointment) {
            $startTime = $appointment->from_time . ' ' . $appointment->from_time_type;
            $endTime = $appointment->to_time . ' ' . $appointment->to_time_type;
            $start = Carbon::createFromFormat('Y-m-d h:i A', $appointment->date . ' ' . $startTime);
            $end = Carbon::createFromFormat('Y-m-d h:i A', $appointment->date . ' ' . $endTime);
            $data[$key]['id'] = $appointment->id;
            $data[$key]['title'] = $startTime . '-' . $endTime;
            $data[$key]['patientName'] = $appointment->patient->user->full_name;
            $data[$key]['start'] = $start->toDateTimeString();
            $data[$key]['description'] = $appointment->description;
            $data[$key]['status'] = $appointment->status;
            $data[$key]['amount'] = $appointment->payable_amount;
            $data[$key]['uId'] = $appointment->appointment_unique_id;
            $data[$key]['service'] = $appointment->services->name;
            $data[$key]['end'] = $end->toDateTimeString();
            $data[$key]['color'] = '#FFF';
            $data[$key]['className'] = [getStatusClassName($appointment->status), 'text-white'];
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getPatientAppointmentsCalendar()
    {
        $patientId = getLogInUser()->patient->id;
        /** @var Appointment $appointment */
        $appointments = Appointment::with(['doctor.user', 'user'])->where('patient_id', $patientId)->get();
        $data = [];
        $count = 0;
        foreach ($appointments as $key => $appointment) {
            $startTime = $appointment->from_time . ' ' . $appointment->from_time_type;
            $endTime = $appointment->to_time . ' ' . $appointment->to_time_type;
            $start = Carbon::createFromFormat('Y-m-d h:i A', $appointment->date . ' ' . $startTime);
            $end = Carbon::createFromFormat('Y-m-d h:i A', $appointment->date . ' ' . $endTime);
            $data[$key]['id'] = $appointment->id;
            $data[$key]['title'] = $startTime . '-' . $endTime;
            $data[$key]['doctorName'] = $appointment->doctor->user->full_name;
            $data[$key]['start'] = $start->toDateTimeString();
            $data[$key]['description'] = $appointment->description;
            $data[$key]['status'] = $appointment->status;
            $data[$key]['amount'] = $appointment->payable_amount;
            $data[$key]['uId'] = $appointment->appointment_unique_id;
            $data[$key]['service'] = $appointment->services->name;
            $data[$key]['end'] = $end->toDateTimeString();
            $data[$key]['color'] = '#FFF';
            $data[$key]['className'] = [getStatusClassName($appointment->status), 'text-white'];
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getCalendar()
    {

        $appointments = Appointment::with(['user'])->get();
        $data = [];
        $count = 0;

        foreach ($appointments as $key => $appointment) {
            $startTime = $appointment->from_time . ' ' . $appointment->from_time_type;
            $endTime = $appointment->to_time . ' ' . $appointment->to_time_type;
            $start = Carbon::createFromFormat('Y-m-d h:i A', $appointment->date . ' ' . $startTime);
            $end = Carbon::createFromFormat('Y-m-d h:i A', $appointment->date . ' ' . $endTime);


            $data[$key]['id'] = $appointment->id;
            $data[$key]['title'] = $startTime . '-' . $endTime;
            $data[$key]['doctorName'] = $appointment->doctor->user->full_name;
            $data[$key]['patient'] = $appointment->patient->user->full_name;
            $data[$key]['start'] = $start->toDateTimeString();
            $data[$key]['description'] = $appointment->description;

            $data[$key]['status'] = $appointment->status;
            $data[$key]['amount'] = $appointment->payable_amount;
            $data[$key]['uId'] = $appointment->appointment_unique_id;

            $data[$key]['service'] = $appointment->services->name;
            $data[$key]['end'] = $end->toDateTimeString();
            $data[$key]['color'] = '#FFF';
            $data[$key]['className'] = [getStatusClassName($appointment->status), 'text-white'];
        }

        return $data;
    }

    /**
     * @param $input
     * @return array
     */
    public function showAppointment($input)
    {
        $data['data'] = Appointment::with(['patient.user', 'doctor.user', 'services'])->findOrFail($input['id']);
        $data['transactionStatus'] = Transaction::whereAppointmentId($data['data']->appointment_unique_id)->exists();

        return $data;
    }

    /**
     * @param $appointment
     * @return array
     */
    public function showDoctorAppointment($appointment)
    {
        $data['data'] = Appointment::with(['patient.user', 'doctor.user', 'services'])->findOrFail($appointment->id);

        return $data;
    }

    /**
     * @param $input
     * @return mixed
     *
     * @throws ApiErrorException
     */
    public function createSession($input)
    {
        $appointmentId = $input['appointment_unique_id'];
        $patientEmail = Patient::with('user')->whereId($input['patient_id'])->first();
        $doctorName = Doctor::with('user')->whereId($input['doctor_id'])->first();
        setStripeApiKey();

        $successUrl = '/medical-payment-success';
        $cancelUrl = '/medical-payment-failed';
        if ($input->plan_type == 'hourly') {
            $description = 'Payment for booking at '  . $doctorName->user->full_name . ' on ' . Carbon::parse($input->date)->format('d/m/Y') . ' at '  . $input->from_time . ' ' . $input->from_time_type .  ' - '  . $input->to_time .  ' '  . $input->to_time_type;
        } elseif ($input->plan_type == 'daily') {
            $description = 'Payment for booking at '  . $doctorName->user->full_name . ' on ' . Carbon::parse($input->date)->format('d/m/Y') . ' - '  . Carbon::parse($input->from_date)->format('d/m/Y');
        }
        $session = Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => $patientEmail->user->email,
            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => 'Payment for appointment booking',
                        ],
                        'unit_amount' =>  in_array('SGD', zeroDecimalCurrencies()) ? $input['payable_amount'] : $input['payable_amount'] * 100,
                        'currency' => 'SGD',
                    ],
                    'quantity' => 1,
                    'description' => $description,
                ],
            ],
            'client_reference_id' => $appointmentId,
            'mode' => 'payment',
            'success_url' => url($successUrl) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => url($cancelUrl . '?error=payment_cancelled'),
        ]);

        $result = [
            'sessionId' => $session['id'],
        ];

        return $result;
    }
}
