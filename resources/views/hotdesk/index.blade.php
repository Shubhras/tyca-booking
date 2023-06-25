@extends('fronts.layouts.app')
@section('front-title')
{{ __('hotdesk') }}
@endsection


@section('front-content')

<div class="transition-none">
    <section class="title-hero-bg parallax-effect">
        <section class="title-hero-bg parallax-effect" style="background-image: url(/assets/images/Frame_3.png);">
            <!-- <img src="/assets/images/Frame_3.png" alt="" class=""> -->

            <div class="container">
                <div class="page-title text-center white-color">
                    <h1 class="set-space">BOOK A SPACE</h1>
                    <h4 class="workspace">Interested in our workspace?
                        <br> Book a slot for our space now!
                    </h4>
                </div>
            </div>
        </section>
</div>

<section class="main-block gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="grid">
                    <div class="hot-desk">
                        <h2>HOT DESK</h2>
                        <p>at Thank You Come Again @ Balestier</p>
                    </div>
                    <figure class="effect-chico">
                        <img src="/assets/images/image 9.png" alt="" class="">
                    </figure>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="h2-day">${{$servicesData->charges_daily}}/Day</h2>
                <div class="row">
                    <div class="col-md-6">

                        <div class="grid">
                            <figure class="effect-chico">
                                <img src="/assets/images/image 10.png" alt="" class="">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="grid">
                            <figure class="effect-chico">
                                <img src="/assets/images/image 12.png" alt="" class="">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="row grid-space">
                    <div class="col-md-6">
                        <div class="grid">
                            <figure class="effect-chico">
                                <img src="/assets/images/image 11.png" alt="" class="">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="grid">
                            <figure class="effect-chico">
                                <img src="/assets/images/image 13.png" alt="" class="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mains-blocks">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="grid">
                    <div class="hot-desks">
                        <h2>DESCRIPTION</h2>
                        <p>{{$servicesData->short_description}}</p>
                    </div>
                    <div class="Amenities">
                        <h2>AMENITIES</h2>
                        <div class="amenities-block">
                            <div class="row mt-10 mb-1 col-12" style="display:flex;">
                                @foreach($specialization as $specializationData)
                                <div class="col-6 icon-set">
                                    <p class="heading-id">
                                        <img src="{{$specializationData->icon}}" alt="#"
                                            style="padding-right:10px; width: 30px; height: 30px;">
                                        {{$specializationData->name}}
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="Operating">
                        <h2>OPERATING HOURS</h2>
                        <div class="operating-block">
                            <?php
                             $var_dump = json_decode($doctor->days);
                             ?>
                            @if(!empty($var_dump))
                            @foreach($var_dump as $day)
                            <div class="operating-right" style="display:grid;">
                                @if($day->day_of_week == 1)
                                <div class="one-line-set">
                                    <b class="ser-gap-time">Monday</b>
                                    <p>{{$day->start_time}} - {{$day->end_time}}</p>
                                </div>
                                @endif

                                @if($day->day_of_week == 2)
                                <div class="one-line-set">
                                    <b class="ser-gap-time">Tuesday</b>
                                    <p>{{$day->start_time}} - {{$day->end_time}}</p>
                                </div>
                                @endif
                                @if($day->day_of_week == 3)
                                <div class="one-line-set">
                                    <b class="ser-gap-time">Wednesday</b>
                                    <p>{{$day->start_time}} - {{$day->end_time}}</p>
                                </div>
                                @endif
                                @if($day->day_of_week == 4)
                                <div class="one-line-set">
                                    <b class="ser-gap-time">Thursday</b>
                                    <p>{{$day->start_time}} - {{$day->end_time}}</p>
                                </div>
                                @endif
                                @if($day->day_of_week == 5)
                                <div class="one-line-set">
                                    <b class="ser-gap-time">Friday</b>
                                    <p>{{$day->start_time}} - {{$day->end_time}}</p>
                                </div>
                                @endif
                                @if($day->day_of_week == 6)
                                <div class="one-line-set">
                                    <b class="ser-gap-time">Saturday</b>
                                    <p>{{$day->start_time}} - {{$day->end_time}}</p>
                                </div>
                                @endif
                                @if($day->day_of_week == 7)
                                <div class="one-line-set">
                                    <b class="ser-gap-time">Sunday</b>
                                    <p>{{$day->start_time}} - {{$day->end_time}}</p>
                                </div>
                                @endif
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="h2-plans">PLANS</h2>
                <div class="row hours-plan">
                    <div class="hour-plan">
                        <div class="col-md-6">
                            <div class="grid">
                                <h2 class="h2-hourplan">Hour Plan</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="grid">
                                <p class="hou-p">$ {{$servicesData->charges}}/Hour</p>
                                <div class="hourplan-button">
                                    <button type="button" class="dayplan-btn" onclick="displayMessage();">Book
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row grid-space days-plan">
                    <div class="day-plan">
                        <div class="col-md-6">
                            <div class="grid">
                                <h2 class="h2-dayplan">Day Plan</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="grid">
                                <p class="da-p">${{$servicesData->charges_daily}} /Day</p>
                                <div class="dayplan-button">
                                    <button type="button" class="dayplan-btn" onclick="displayMessage();">Book
                                        Now</button>
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
                <div class="alert alert-danger d-none hide"></div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('First Name', __('First Name').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('First Name', null, ['class' => 'form-control','required','placeholder' => __('First Name')]) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('Last Name', __('Last Name').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('Last Name', null, ['class' => 'form-control','required','placeholder' => __('Last Name')]) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('Email', __('Email Name').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('Email', null, ['class' => 'form-control','required','placeholder' => __('Email')]) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('Outlet',__('Outlet').':' ,['class' => 'form-label required']) }}
                        {{ Form::select('Outlet', [], null,['class' => 'io-select2 form-select', 'id' => 'adminAppointmentDoctorId', 'data-control'=>"select2", 'required','placeholder' => __('Select Outlet')]) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('Booking Space',__('Booking Space').':' ,['class' => 'form-label required']) }}
                        {{ Form::select('Booking Space', [], null,['class' => 'io-select2 form-select', 'id' => 'adminAppointmentDoctorId', 'data-control'=>"select2", 'required','placeholder' => __('Select Booking Space')]) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('Plan Type',__('Plan Type').':' ,['class' => 'form-label required']) }}
                        {{ Form::select('Plan Type', [], null,['class' => 'io-select2 form-select', 'id' => 'adminAppointmentDoctorId', 'data-control'=>"select2", 'required','placeholder' => __('Plan Type')]) }}
                    </div>
                </div>

                <div class="col icon-set" style="text-align:center;">
                    <span class="heading-id"><img src="/assets/image/image 12.png" alt="#" style="width:900px;"></span>
                </div>
                <div class="row mt-3">
                    <div class="form-group col-sm-12">
                        {{ Form::label('Appointment Date', __('Appointment Date').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::date('Appointment Date', null, ['class' => 'form-control','required','placeholder' => __('Select Appointment Date'),'id' => 'appointment-date']) }}
                    </div>
                </div>
                <div id="additional-info" style="display:none;">
                    <div class="popular-tags mb-3" style="margin-left:10px;">
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            07:00am
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            08:00am
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            09:00am
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            10:00am
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            11:00am
                        </button>
                        <!-- </div> -->
                        <!-- <div class="popular-tags" style="margin-left:10px;"> -->
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            12:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            01:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            02:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            03:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            04:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            05:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            06:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            07:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            08:00pm
                        </button>
                    </div>
                    <!-- <div class="popular-tags mb-3" style="margin-left:10px;">
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            05:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            06:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            07:00pm
                        </button>
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                            08:00pm
                        </button>
                    </div> -->
                </div>
                <div class="col-12 form-group">
                    <label for="Available Slots" class="form-label required">Available Slots:</label>
                    <div class="mb-0 d-inline-flex align-items-center set-box">
                        <span class="badge bg-danger badge-circle slot-color-dot"></span>
                        <span class="ms-2">Booked</span>
                        <span class="badge bg-success set-box badge-circle slot-color-dot"></span>
                        <span class="ms-2">Available</span>
                    </div>
                </div>
                <div class="row set-back">
                    <p style="text-align:center; margin-top:20px;">
                        No Time Slots Found
                    </p>
                </div>
                <div class="col-12 mt-3">
                    <label for="Payment Method" class="form-label required">Payment Method:</label>
                </div>
                <div class="row col-md-12 mb-3">
                    <div class="col-3">
                        <div><input id="female" type="radio" name="gender" value="Female"><span
                                class="radio-btn">PayPall</span></div>
                        <!-- <div><input id="male" type="radio" class="form-control" name="gender" value="Male"> {{ (old('sex') == 'male') ? 'checked' : '' }} >Male</div> -->
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
                <div class="row col-md-12 mb-3">
                    <div class="col-3">
                        <div><input id="female" type="radio" name="gender" value="Female"><span class="radio-btn">Stripe
                                Checkout</span></div>
                        <!-- <div><input id="male" type="radio" class="form-control" name="gender" value="Male"> {{ (old('sex') == 'male') ? 'checked' : '' }} >Male</div> -->
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
                <div class="modal-footer pt-0 mt-5" style="place-content:center;">
                    <button type="button" class="btns btn-secondarys"
                        data-bs-dismiss="modal">{{ __('Confirm Booking') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
setTimeout(function() {
    $('#hour_plan_modal').modal();
}, 5000);
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

function displayMessage() {
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

<style>
@media (min-width:768px) and (max-width:1024px) {
    .dayplan-btn {
        padding: 10px;
        width: auto !important;
    }
    .h2-hourplan {
    font-size: 15px !important;
    color: #000000;
}
h5, .fs-5 {
    font-size: 15px !important;
}
}

@media (min-width:768px) and (max-width:1440px) {
    .grid figure {
        margin: 2px -8px 3px !important;
    }
}

@media (min-width:320px) and (max-width:600px) {
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

    section.mains-blocks {
        padding: 0px !important;
        /* margin-top: -60px !important; */
        margin-top: 30px !important;
        background: #fbfbfb;
    }

    .grid figure {
        position: relative;
        overflow: hidden;
        min-width: 100%;
        margin: 0px 0px 5px !important;
    }
}

.modal-header {
    border-bottom: none !important;
}

.book-space {
    text-align: center;
    font-size: 30px;
    font-weight: 500;
    margin-top: -15px;
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
    padding: 0px 15px;
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
    /* border-radius: 50px; */
    padding: 0.7rem 2.25rem;
    color: #273432;
}

.btn-secondarys {
    color: #fff;
    background-color: #273432;
    border-color: #273432;
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
    font-size: 60px;
    line-height: 1.5em;
    font-weight: 700;
    margin: 0;
}

.workspace {
    line-height: 40px;
    font-size: 35px;
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
    font-size: 30px;
}

.hot-desk p {
    color: #000000;
    font-size: 12px;
    margin-top: -15px;
}

.hot-desks {
    text-align: start;
    margin-top: -20px;
    /* margin-bottom: 50px; */
}

.hot-desks h2 {
    font-size: 22px;
    margin-bottom: -10px;
    color: #000000;
}

.hot-desks p {
    font-size: 12px;
    color: #000000;
}

.amenities-block {
    display: flex;
    justify-content: space-around;
    text-align: start;
    width: 50%;
}

.Amenities h2 {
    font-size: 22px;
    color: #000000;
    text-align: start;
}

.operating-block {
    /* display: flex; */
    justify-content: space-around;
    text-align: start;
    width: 50%;
}

.Operating h2 {
    font-size: 22px;
    color: #000000;
    text-align: start;
}

.h2-plans {
    font-size: 22px;
    text-align: start;
    color: #000000;
    margin-bottom: 40px;
}

.h2-hourplan {
    font-size: 20px;
    color: #000000;
}

.h2-dayplan {
    font-size: 20px;
    color: #000000;
}

.hourplan-button {
    text-align: center;
    /* padding-top: 60px; */
    margin-bottom: 30px;
}

.hourplan-btn {
    padding: 10px;
    width: 150px;
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
    padding: 10px;
    width: 150px;
    height: 40px;
    font-size: 15px;
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
    font-size: 15px;
    color: #000000;
    margin-top: 20px;
}

p.da-p {
    font-size: 15px;
    color: #000000;
    margin-top: 20px;
}

section.mains-blocks {
    padding: 100px;
    margin-top: -175px;
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
</style>