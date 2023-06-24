<div class="row">
    <div class="col-sm-12 col-lg-6 mb-5">
        {{ Form::label('Doctor',__('messages.doctor.doctor').':' ,['class' => 'form-label required']) }}
        {{ Form::select('doctor_id', $data['doctors'], null,['class' => 'io-select2 form-select', 'id' => 'adminAppointmentDoctorId', 'data-control'=>"select2", 'required','placeholder' => __('messages.doctor.doctor')]) }}
    </div>
    <div class="col-lg-6 mb-5 col-sm-12">
        {{ Form::label('Date',__('messages.appointment.date').':' ,['class' => 'form-label required']) }}
        {{ Form::text('date', null,['class' => 'form-control date','placeholder' => __('messages.appointment.date'), 'id'=>'appointmentDate', 'required','autocomplete'=>'off','disabled' => true]) }}
    </div>
    @role('patient')
    {{ Form::hidden('patient_id',$patient->id) }}
    {{ Form::hidden('status',\App\Models\Appointment::BOOKED) }}
    @else
        <div class="col-lg-6 col-sm-12 mb-5">
            {{ Form::label('Service',__('messages.appointment.service').':' ,['class' => 'form-label required']) }}
            {{ Form::select('service_id', $data['services'], null,['class' => 'io-select2 form-select', 'data-control'=>"select2", 'id'=> 'appointmentServiceId','placeholder' => __('messages.appointment.service'),'required']) }}
        </div>
            {{ Form::hidden('status',\App\Models\Appointment::BOOKED) }}
        <div class="col-sm-12 col-lg-6 mb-5">
            {{ Form::label('Patient',__('messages.appointment.patient').':' ,['class' => 'form-label required']) }}
            {{ Form::select('patient_id', $data['patients'], null,['class' => 'io-select2 form-select', 'data-control'=>"select2",'placeholder' => __('messages.appointment.patient')]) }}
        </div>
        @endrole
        @php
            $styleCss = 'style';
        @endphp

@role('patient')
<div class="col-lg-6 col-sm-12 mb-5">
    {{ Form::label('Service',__('messages.appointment.service').':' ,['class' => 'form-label required']) }}
    {{ Form::select('service_id', [], null,['class' => 'io-select2 form-select', 'data-control'=>"select2", 'id'=> 'appointmentServiceId','placeholder' => __('messages.common.select_service'),'required']) }}
</div>
@endrole
<div class="col-lg-6 col-sm-12 mb-5">
    {{ Form::label('Payment Type',__('messages.appointment.payment_method').':' ,['class' => 'form-label required']) }}
    {{ Form::select('payment_type', getAllPaymentStatus(), null,['class' => 'io-select2 form-select', 'data-control'=>"select2",'placeholder' => __('messages.appointment.payment_method')]) }}
</div>
<div class="col-lg-6 col-sm-12 mb-5">
    {{ Form::label('Charge',__('messages.appointment.charge').':' ,['class' => 'form-label required']) }}
    <div class="input-group">
        {{ Form::text('charge', null,['class' => 'form-control','placeholder' => 'Select Date', 'id'=>'chargeId', 'required', 'placeholder' => __('messages.appointment.charge'),'readonly']) }}
        <div class="input-group-text">
            <a class="fw-bolder text-gray-500 text-decoration-none">{{ getCurrencyIcon() }}</a>
        </div>
    </div>
</div>
@if(!getLogInUser()->hasRole('patient'))
        <div class="col-lg-6 col-sm-12 mb-5">
            {{ Form::label('Add Fees',__('messages.appointment.extra_fees').':' ,['class' => 'form-label']) }}
            <div class="input-group">
                {{ Form::text('add_fees',null,['class' => 'form-control', 'id' => 'addFees', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")',
                        'placeholder' => __('messages.appointment.extra_fees'),'step'=>'any']) }}
                <div class="input-group-text">
                    <a class="fw-bolder text-gray-500 text-decoration-none">{{ getCurrencyIcon() }}</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 mb-5">
            {{ Form::label('Total Payable Amount',__('messages.appointment.total_payable_amount').':' ,['class' => 'form-label required']) }}
            <div class="input-group">
                {{ Form::text('payable_amount', null,['class' => 'form-control','placeholder' => 'Total Payable Amount', 'id'=>'payableAmount', 'required', 'placeholder' => __('messages.appointment.total_payable_amount'), 'readonly']) }}
                <div class="input-group-text">
                    <a class="fw-bolder text-gray-500 text-decoration-none">{{ getCurrencyIcon() }}</a>
                </div>
            </div>
        </div>
@endif
@if(getLogInUser()->hasRole('patient'))
    <div class="col-lg-6 col-sm-12 mb-5">
        {{ Form::label('Total Payable Amount',__('messages.appointment.total_payable_amount').':' ,['class' => 'form-label required']) }}
        <div class="input-group">
            {{ Form::text('payable_amount', null,['class' => 'form-control','placeholder' => 'Total Payable Amount', 'id'=>'payableAmount', 'required', 'placeholder' => __('messages.appointment.total_payable_amount'), 'readonly']) }}
            <div class="input-group-text">
                <a class="fw-bolder text-gray-500 text-decoration-none">{{ getCurrencyIcon() }}</a>
            </div>
        </div>
    </div>
@endif
<div class="d-flex">
    {{ Form::button(__('messages.common.save'),['type' => 'submit','class' => 'btn btn-dark me-2 submitAppointmentBtn' ]) }}
    &nbsp;
    <a href="{{ url()->previous() }}" type="reset"
       class="btn btn-secondary">{{__('messages.common.discard')}}</a>
</div>
</div>
