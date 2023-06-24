<?php

namespace App\Repositories;

use App\DataTable\UserDataTable;
use App\Models\Appointment;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\DoctorSession;
use App\Models\Patient;
use App\Models\Qualification;
use App\Models\Specialization;
use App\Models\User;
use Arr;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Yajra\DataTables\DataTables;

/**
 * Class UserRepository
 */
class UserRepository extends BaseRepository
{
    public $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'contact',
        'dob',
        'specialization',
        'experience',
        'gender',
        'status',
        'password',

    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @param  array  $input
     * @return mixed
     */
    public function store($input)
    {
        $addressInputArray = Arr::only($input,
            ['address1', 'address2', 'country_id', 'city_id', 'state_id', 'postal_code']);
        $doctorArray = Arr::only($input, ['experience', 'twitter_url', 'linkedin_url', 'instagram_url']);
        $specialization = $input['specializations'];
        try {
            DB::beginTransaction();

            $days = array();
            if (isset($input['days'])) {
                foreach ($input['days'] as $day) {
                    $days[] = array(
                        'day_of_week' => $day,
                        'start_time'  => $input['startTime'][$day],
                        'end_time'    => $input['endTime'][$day],
                    );
                }
            }
            $doctorArr = array(
                'experience' => '',
                'days' =>  json_encode($days),
                'description' => json_decode($input['description']),
            );

            $input['email'] = setEmailLowerCase('abc@gmail.com'.rand(0, 99999));
            $input['status'] = (isset($input['status'])) ? 1 : 0;
            $input['password'] = Hash::make('123456');
            $input['type'] = User::DOCTOR;
            $doctor = User::create($input);
            $doctor->assignRole('doctor');
            $doctor->address()->create($addressInputArray);
            $createDoctor = $doctor->doctor()->create($doctorArr);
            $createDoctor->specializations()->sync($specialization);
            if (isset($input['profile']) && ! empty('profile')) {
                $doctor->addMedia($input['profile'])->toMediaCollection(User::PROFILE, config('app.media_disc'));
            }

            if (isset($input['gallery_image']) && ! empty('gallery_image')) {
                foreach ($input['gallery_image'] as $file) {
                    $doctor->addMedia($file)->toMediaCollection(User::GALLERY, config('app.media_disc'));
                }
            }

            DB::commit();

            return $doctor;
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  array  $input
     * @param  int  $doctor
     * @return int
     */
    public function update($input, $doctor)
    {
        $addressInputArray = Arr::only($input,
            ['address1', 'address2', 'city_id', 'state_id', 'country_id', 'postal_code']);
        $doctorArray = Arr::only($input, ['experience', 'twitter_url', 'linkedin_url', 'instagram_url']);

        $specialization = $input['specializations'];
        try {
            DB::beginTransaction();

            $days = array();
            if (isset($input['days'])) {
                foreach ($input['days'] as $day) {
                    $days[] = array(
                        'day_of_week' => $day,
                        'start_time'  => $input['startTime'][$day],
                        'end_time'    => $input['endTime'][$day],
                    );
                }
            }
            $doctorArr = array(
                'experience' => '',
                'days' =>  json_encode($days),
                'description' => $input['description'],
            );


            $input['email'] = setEmailLowerCase('abc@gmail.com'.rand(0, 99999));
            $input['status'] = (isset($input['status'])) ? 1 : 0;
            $input['type'] = User::DOCTOR;


            $doctor->user->update($input);
            $doctor->user->address()->update($addressInputArray);
            $doctor->update($doctorArr);
            $doctor->specializations()->sync($specialization);


            if (isset($input['profile']) && ! empty('profile')) {
                $doctor->user->clearMediaCollection(User::PROFILE);
                $doctor->user->media()->delete();
                $doctor->user->addMedia($input['profile'])->toMediaCollection(User::PROFILE, config('app.media_disc'));
            }

            if (isset($input['gallery_image']) && ! empty('gallery_image')) {
                foreach ($input['gallery_image'] as $file) {
                    $doctor->user->addMedia($file)->toMediaCollection(User::GALLERY, config('app.media_disc'));
                }
            }

            DB::commit();

            return $doctor;
        } catch (\Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  array  $userInput
     * @return bool
     */
    public function updateProfile($userInput)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();

            $user->update($userInput);

            if ((getLogInUser()->hasRole('patient'))) {
                if (! empty($userInput['image'])) {
                    $user->clearMediaCollection(Patient::PROFILE);
                    $user->patient->media()->delete();
                    $user->patient->addMedia($userInput['image'])->toMediaCollection(Patient::PROFILE,
                        config('app.media_disc'));
                }
            } else {
                if ((! empty($userInput['image']))) {
                    $user->clearMediaCollection(User::PROFILE);
                    $user->media()->delete();
                    $user->addMedia($userInput['image'])->toMediaCollection(User::PROFILE, config('app.media_disc'));
                }
            }

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $doctor
     * @return mixed
     */
    public function getSpecializationsData($doctor)
    {
        $data['specializations'] = Specialization::pluck('name', 'id')->toArray();
        $data['doctorSpecializations'] = $doctor->specializations()->pluck('specialization_id')->toArray();
        $data['countryId'] = $doctor->user->address()->pluck('country_id');
        $data['stateId'] = $doctor->user->address()->pluck('state_id');

        return $data;
    }

    /**
     * @return mixed
     */
    public function getCountries()
    {
        $countries = Country::pluck('name', 'id');

        return $countries;
    }

    public function addQualification($input)
    {
        $input['user_id'] = $input['id'];
        $qualification = Qualification::create($input);

        return $qualification;
    }

    /**
     * @param $input
     * @return array
     *
     * @throws \Exception
     */
    public function doctorDetail($input)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $doctor['data'] = Doctor::with(['user.address', 'specializations', 'appointments.patient.user', 'services'])->whereId($input->id)->first();
        $doctor['doctorSession'] = DoctorSession::whereDoctorId($input->id)->get();
//        $doctor['appointments'] = DataTables::of((new UserDataTable())->getAppointment($input->id))->make(true);
        $doctor['appointmentStatus'] = Appointment::ALL_STATUS;
        $doctor['totalAppointmentCount'] = Appointment::whereDoctorId($input->id)->count();
        $doctor['todayAppointmentCount'] = Appointment::whereDoctorId($input->id)->where('date', '=',
            $todayDate)->count();
        $doctor['upcomingAppointmentCount'] = Appointment::whereDoctorId($input->id)->where('date', '>',
            $todayDate)->count();

        return $doctor;
    }
}
