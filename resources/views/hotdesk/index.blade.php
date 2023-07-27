@extends('fronts.layouts.app')
@section('front-title')
{{ __('hotdesk') }}
@endsection
@section('front-content')
@php
$styleCss = 'style';
@endphp

<div class="transition-none">
    <section class="title-hero-bg parallax-effect">
        <section class="title-hero-bg parallax-effect" style="background-image: url('{{$abouTimage1->value}}');">
            <!-- <img src="/assets/images/Frame_3.png" alt="" class=""> -->

            <div class="container">
                <div class="page-title text-center white-color">
                    <h1 class="set-space ellipsis1 padding-elips">{{$aboutTitle->value}}</h1>
                    <h4 class="workspace">
                        <div class="ellipsis padding-elips">
                            {!! $aboutShortDescription->value !!}
                        </div>
                    </h4>
                </div>
            </div>
        </section>
    </section>
</div>


<section class="main-block gray">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="grid">
                    <div class="hot-desk">
                        <h2>{{$servicesData->name}}</h2>
                        <p>{!! $servicesData->short_description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="h2-day">$40/Day</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="grid">
                    <figure class="effect-chico">
                        @if(!empty($servicesData->gallery[0]))
                        <img src="{{$servicesData->gallery[0]}}" alt="">
                        @else
                        <img src="/assets/images/image 9.png" alt="">
                        @endif
                    </figure>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">

                        <div class="grid">
                            <figure class="effect-chico">
                                @if(!empty($servicesData->gallery[1]))
                                <img src="{{$servicesData->gallery[1]}}" alt="">
                                @else
                                <img src="/assets/images/image 10.png" alt="">
                                @endif
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="grid">
                            <figure class="effect-chico">
                                @if(!empty($servicesData->gallery[2]))
                                <img src="{{$servicesData->gallery[2]}}" alt="">
                                @else
                                <img src="/assets/images/image 12.png" alt="">
                                @endif
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="row grid-space">
                    <div class="col-md-6">
                        <div class="grid">
                            <figure class="effect-chico">
                                @if(!empty($servicesData->gallery[3]))
                                <img src="{{$servicesData->gallery[3]}}" alt="">
                                @else
                                <img src="/assets/images/image 11.png" alt="">
                                @endif
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="grid">
                            <figure class="effect-chico">
                                @if(!empty($servicesData->gallery[4]))
                                <img src="{{$servicesData->gallery[4]}}" alt="">
                                @else
                                <img src="/assets/images/image 13.png" alt="">
                                @endif

                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="mains-blocks" style="background-image: url('{{$bodyimage1->value}}');">
    <div class="container" style="padding: 0px 5px;">
        <div class="row">
            <div class="col-md-8">
                <div class="grid">
                    <div class="hot-desks padding-b">
                        <h2>DESCRIPTION</h2>
                        <p>{!! $servicesData->short_description !!}</p>
                    </div>
                    <div class="Amenities padding-tb">
                        <h2>AMENITIES</h2>
                        <div class="amenities-block">
                            <div class="row mt-10 mb-1 col-12" style="display:flex;">
                                @foreach($specialization as $specializationData)
                                <div class="col-6 icon-set" style="padding-left:0;">
                                    <p class="heading-id amies-font">
                                        <img src="{{$specializationData->icon}}" alt="#"
                                            style="height: 30px; padding-right:10px;">
                                        {{$specializationData->name}}
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <?php
                                $var_dump = json_decode($doctor->days);
                            ?>
                    <div class="Operating padding-tb" style="margin-bottom:60px;">
                        <h2>OPERATING HOURS</h2>
                        <div class="operating-block">
                            @php
                            $dayLabels = [1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 =>
                            'Friday', 6 => 'Saturday', 7 => 'Sunday'];
                            @endphp

                            @if(!empty($var_dump))
                            @for($day = 1; $day <= 7; $day++) @php $found=false; @endphp @foreach($var_dump as $data)
                                @if($data->day_of_week == $day)
                                <div class="row mt-10 mb-2 col-lg-12">
                                    <div class="col-lg-2 col-xl-2 col-sm-4 col-xs-2 set-day day-small">
                                        <span class="heading-id2">{{ $dayLabels[$day] }}</span>
                                    </div>
                                    <div class="col-lg-5 col-xl-4 col-sm-6 col-xs-4 day-small1">
                                        <span class="sub-name">@if(!empty($data->start_time))
                                            {{ $data->start_time }} -
                                            @else 00:00 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -
                                            @endif
                                            @if(!empty($data->end_time))
                                            {{ $data->end_time }}
                                            @else 00:00
                                            @endif</span>
                                    </div>
                                </div>
                                @php
                                $found = true;
                                @endphp

                                @endif
                                @endforeach
                                @if(!$found)
                                <div class="row mt-10 mb-2 col-lg-12">
                                    <div class="col-lg-2 col-xl-2 col-sm-4 col-xs-2 set-day day-small">
                                        <span class="heading-id2">{{ $dayLabels[$day] }}</span>
                                    </div>
                                    <div class="col-lg-5 col-xl-4 col-sm-6 col-xs-4 day-small1">
                                        <span class="sub-name" style="text-transform:capitalize;">Closed</span>
                                    </div>
                                </div>
                                @endif
                                @endfor
                                @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="h2-plans left-plan">PLANS</h2>
                <div class="hours-plan">
                    <div class="hour-plan ">
                        <div class="col-md-6 row" style="margin-left:0;">
                            <div class="grid">
                                <h2 class="h2-hourplan" style="text-align:start;margin-top: 10px;">Hour Plan</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="grid grid-hours">

                                <p class="hou-p" id="price" style="text-align:end;">$ {{$servicesData->charges}}/Hour
                                </p>
                                <div class="hourplan-button" style="text-align:end;">
                                    @if(getLogInUser())
                                    <button type="button" class="dayplan-btn"
                                        onclick="displayMessage(1,'{{ $servicesData->charges }}','{{$servicesData->id}}');">Book
                                        Now</button>
                                    @else
                                    <a href="{{ route('login') }}" type="button" class="btn1 btn1-primary1 dayplan-btn"
                                        style="text-decoration: none; text-align: center; padding-top: 9px;"
                                        data-turbo="false">
                                        Book Now
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-space days-plan">
                    <div class="day-plan">
                        <div class="col-md-6 row" style="margin-left:0px;">
                            <div class="grid">
                                <h2 class="h2-dayplan" style="text-align:start; margin-top: 10px;">Day Plan</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="grid" style="text-align:end;">
                                <p class="da-p">${{$servicesData->charges_daily}} /Day</p>
                                <div class="dayplan-button" style="text-align:end;">
                                    @if(getLogInUser())
                                    <button type="button" class="dayplan-btn"
                                        onclick="displayMessage(2, '{{$servicesData->charges_daily}}','{{$servicesData->id}}');">Book
                                        Now</button>
                                    @else
                                    <a href="{{ route('login') }}" type="button" class="btn1 btn1-primary1 dayplan-btn"
                                        style="text-decoration: none; text-align: center; padding-top: 9px;"
                                        data-turbo="false">
                                        Book Now
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="hour_plan_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width:1000px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="book-space">BOOK A SPACE</div>
            <div class="modal-body">
                <?php $emptyData = array(); ?>
                <form class="book-appointment-form bg-white" id="frontAppointmentBook"
                    action="{{ route('front.appointment.book') }}" method="post">
                    @csrf

                    <div class="row">
                        @if(getLogInUser())
                        <div class="col-lg-6 name-details">
                            <div class="form-group">
                                <label class="form-label"
                                    for="template-medical-first_name">{{ __('messages.patient.first_name') }}:<span
                                        class="required"></span></label>
                                <input type="text" class="form-control" id="template-medical-first_name"
                                    placeholder="{{ __('messages.doctor.first_name') }}" name="first_name"
                                    value="{{ getLogInUser()->first_name }}" readonly>
                            </div>
                        </div>
                        @endif
                        @if(getLogInUser())
                        <div class="col-lg-6 name-details">
                            <div class="form-group">
                                <label class="form-label"
                                    for="template-medical-last_name">{{ __('messages.patient.last_name') }}:<span
                                        class="required"></span></label>
                                <input type="text" id="template-medical-last_name" name="last_name" class="form-control"
                                    value="{{ getLogInUser()->last_name }}"
                                    placeholder="{{ __('messages.doctor.last_name') }}" readonly>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        @if(getLogInUser())
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"
                                    for="template-medical-email">{{ __('messages.patient.email') }}:<span
                                        class="required"></span></label>
                                <input type="email" id="template-medical-email" name="email" class="form-control"
                                    value="{{ getLogInUser()->email }}" placeholder="{{ __('messages.web.email') }}"
                                    readonly>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="Doctor">{{ __('messages.doctor.doctor')}}: <span
                                        class="required"></span></label>
                                {{ Form::select('doctor_id', $appointmentDoctors, isset(session()->get('data')['doctor_id']) ? session()->get('data')['doctor_id'] : $doctor->id,['class' => 'form-select', 'id' => 'appointmentDoctorId', 'data-control'=>"select2",'placeholder' =>  __('messages.common.select_doctor')]) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="Service">Booking Space: <span
                                        class="required"></span></label>
                                {{ Form::select('service_id', isset(session()->get('data')['service']) ? session()->get('data')['service'] : [] , isset(session()->get('data')['service_id']) ? session()->get('data')['service_id'] : '',['class' => 'form-select', 'data-control'=>"select2", 'id'=> 'FrontAppointmentServiceId','placeholder' => __('messages.common.select_service') ]) }}
                            </div>

                        </div>
                        <div class="form-group col-sm-6">
                            {{ Form::label('Plan Type', __('Plan Type').(':'), ['class' => 'form-label']) }}
                            <span class="required"></span>
                            {{ Form::text('plan_type', null, ['class' => 'form-control','required', 'id' => 'adminAppointmentPlanId','placeholder' => __('Plan Type'),'readonly']) }}
                        </div>
                        <input type="hidden" id="adminAppointmentPlanId" value="adminAppointmentPlanId">
                        <input type="hidden" name="payable_amount" id="payable_amount" value="10">
                        <input type="hidden" name="charge" value="10">


                    </div>
                    <div class="col-lg-6 d-none registered-patient">
                        <div class="form-group">
                            <label class="form-label "
                                for="template-medical-first_name">{{ __('messages.web.patient_name') }}:</label>
                            <input type="text" id="patientName" readonly class="form-control" value=""
                                placeholder="{{ __('messages.web.patient_name') }}">
                        </div>
                    </div>

                    <div class="col icon-set" style="text-align:center;">
                        <span class="heading-id"><img src="/assets/image/image 12.png" alt="#"
                                style="width:100%;  margin-bottom: 20px;"></span>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="templateAppointmentDate">Appointment Date:<span
                                    class="required"></span></label>
                            <div class="position-relative">
                                <input type="text" id="templateAppointmentDate" name="date"
                                    class="form-control bg-white" data-uk-datepicker-locale="fr"
                                    value="{{  isset(session()->get('data')['date']) ? session()->get('data')['date'] : '' }}"
                                    placeholder="{{ __('messages.doctor.select_date') }}" autocomplete="true" readonly>
                                <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4"
                                    id="templateAppointmentDate">
                                    <i class="fa-solid fa-calendar-days text-gray-200 date-icon"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    @php
                    $styleCss = 'style';
                    @endphp
                    <div class="col-12" id="slot_option">
                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                {{ Form::label('Available Slots',__('messages.appointment.available_slot').':' ,['class' => 'form-label me-3 required']) }}
                                <div class="d-flex align-items-center">
                                    <div class="form-check d-flex align-items-center mb-2">
                                        <input class="form-check-input form-check-danger me-2 mt-0" type="checkbox"
                                            value="" id="defaultCheck1">
                                        <label class="form-check-label label-font  fw-light fs-small"
                                            for="defaultCheck1">
                                            {{__('messages.appointment.booked')}}
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center mb-2 ms-3">
                                        <input class="form-check-input form-check-success me-2 mt-0" type="checkbox"
                                            value="" id="defaultCheck1">
                                        <label class="form-check-label label-font  fw-light fs-small"
                                            for="defaultCheck1">
                                            {{__('messages.appointment.available')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="slots-box">
                                {{ Form::hidden('from_time', null,['id'=>'timeSlot',]) }}
                                {{ Form::hidden('to_time', null,['id'=>'toTime',]) }}
                                <div class=" flex-wrap align-items-center front-slot-data appointment-slot-data"
                                    id="slotData">
                                    <p class="mb-0 text-center  no-time-slot  no-slot-color">
                                        {{__('messages.appointment.no_slot_found')}}
                                    </p>
                                </div>
                                <p class="mb-0 text-center d-none no-time-slot  no-slot-color">
                                    {{__('messages.appointment.no_slot_found')}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <label for="Payment Method" class="form-label required">Payment Method:</label>
                    </div>
                    <div class="row col-md-12 mb-3">
                        <div class="col-3">
                            <div><input id="payment_type" type="radio" name="payment_type" value="4"><span
                                    class="radio-btn">PayPal</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-10 col-xs-10 centerize-col text-center social-icons-style-09">
                            <ul class="xl-icon mb-0" style="display:flex; place-content:start;">
                                <li class="radio-btn1"><a><img src="/assets/image/paypall.png" alt="#"></i></a></li>
                                <li class="radio-btn1"><a><img src="/assets/image/pay1.png" alt="#"></i></a></li>
                                <li class="radio-btn1"><a><img src="/assets/image/Group.png" alt="#"></i></a></li>
                                <li class="radio-btn1"><a><img src="/assets/image/visa.png" alt="#"></i></a></li>
                                <li class="radio-btn1"><a><img src="/assets/image/disc.png" alt="#"></i></a>
                                <li class="radio-btn1"><a><img src="/assets/image/amex.png" alt="#"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row col-md-12 mb-4">
                        <div class="col-3">
                            <div>
                                <input id="payment_type" type="radio" name="payment_type" value="2">
                                <span class="radio-btn1">Stripe </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-10 col-xs-10 centerize-col text-center social-icons-style-09">
                            <ul class="xl-icon mb-0" style="display:flex; place-content:start;">
                                <li class="radio-btn1"><a><img src="/assets/image/visa.png" alt="#"></i></a></li>
                                <li class="radio-btn1"><a><img src="/assets/image/Group.png" alt="#"></i></a></li>
                                <li class="radio-btn1"><a><img src="/assets/image/amex.png" alt="#"></i></a>
                                <li class="radio-btn1"><a><img src="/assets/image/apple-pay.png" alt="#"></i></a></li>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="alert alert-danger d-none hide"></div>
                    <div class="book-appointment-message"></div>
                    <div class="container">
                        @include('flash::message')
                    </div>
                    <div class="pay-amnt mb-4">
                        <div>Payable Amount : $</div>
                        <div id="payable_amount_Show"></div>
                    </div>
                    <div class="modal-footer pt-0 mt-4" style="place-content:center;">
                        <button type="submit" class="btns btn-secondarys">{{ __('Confirm Booking') }}</button>
                    </div>
            </div>
        </div>


        </form>
    </div>
</div>

</div>
</div>

<script>
setTimeout(function() {
    $('#hour_plan_modal').modal();
}, 5000);

$('#hour_plan_modal').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
    window.location.reload();
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var appointmentDateInput = document.getElementById('appointment-date');

    appointmentDateInput.addEventListener('change', function() {
        var selectedDate = appointmentDateInput.value;
        var additionalInfoDiv = document.getElementById('additional-info');

        if (selectedDate !== '') {
            console.log('fffffffffffffffff');
            additionalInfoDiv.style.display = 'block';
        } else {
            additionalInfoDiv.style.display = 'none';
        }
    });
});

function displayMessage(id, price, service_id) {
    if (id == 1) {
        var abc = 'Hour Plan';
        $('#slot_option').show();
    } else {
        var abc = 'Day Plan';
        $('#slot_option').hide();
    }
    var conceptName = $('#appointmentDoctorId').find(":selected").val();
    $.ajax({
        url: route('get-service'),
        type: 'GET',
        data: {
            'appointmentDoctorId': conceptName,
        },
        success: function(result) {
            if (result.success) {
                $('#FrontAppointmentServiceId').empty();
                $('#FrontAppointmentServiceId').append($('<option value=""></option>').text(
                    'select booking space'));
                $.each(result.data, function(i, v) {
                    var new_service = (v.id == service_id) ? "selected" : "";
                    $('#FrontAppointmentServiceId').append($('<option ' + new_service +
                        '></option>').attr('value', v.id).text(v.name));
                });
            }
        },
    });
    $('#adminAppointmentPlanId').val(abc);
    $('#payable_amount').val(price);
    $('#payable_amount_Show').text(price);
    $('#FrontAppointmentServiceId').val(service_id);


    $.ajax({
        type: 'POST',
        url: "{{ route('authorize-check') }}",
        data: {
            "_token": "{{ csrf_token() }}",
            "name": "name"
        },
        success: function(data) {
            if (data.success == true) {
                $("#hour_plan_modal").modal('show');
            } else {
                var url = "{{ route('login') }}";
                location.href = url;
            }
        }
    });

}
</script>
<script>
$(document).ready(function() {
    $('#templateAppointmentDate').datepicker({
        language: 'es-es',
        format: 'yyyy-mm-dd',
        minDate: new Date(),
        startDate: new Date(),
        todayHighlight: true,
    });

    // Event handler for input click
    $('#templateAppointmentDate').on('click', function() {
        $(this).datepicker('show');
    });

    // Event handler for date icon click
    $('.date-icon').on('click', function() {
        $('#templateAppointmentDate').datepicker('show');
    });
});
$(document).ready(function() {
    $('#appointmentDate1').change(function() {

        selectedDate = $(this).val();
        let userRole = $('#patientRole').val();
        var timezoneOffsetMinutes = 330;
        let appointmentIsEdit = $('#appointmentIsEdit').val();
        $('.appointment-slot-data').html('');
        let url = route('doctor-session-time');
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                'adminAppointmentDoctorId': $('#adminAppointmentDoctorId').val(),
                'date': selectedDate,
                'timezone_offset_minutes': timezoneOffsetMinutes,
            },
            success: function(result) {
                if (result.success) {
                    if (result.data['bookedSlot'] != null && result.data['bookedSlot']
                        .length > 0) {
                        if (result.data['slots'].length == 0) {
                            $('.no-time-slot').addClass('d-none');
                            $('.doctor-time-over').removeClass('d-none');
                        }
                    }
                    $.each(result.data['slots'], function(index, value) {
                        if (appointmentIsEdit && fromTime == value) {
                            $('.no-time-slot').addClass('d-none');
                            $('.doctor-time-over').addClass('d-none');
                            $('.appointment-slot-data').append(
                                '<span class="time-slot col-2  activeSlot" data-id="' +
                                value + '">' + value + '</span>');
                        } else {
                            $('.no-time-slot').addClass('d-none');
                            $('.doctor-time-over').addClass('d-none');
                            if (result.data['bookedSlot'] == null) {
                                $('.appointment-slot-data').append(
                                    '<span class="time-slot col-2" data-id="' +
                                    value + '">' + value + '</span>');
                            } else {
                                if ($.inArray(value,
                                        result.data['bookedSlot']) !== -1) {
                                    $('.appointment-slot-data').Morin
                                    append(
                                        '<span class="time-slot col-2 bookedSlot " data-id="' +
                                        value + '">' + value + '</span>');
                                } else {
                                    $('.appointment-slot-data').
                                    append(
                                        '<span class="time-slot col-2" data-id="' +
                                        value + '">' + value + '</span>');
                                }

                            }
                        }
                    });
                }
            },
            error: function(result) {
                $('.no-time-slot').removeClass('d-none');
                $('.doctor-time-over').addClass('d-none');
                displayErrorMessage(result.responseJSON.message);
            },
        });




    });
});

$('input[type="date"]').change(function() {
    // $('#appointmentDate1').change(function() {

    alert('sss');

});
</script>
<style>
body {
    font-family: "Noto Serif" !important;
}
.form-label {
    color: #000000;
    font-size: 15.85px !important;
    font-weight: 400 !important;
    line-height: 23.78px;
    font-family: 'Poppins' !important;
}
.form-control, .form-select {
    height: 49.37px !important;
    border-radius: 1.59px !important;
    font-size: 15.85px !important;
    font-weight: 400 !important;
    padding: 13px 16px 13px 16px !important;
    border-color: #000000 !important;
    border: 2px solid #273432 !important;
    line-height: 23.78px !important;
    font-family: 'Poppins' !important;
}

.left-plan {
    margin-left: -5px;
}

.padding-tb {
    padding-bottom: 7.5px;
    padding-top: 7.5px;
}

.padding-b {
    padding-bottom: 7.5px;
}

.ellipsis {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    text-overflow: ellipsis;
    font-size: 40px;
    font-weight: 400;
    line-height: 54.48px;
}

.ellipsis1 {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    /* Number of lines to show */
    overflow: hidden;
    text-overflow: ellipsis;
}

a:hover {
    color: #273432 !important;
}

.amies-font {
    font-size: 20px;
    font-weight: 400;
    line-height: 30px;
    color: #000000;
}

.pay-amnt {
    display: flex;
    justify-content: center;
    font-size: 24.96px;
    font-weight: 700;
    line-height: 34px;
    margin-top: 10px;
}

@media (max-width: 767px) {

    .form-control,
    .form-select {
        height: 50px;
        font-size: 16px;
        padding: 10px !important;
    }
}

@media (min-width:1024px) and (max-width:1200px) {
    .set-day {
        width: 25% !important;
    }
}

@media (min-width:320px) and (max-width:767px) {
    .grid-hours {
        margin-left: -15px !important;
    }
}

@media (min-width:768px) and (max-width:800px) {
    .radio-btn {
        font-size: 14px !important;
    }
}

@media (min-width:320px) and (max-width:375px) {
    .stripes {
        width: 100% !important;
    }

    .pay-pal {
        display: grid !important;
    }
}

@media(min-width:768px) {
    .padding-elips {
        padding-left: 150px;
        padding-right: 150px;
    }
}

@media (min-width:320px) and (max-width:767px) {
    .padding-elips {
        padding-left: 30px;
        padding-right: 30px;
    }

    .page-title h1 {
        font-size: 70px;
        line-height: 40.34px !important;
    }
}

@media (min-width:768px) and (max-width:1024px) {
    .icon-set {
        width: 100% !important;
    }

    .dayplan-btn {
        padding: 10px;
        width: auto !important;
    }

    .h2-hourplan {
        font-size: 15px !important;
        color: #000000;
    }

    p.hou-p {
        font-size: 15px !important;
    }

    h5,
    .fs-5 {
        font-size: 15px !important;
    }

    .row.hours-plan {
        width: 240px;
    }

    .row.grid-space.days-plan {
        width: 240px;
    }
}

@media (min-width:768px) and (max-width:1440px) {
    .grid figure {
        margin: 2px -8px 3px !important;
    }
}

@media (min-width:1025px) and (max-width:1290px) {
    .dayplan-btn {
        width: 130px !important;
    }
}

@media (min-width:320px) and (max-width:600px) {
    .amenities-block {
        width: inherit !important;
    }

    .amies-font {
        font-size: 13px !important;
    }

    .stripes {
        width: 100% !important;
    }

    .set-box {
        margin-left: 30px !important;
    }

    .set-space {
        font-size: 35px !important;
    }

    .workspace {
        font-size: 20px !important;
    }

    .main-block {
        padding: 0px !important;
    }

    .hot-desk {
        margin-top: 0px !important;
    }

    .h2-day {
        text-align: start !important;
    }

    .day-plan {
        display: flex;
        border: 1px solid #D9D9D9;
        margin-bottom: 20px;
    }

    .hot-desk {
        text-align: start;
        margin-bottom: 20px !important;
    }

    .h2-day {
        font-size: 20px;
        color: #000000;
        margin-bottom: 10px !important;
    }

    .title-hero-bg {
        min-height: 430px !important;
    }

    section.main-block.gray {
        margin-top: 20px;
    }

    section.mains-blocks {
        padding: 0px !important;
        margin-top: 30px !important;
        background: #fbfbfb;
    }

    .grid figure {
        position: relative;
        overflow: hidden;
        min-width: 100%;
        margin: 0px 0px 5px !important;
    }

    .icon-set {
        width: auto !important;
    }

    .day-small {
        width: 30% !important;
    }

    .day-small1 {
        width: 50% !important;
    }
}

.modal-header {
    border-bottom: none !important;
}

.label-font {
    font-size: 15.85px;
    font-weight: 400;
    line-height: 23.78px;
}

.btn-close {
    width: 22.66px;
    height: 22.66px;
    color: #000000;
    opacity: .5;
}

.book-space {
    text-align: center;
    font-size: 39.64px;
    font-weight: 700;
    margin-top: -15px;
    line-height: 53.98px;
}

.popular-tags button {
    display: inline-block;
    padding: 10px 0px;
    margin: 5px 5px 10px -9px;
    border: 1px solid #B0DFCA;
    background: #B0DFCA;
    color: #025C34;
    font-size: 14px;
    width: 180px;
}

.modal-footer {
    border-top: none !important;
}

.radio-btn1 {
    padding: 0px 5px;
}

.radio-btn {
    padding: 0px 10px;
    font-size: 14.27px;
    font-weight: 400;
    color: #000000;
    line-height: 21.41px;
}

.set-back {
    background: #F5F5F5;
}

.ser-gap-time {
    margin-right: 20px;
}

.set-box {
    margin-left: 50px;
}

.one-line-set {
    display: flex;
}

.badge:empty {
    display: block !important;
}

.badge.badge-circle {
    border-radius: 2px;
    min-width: 20px;
    width: 20px;
    height: 20px;
}


.new-icon {
    border: 2px solid;
    background: #F62947;
    border-color: #F62947;
    border-radius: 0px;
    margin-top: 10px;
    width: 20px !important;
    height: 26px;
}

.btns {
    width: 158.55px;
    height: 32.85px;
    line-height: 17.28px;
    font-weight: 600;
    font-size: 12.68px;
    padding: 8px 4px 8px 4px;
}

.btn-secondarys {
    color: #ffffff !important;
    background-color: #273432;
    border: 1px solid #273432;
}

.page-title {
    position: absolute;
    top: 60%;
    width: 100%;
    text-align: center;
    left: 0;
    -webkit-transform: translate(0%, -50%);
    -moz-transform: translate(0%, -50%);
    -ms-transform: translate(0%, -50%);
    -o-transform: translate(0%, -50%);
    transform: translate(0%, -50%);
}

.white-color {
    color: #fff;
}

.page-title h1 {
    font-size: 70px;
    line-height: 95.34px;
    font-weight: 700;
    margin: 0;
}

.workspace {
    line-height: 40px;
    font-size: 30px;
    font-weight: 300;
    margin-top: 20px;
}

section.title-hero-bg.parallax-effect img {
    width: 100%;
}

.gray {
    background: #fbfbfb;
}

.main-block {
    padding: 100px;
}

.container-fluid {
    max-width: 1500px;
}

.grid {
    position: relative;
    margin: 0 auto;
    max-width: 100%;
    list-style: none;
    text-align: center;
}

figure.effect-chico {
    margin: 0;
}

.grid figure {
    position: relative;
    overflow: hidden;
    min-width: 100%;
    margin: 3px 0px 5px;
    text-align: center;
    cursor: pointer;
}

.detailed-item-mr {
    margin-bottom: 25px;
}

.h2-day {
    font-size: 20px;
    text-align: end;
    color: #000000;
    margin-bottom: 40px;
}

.hot-desk {
    text-align: start;
    margin-top: -20px;
    margin-bottom: 50px;
}

.hot-desk h2 {
    color: #000000;
    font-size: 50px;
    font-weight: 700;
    line-height: 68.1px;
}

.hot-desk p {
    color: #000000;
    line-height: 30px;
    font-size: 20px;
    margin-top: -15px;
    font-weight: 400;
}

.hot-desks {
    text-align: start;
}

.hot-desks h2 {
    font-size: 35px;
    margin-bottom: -10px;
    color: #000000;
    font-weight: 700;
    line-height: 47.67px;
}

.hot-desks p {
    font-size: 16px;
    color: #000000;
}

.amenities-block {
    display: flex;
    justify-content: space-around;
    text-align: start;
    width: 50%;
}

.Amenities h2 {
    font-size: 35px;
    margin-bottom: 10px;
    color: #000000;
    font-weight: 700;
    line-height: 47.67px;
    text-align: start;
}

.operating-block {
    /* display: flex; */
    justify-content: space-around;
    text-align: start;
    /* width: 50%; */
}

.Operating h2 {
    font-size: 35px;
    margin-bottom: 10px;
    color: #000000;
    font-weight: 700;
    line-height: 47.67px;
    text-align: start;
}

.h2-plans {
    font-size: 35px;
    margin-bottom: 10px;
    color: #000000;
    font-weight: 700;
    line-height: 47.67px;
    text-align: start;
}

.h2-hourplan {
    font-size: 25px;
    color: #000000;
    font-weight: 700;
    line-height: 34.05px;
}

.h2-dayplan {
    font-size: 25px;
    color: #000000;
    font-weight: 700;
    line-height: 34.05px;
}

.hourplan-button {
    text-align: center;
    /* padding-top: 60px; */
    margin-bottom: 30px;
}

.hourplan-btn {
    padding: 10px;
    width: 170px;
    height: 40px;
    font-size: 15px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}

.dayplan-button {
    text-align: center;
    /* padding-top: 60px; */
    margin-bottom: 30px;
}

.dayplan-btn {
    padding: 10px 5px 10px 5px;
    width: 175px;
    height: 42px;
    font-size: 16px;
    line-height: 21.79px;
    font-weight: 600;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}

.hour-plan {
    display: flex;
    border: 1px solid #D9D9D9;
    margin-bottom: 15px;
}

.day-plan {
    display: flex;
    border: 1px solid #D9D9D9;
}

p.hou-p {
    font-size: 20px;
    color: #000000;
    margin-top: 20px;
    font-weight: 600;
    line-height: 27.24px;
}

p.da-p {
    font-size: 20px;
    color: #000000;
    margin-top: 20px;
    font-weight: 600;
    line-height: 27.24px;
}

section.mains-blocks {
    padding: 100px;
    margin-top: -75px;
    background: #fbfbfb;
}

.grid figure {
    position: relative;
    overflow: hidden;
    min-width: 100%;
    margin: 3px 0px 5px;
    text-align: center;
    cursor: pointer;
}

.title-hero-bg {
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    min-height: 550px;
}

#slot_option {
    display: none;
}

.pay-pal {
    display: flex;
    place-content: start;
}

.badge-lg {
    padding: 10px;
    font-size: 16px;
    font-weight: 500;
    border-radius: 10px;
    height: 44px;
    line-height: 26px;
    margin: 5px 5px 0px 0px;
    cursor: pointer;
    width: 235px;
}

.btn1:hover {
    background: #273432 !important;
    border: #273432 !important;
    color: #FFFFFF !important;
}

.no-slot-color {
    background: #F5F5F5;
    padding: 30px;
}

.heading-id2 {
    font-size: 20px;
    font-weight: 600;
    line-height: 30px;
}

.sub-name {
    font-size: 20px;
    color: #000000;
    font-weight: 400;
    line-height: 30px;
    text-transform: lowercase;
}
</style>

@endsection