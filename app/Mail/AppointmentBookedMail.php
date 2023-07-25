<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Appointment;
class AppointmentBookedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->data['email'];
        $payableAmount = $this->data['payable_amount'];
        $paymentType = $this->data['payment_type'];
        $DoctorId = $this->data['doctor_id'];
        $doctorData = Doctor::where('id', $this->data['doctor_id'])->first();
        $outletNameGet = User::where('id',$doctorData->user_id)->first();
        $outletName = $outletNameGet->full_name;
        $planType = $this->data['plan_type'];
        $serviceId = $this->data['service_id'];
        $addressDataGET = Service::where('id', $this->data['service_id'])->first();
        $serviceData = $addressDataGET->name;
        $password = $this->data['original_password'] ?? null;
        $patientId = $this->data['patient_id'];
        $appointmentUniqueId = Crypt::encryptString($this->data['appointment_unique_id']);
        $name = $this->data['first_name'].' '.$this->data['last_name'];
        $time = $this->data['original_from_time'].' - '.$this->data['original_to_time'];
        $date = Carbon::createFromFormat('Y-m-d', $this->data['date'])->format('dS,M Y');
        $subject = 'Appointment Booked SuccessFully';

        return $this->view('emails.booking_confirm_mail',
            compact('email', 'password', 'name', 'time', 'date', 'patientId', 'appointmentUniqueId','payableAmount','paymentType','DoctorId','serviceId','planType','serviceData','outletName'))
            ->markdown('emails.booking_confirm_mail')
            ->subject($subject);
    }
}
