@extends('layouts.app')
@section('title')
    {{__('messages.appointment.add_new_appointment')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            @role('patient')
            <a href="{{ route('patients.patient-appointments-index') }}"
               class="btn btn-outline-dark float-end">{{ __('messages.common.back') }}</a>
            @else
                <a href="{{ route('appointments.index') }}"
                   class="btn btn-outline-dark float-end">{{ __('messages.common.back') }}</a>
                @endrole
        </div>

        <div class="col-12">
            @include('layouts.errors')
        </div>
        <div class="card">
            <div class="card-body">
                {{ Form::hidden(null, false,['id' => 'appointmentIsEdit']) }}
                {{ Form::hidden(null, \App\Models\Appointment::PAYSTACK,['id' => 'paystackMethod']) }}
                {{ Form::hidden(null, \App\Models\Appointment::PAYTM,['id' => 'paytmMethod']) }}
                {{ Form::hidden(null, \App\Models\Appointment::AUTHORIZE,['id' => 'authorizeMethod']) }}
                {{ Form::hidden(null, \App\Models\Appointment::PAYPAL,['id' => 'paypalMethod']) }}
                {{ Form::hidden(null, \App\Models\Appointment::MANUALLY,['id' => 'manuallyMethod']) }}
                {{ Form::hidden(null, \App\Models\Appointment::STRIPE,['id' => 'stripeMethod']) }}
                {{ Form::hidden(null, \App\Models\Appointment::RAZORPAY,['id' => 'razorpayMethodMethod']) }}
                @role('patient')
                    {{ Form::open(['route' => 'patients.appointments.store','id' => 'addAppointmentForm']) }}
                @else
                    {{ Form::open(['route' => 'appointments.store', 'id' => 'addAppointmentForm']) }}
                @endrole
                    @include('appointments.fields')
                    {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

