<?php $emptyData = array(); ?>
<div class="row">
    <div class="col-sm-12 col-lg-6 mb-5">
        {{ Form::label('Doctor',__('messages.doctor.doctor').':' ,['class' => 'form-label required']) }}
        {{ Form::select('doctor_id', $data['doctors'], null,['class' => 'io-select2 form-select', 'id' => 'adminAppointmentDoctorId', 'data-control'=>"select2", 'required','placeholder' => __('messages.doctor.doctor')]) }}
    </div>

    @role('patient')
    {{ Form::hidden('patient_id',$patient->id) }}
    {{ Form::hidden('status',\App\Models\Appointment::BOOKED) }}
    @else
        <div class="col-lg-6 col-sm-12 mb-5">
            {{ Form::label('Service',__('messages.appointment.booking_space').':' ,['class' => 'form-label required']) }}
            {{ Form::select('service_id', $data['services'], null,['class' => 'io-select2 form-select', 'data-control'=>"select2", 'id'=> 'appointmentServiceId','placeholder' => __('messages.appointment.booking_space'),'required']) }}
        </div>
            {{ Form::hidden('status',\App\Models\Appointment::BOOKED) }}
            <div class="col-lg-6 col-sm-12 mb-5">
                {{ Form::label('Plantype',__('messages.appointment.plantype').':' ,['class' => 'form-label required']) }}
                {{ Form::select('plantype_id', $emptyData, null,['class' => 'io-select2 form-select', 'id' =>'plantype_id', 'data-control'=>"select2",'placeholder' => __('messages.appointment.plantype')]) }}
            </div>
        @endrole
        @php
            $styleCss = 'style';
        @endphp

        <div class="col-lg-6 mb-5 col-sm-12">
            {{ Form::label('Date',__('messages.appointment.appointment_date').':' ,['class' => 'form-label required']) }}
            {{ Form::text('date', null,['class' => 'form-control date','placeholder' => __('messages.appointment.appointment_date'), 'id'=>'appointmentDate', 'required','autocomplete'=>'off','disabled' => true]) }}
        </div>

        <div class="col-sm-12 col-lg-12 mb-5">
                {{ Form::label('Patient',__('messages.appointment.customer').':' ,['class' => 'form-label required']) }}
                {{ Form::select('patient_id', $data['patients'], null,['class' => 'io-select2 form-select', 'data-control'=>"select2",'placeholder' => __('messages.appointment.customer')]) }}
        </div>
        <input type="hidden" name="type_of_payment" id="type_of_payment" value="">
    <div id="slot_option">
        <div class="col-12 mb-3 form-group" >
            {{ Form::label('Available Slots',__('messages.appointment.available_slot').':' ,['class' => 'form-label required']) }}
            <div class="mb-0 d-inline-flex align-items-center ms-2">
                <span class="badge bg-danger badge-circle slot-color-dot"></span>
            <span class="ms-2">{{__('messages.appointment.booked')}}</span>
            <span class="badge bg-success ms-2 badge-circle slot-color-dot"></span>
        <span class="ms-2">{{__('messages.appointment.available')}}</span>
</div>
<div class="fc-timegrid-slot ps-5 pe-5 form-control form-control-solid h-300px overflow-auto">
    {{ Form::hidden('from_time', null,['id'=>'timeSlot',]) }}
    {{ Form::hidden('to_time', null,['id'=>'toTime',]) }}
    <div class="text-center d-flex flex-wrap justify-content-center px-3 appointment-slot-data" id="slotData">
    </div>
    <span class="justify-content-center d-flex p-20 text-primary no-time-slot">{{__('messages.appointment.no_slot_found')}}</span>
    <span class="justify-content-center d-flex p-20 text-primary d-none doctor-time-over">{{__('messages.doctors_scheduled_time_ended_for_today__')}}</span>
</div>
</div>
    </div>

@role('patient')
<div class="col-lg-6 col-sm-12 mb-5">
    {{ Form::label('Service',__('messages.appointment.service').':' ,['class' => 'form-label required']) }}
    {{ Form::select('service_id', [], null,['class' => 'io-select2 form-select', 'data-control'=>"select2", 'id'=> 'appointmentServiceId','placeholder' => __('messages.common.select_service'),'required']) }}
</div>
@endrole
<div class="col-lg-12 col-sm-12 mb-3">

<?php $payments = getAllPaymentStatus(); ?>

    {{ Form::label('Payment Type',__('messages.appointment.payment_method').':' ,['class' => 'form-label required']) }}

        <?php foreach($payments as $index => $value) {  ?>
            <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                    <label class="form-check" style="    padding-left: 0em;">
                        <input class="form-check-input feature mx-2" type="radio" value="<?php echo $index;  ?>"
                               name="payment_type" /><?php echo $value;  ?>
                    </label>
                </div>
                <div class="col-lg-6">
                    <?php  if($index == '4'){ ?>
                <img src="{{ asset('assets/image/paypall.png') }}" class="css-class credit" >
                <img src="{{ asset('assets/image/pay1.png') }}" class="css-class paypal" >
                <img src="{{ asset('assets/image/Group.png') }}" class="css-class visa" >
                <img src="{{ asset('assets/image/visa.png') }}" class="css-class " >
                <img src="{{ asset('assets/image/disc.png') }}" class="css-class" >
                <img src="{{ asset('assets/image/amex.png') }}" class="css-class" >
                <?php }else {  ?>
                <img src="{{ asset('assets/image/Group.png') }}" class="css-class visa" >
                <img src="{{ asset('assets/image/visa.png') }}" class="css-class " >
                <img src="{{ asset('assets/image/amex.png') }}" class="css-class" >
                <img src="{{ asset('assets/image/apple-pay.png') }}" class="css-class pay" >
                    <?php } ?>
                </div>
            </div>
 <?php }  ?>

</div>

<div class="col-lg-6 col-sm-12 mb-5" >
    {{ Form::label('Charge',__('messages.appointment.charge_amount').':' ,['class' => 'form-label']) }}
    <div class="input-group">
        <strong><span id="price_total">0</span></strong>
    </div>
</div>

<div class="col-lg-6 col-sm-12 mb-5" style="display: none;" >
    {{ Form::label('Charge',__('messages.appointment.charge').':' ,['class' => 'form-label required']) }}
    <div class="input-group">
        {{ Form::text('charge', null,['class' => 'form-control','placeholder' => 'Select Date', 'id'=>'chargeId', 'required', 'placeholder' => __('messages.appointment.charge'),'readonly']) }}
        <div class="input-group-text">
            <a class="fw-bolder text-gray-500 text-decoration-none">{{ getCurrencyIcon() }}</a>
        </div>
    </div>
</div>
@if(!getLogInUser()->hasRole('patient'))
        <div class="col-lg-6 col-sm-12 mb-5" style="display: none;" >
            {{ Form::label('Add Fees',__('messages.appointment.extra_fees').':' ,['class' => 'form-label']) }}
            <div class="input-group">
                {{ Form::text('add_fees',null,['class' => 'form-control', 'id' => 'addFees', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")',
                        'placeholder' => __('messages.appointment.extra_fees'),'step'=>'any']) }}
                <div class="input-group-text">
                    <a class="fw-bolder text-gray-500 text-decoration-none">{{ getCurrencyIcon() }}</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 mb-5" style="display: none;" >
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
<style>
  .paypal
  {
    border: 1px solid #8080804f;
    padding: 10px;
    border-radius: 6px;
    padding-left: 5px;
    padding-right: 5px;
  }
  .visa
  {
    border: 1px solid #8080804f;
    padding: 5px;
    border-radius: 6px;
    padding-left: 8px;
    padding-right: 8px;
  }
  .credit
  {
    height: 32px;
  }
  .pay
  {
    height: 28px;
  }
  .plantype_id
  {
    text-transform: capitalize;
  }
  select option {text-transform:capitalize}
  select {text-transform:capitalize}
    #slot_option
    {
        display: none;
    }
    .badge.badge-circle
    {
        border-radius: 0% !important;
    }
</style>
