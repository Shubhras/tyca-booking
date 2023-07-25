@extends('fronts.layouts.app')
@section('front-title')
{{ __('book slot') }}
@endsection

@section('front-content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i&display=swap">
<style>
body {
    font-family: "Noto Serif" !important;
}

.ami-padding {
    padding-left: 20px !important;
}

.ami-margin {
    margin: 20px;
}

.list-margin {
    margin: 30px;
}

.list-mobile {
    width: 211px;
    height: 195px;
}

.btn-close:hover {
    color: #323232 !important;
    text-decoration: none !important;
    opacity: .75 !important;
}

.label-font {
    font-size: 15.85px;
    font-weight: 400;
    line-height: 23.78px;
}

.pay-amnt {
    display: flex;
    justify-content: center;
    font-size: 24.96px;
    font-weight: 700;
    line-height: 34px;
    margin-top: 10px;
}

.btn-close {
    width: 22.66px;
    height: 22.66px;
    color: #323232;
    opacity: .5;
}

.desc-sort {
    font-size: 20px;
    line-height: 30px;
    font-weight: 400;
    color: #000000;
}

.hour-view {
    text-decoration: none;
    text-align: center;
    padding: 14px;
}

.no-slot-color {
    background: #F5F5F5;
    padding: 30px;
}

.location1 {
    font-size: 48px !important;
    color: #000000 !important;
    font-weight: 700;
    line-height: 65.38px;
    text-transform: capitalize;
}

.view-set {
    text-decoration: none;
    padding: 14px;
    background: #ffffff !important;
    color: #273432 !important;
    border: 2px solid #273432 !important;
    text-align: center;
    width: 224.31px;
    height: 57.92px;
    color: #FFFFFF;
    font-size: 20px;
    font-weight: 700;
    line-height: 27.24px;
}

.btn1:hover {
    background: #273432 !important;
    border: #273432 !important;
    color: #FFFFFF !important;
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

.sub-name {
    font-size: 20px;
    color: #000000;
    font-weight: 400;
    line-height: 30px;
    text-transform: lowercase;
}

.badge.badge-circle {
    border-radius: 2px;
    min-width: 20px;
    width: 20px;
    height: 20px;
}

.badge:empty {
    display: block !important;
}

.set-box {
    margin-left: 50px;
}

.set-back {
    background: #F5F5F5;
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

.modal-header {
    border-bottom: none !important;
}

.book-space {
    text-align: center;
    font-size: 39.64px;
    font-weight: 700;
    margin-top: -15px;
    line-height: 53.98px;
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
    color: #ffffff;
    background-color: #273432;
    border-color: #273432;
    border: 1px solid #273432;
}

.container-fluid1 {
    margin-right: auto;
    margin-left: auto;
    padding-right: 15px;
    padding-left: 15px;
}

.grid figure {
    position: relative;
    float: left;
    overflow: hidden;
    max-width: 100%;
    margin: 0 0 21px;
    text-align: center;
    cursor: pointer;
}

.effect-caption-wrap {
    position: absolute;
    left: 50%;
    top: 45%;
    transform: translate(-50%);
}

.blog-content {
    padding: 0;
}

.lead {
    font-size: 1.25rem;
    font-weight: 300;
}

.input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
}

.white-bg {
    background-color: #fff;
}


.center-layout {
    display: table;
    table-layout: fixed;
    height: 100%;
    width: 100%;
    position: relative;
}

.btn1 {
    width: 224.31px;
    /* height: 57.92px; */
    background: #273432;
    border: #273432;
    color: #FFFFFF;
    border-radius: 0 !important;
    font-size: 20px;
    font-weight: 700;
    line-height: 27.24px;

}

.btn11 {
    width: 224.31px;
    /* height: 57.92px; */
    background: #273432;
    border: #273432;
    color: #FFFFFF;
    border-radius: 0 !important;
    font-size: 20px;
    font-weight: 700;
    line-height: 27.24px;

}

.row-gap {
    margin-bottom: 10px;
}

.col-gap {
    padding: 10px;
}

.main-block1 {
    padding: 150px 0;
}

.container-fluid1 {
    max-width: 1500px;
}

.grid {
    position: relative;
    margin: 0 auto;
    max-width: 100%;
    list-style: none;
    text-align: center;
}

.grid figure {
    position: relative;
    overflow: hidden;
    min-width: 100%;
    margin: 0px 0px 20px;
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

.set-img1 {
    margin-left: -12px;
}

.set-img2 {
    margin-top: 20px;
}

.set-border {
    border: 2px solid #D9D9D9;
    padding: 0px;
}

.sec-set {
    padding: 0px;
}

.sec2 {
    padding: 20px 20px 20px 20px;
    width: 66%;
}

.amities {
    margin-bottom: 50px;
}

.icon-set {
    padding: 0px 10px;
}

#slot_option {
    display: none;
}

.set-padding {
    padding: 15px 0px;
    display: flex;
}

.hosts {
    width: 200px;
    margin-left: 20px;
    font-size: 20px;
    line-height: 30px;
    font-weight: 400;
    color: #000000;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
}

.host-desk {
    padding: 20px 0px 0px 0px;
    margin-left: 20px;
    width: 200px;
    line-height: 34.05px;
    font-size: 25px;
    font-weight: 700;
    color: #000000;
}

.amities1 {
    margin-bottom: 30px;
    font-size: 36px !important;
    font-weight: 700;
    line-height: 49.03px;
    color: #000000;
}

.image-left {
    margin-left: -10px;
}

figure.effect-chico11 {
    margin: 0;
}

.gray11 {
    background: #fbfbfb;
}

.main-block11 {
    padding: 200px;
}

.container-fluid {
    max-width: 1500px;
}

.grid11 figure {
    position: relative;
    overflow: hidden;
    min-width: 100%;
    margin: -18px -8px 26px;
    text-align: center;
    cursor: pointer;
}

.set-imgs {
    margin-left: -12px;
    margin-top: 20px;
}

.flex-sets {
    display: flex;
}


.modal-header {
    border-bottom: none !important;
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
    font-size: 14.27px;
    font-weight: 400;
    color: #000000;
    line-height: 21.41px;
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

.set-box {
    margin-left: 50px;
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


section.title-hero-bg.parallax-effect img {
    width: 100%;
}

.main-block {
    padding: 0px;
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
    margin: -7px -8px 26px;
    text-align: center;
    cursor: pointer;
}

.detailed-item-mr {
    margin-bottom: 25px;
}

.name-slot {
    margin-top: -125px;
}

.pay-pall {
    display: flex;
    place-content: start;
}

.heading-id1 {
    font-size: 20px;
    line-height: 30px;
    color: #000000;
    font-weight: 400;
}

.heading-id2 {
    font-size: 20px;
    font-weight: 700;
    line-height: 30px;
}

@media (min-width: 992px) {
    .padding-less {
        padding-left: 0px !important;
    }
}

@media (min-width:1024px) and (max-width:1200px) {
    .list-mobile {
        width: 185px !important;
        height: 185px !important;
    }
}

@media (min-width:320px) and (max-width:1440px) {
    .slot-margin {
        margin: 0;
    }
}

@media (max-width: 767px) {
    h1 {
        font-size: 25px !important;
    }

    .form-control,
    .form-select {
        height: 50px;
        font-size: 16px;
        padding: 10px !important;
    }
}

@media (min-width:320px) and (max-width:375px) {
    .stripes {
        width: 100% !important;
    }

    .pay-pall {
        display: grid !important;
    }

    .view-set {
        text-decoration: none;
        padding: 14px 0px !important;
    }
}

@media(min-width:801px) and (max-width:992px) {
    .list-box {
        width: inherit !important;
    }
}

@media(min-width:320px) and (max-width:595px) {
    .list-mobile {
        height: 211px !important;
    }

    .hosts {
        text-align: center;
    }

    .host-desk {
        text-align: center;
    }
}

@media(min-width:600px) and (max-width:767px) {
    .list-box {
        width: inherit !important;
    }

    .list-mobile {
        height: 211px !important;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .btn1 {
        font-size: 14px !important;
    }
}

@media (min-width:320px) and (max-width:600px) {
    .hour-view {
        padding-top: 15px !important;
    }

    .btn11 {
        font-size: 10px !important;
    }

    .sub-name {
        font-size: 13px !important;
    }

    .heading-id1 {
        font-size: 13px !important;
    }

    .book-set {
        height: 95% !important;
    }

    .img-book {
        padding-right: 0px !important;
    }

    .stripes {
        width: 100% !important;
    }

    .set-box {
        margin-left: 30px !important;
    }

    .main-block {
        padding: 0 !important;
    }

    .main-block1 {
        padding: 100px 0 !important;
    }

    .sec2 {
        padding: 15px !important;
        width: 100% !important;
    }

    .location {
        font-size: 16px !important;
        color: #000000 !important;
    }

    .location1 {
        font-size: 18px !important;
        color: #000000 !important;
        font-weight: 600;
    }

    .top-set {
        margin-top: -80px;
    }

    .name-slot {
        margin-top: 0px !important;
    }

    .list-box {
        width: 100% !important;
    }

    .host-desk {
        padding: 10px 0px;
        margin-left: 0px !important;
        width: 100% !important;
    }

    .hosts {
        width: 100%;
        margin-left: 0px !important;
    }

    .btn1 {
        font-size: 10px !important;
    }
}

@media (min-width:768px) and (max-width:800px) {

    .img-book {
        padding-right: 0px !important;
    }

    .radio-btn {
        font-size: 14px !important;
    }

    h5,
    .fs-5 {
        font-size: 14px !important;
    }

    .list-box {
        width: auto !important;
    }

    .set-amities {
        width: 100% !important;
    }
}

@media (min-width:900px) and (max-width:1024px) {
    .img-book {
        padding-right: 0px !important;
    }

    h5,
    .fs-5 {
        font-size: 14px !important;
    }
}

@media (min-width:1300px) and (max-width:1440px) {

    .btn11 {
        width: 155px !important;
    }

    .btn1 {
        width: 150px !important;
    }
}

@media (min-width:1441px) and (max-width:2560px) {
    .list-margin {
        margin: 5px;
    }

    .sec2 {
        padding: 0px 20px 0px 5px;
        width: 66%;
    }

    .ami-padding {
        padding-left: 5px !important;
    }
}

.location {
    font-size: 24px !important;
    color: #000000 !important;
    font-weight: 400;
    line-height: 36px;
}

h1 {
    font-size: 25px !important;
}
</style>
<section class="main-block1 gray">
    <div class="container">
        <div class="row col-12 slot-margin">
            <div class="col-md-8 img-book">
                <div class="grid">
                    @if(!empty($user1->gallery[0]))
                    <figure class="effect-chico">
                        <img src="{{$user1->gallery[0]}}" alt="#" style="width:100%;height:100%" class="book-set">
                    </figure>
                    @else
                    <figure class="effect-chico">
                        <img src="/assets/image/image 12.png" alt="#" style="width:100%;height:100%" class="book-set">
                    </figure>
                    @endif
                </div>
            </div>
            <div class="col-md-4 img-book">
                <div class="row">
                    <div class="col-md-12">
                        <div class="grid">
                            @if(!empty($user1->gallery[1]))
                            <figure class="effect-chico">
                                <img src="{{$user1->gallery[1]}}" alt="#" style="width:100%; height:95%;">
                            </figure>
                            @else
                            <figure class="effect-chico">
                                <img src="/assets/image/image 10.png" alt="#" style="width:100%;height:95%;">
                            </figure>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 ">

                        <div class="grid">
                            @if(!empty($user1->gallery[2]))
                            <figure class="effect-chico">
                                <img src="{{$user1->gallery[2]}}" alt="#" style="width:100%;height:95%">
                            </figure>
                            @else
                            <figure class="effect-chico">
                                <img src="/assets/image/image 11.png" alt="#" style="width:100%;height:100%">
                            </figure>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section style="background-image: url('{{$bodyimage1->value}}');">
    <section class="main-block sec-set name-slot">
        <div class="container">
            <div class="row" style="display:flex;">
                <div class="col-md-8  responsive-wrap sec2 top-set">
                    <div class="full-blog">
                        <div class="blog-content">
                            <div class="blog-text">
                                <h1 class="font-700 roboto-font">
                                    <h1 class="location1">
                                        {{$user->first_name}}
                                        {{$user->last_name}}
                                        <h1>
                                        </h1>

                                        <div>
                                            <p class="location">
                                                <img src="/assets/image/material-symbols_location-on.png" alt="#"
                                                    style="height: 34px; width:34px; margin-left:-5px;">
                                                <span>{{$addressData->address1}}</span>,
                                                @if(!empty($addressData->address2))
                                                <span> {{$addressData->address2}}</span>,
                                                @else
                                                <span></span>
                                                @endif
                                                <span>{{$addressData->country_name}}</span>
                                                <span> {{$addressData->postal_code}}</span>
                                            </p>
                                        </div>
                                        <p class="desc-sort">{!! $doctor->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 responsive-wrap set-amities padding-less">
                    <div class="sidebar">
                        <div class="widget-box mb-40 amities">
                            <h1 class="mb-20 amities1">Amenities</h1>
                            <div class="latest-blog">
                                <div class="col section-border">
                                    <div class="row mt-10 mb-1 col-12" style="display:flex;">
                                        @foreach($specialization as $specializationData)
                                        <div class="col-6 icon-set">
                                            <p class="heading-id1">
                                                <img src="{{$specializationData->icon}}" alt="#"
                                                    style="height: 30px; padding-right:10px;">
                                                {{$specializationData->name}}
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                $var_dump = json_decode($doctor->days);
                            ?>
                        <div class="widget-box" style="margin-bottom:60px;">
                            <h1 class="amities1">Operating Hours</h1>
                            @php
                            $dayLabels = [1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 =>
                            'Friday', 6 => 'Saturday', 7 => 'Sunday'];
                            @endphp

                            @if(!empty($var_dump))
                            @for($day = 1; $day <= 7; $day++) @php $found=false; @endphp @foreach($var_dump as $data)
                                @if($data->day_of_week == $day)
                                <div class="row mt-10 mb-2" style="display:flex;">
                                    <div class="col">
                                        <b class="heading-id2">{{ $dayLabels[$day] }}</b>
                                    </div>
                                    <div class="col">
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
                                <div class="row mt-10 mb-2" style="display:flex;">
                                    <div class="col">
                                        <b class="heading-id2">{{ $dayLabels[$day] }}</b>
                                    </div>
                                    <div class="col">
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
    </section>

    <section>
        <div class="container">
            <div class="row col-12 list-box">
                @if(count($services) > 0)
                <h3 class="amities1 ami-padding">Listings</h3>
                @else
                <h3 class="amities1 ami-padding" style="display:none;">Listings</h3>
                @endif
                @foreach($services as $service)
                <div class="col-5 row list-box list-margin">
                    <div class="row col-12 set-border">
                        <div class="col-md-5 col-sm-5 col-xs-12 list-set" style="padding:0px;">
                            <img src="{{ $service->icon }}" alt="Digital" class="list-mobile">
                        </div>
                        <div class="col-md-7 text-left col-sm-7 col-xs-12 xs-text-center">
                            <div class="column">
                                <div class="col-3 host-desk">
                                    {{ $service->name }}
                                </div>
                                <div class="col-3 hosts">
                                    <span style="background-color: transparent;color: #5c5c5c !important; font-family:Poppins;">
                                        {!! $service->short_description !!}</span>
                                </div>
                                <!-- <div class="col-3 hosts">
                                    {!! $service->short_description !!}
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="text-xl-start header-btn-grp set-padding" style="margin-left: -11px;">
                        @if(getLogInUser())
                        <button class="btn1 btn1-primary1 btn-sm me-3 me-xxl-4 rounded-2 active hour-view"
                            data-bs-toggle="modal" data-bs-target="#hour_plan_modal"
                            onclick="displayMessage(1,'{{ $service->charges }}','{{$service->id}}');">
                            $ {{ $service->charges }} / Hour
                        </button>
                        @else
                        <a href="{{ route('login') }}"
                            class="btn1 btn1-primary1 btn-sm me-3 me-xxl-4 rounded-2 hour-view" data-turbo="false"> $
                            {{ $service->charges }} / Hour</a>
                        @endif
                        @if(getLogInUser())
                        <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-3 me-xxl-4 rounded-2 mb-xl-0 hour-view"
                            data-bs-toggle="modal" data-bs-target="#hour_plan_modal"
                            onclick="displayMessage(2,'{{ $service->charges_daily }}','{{$service->id}}');">
                            $ {{ $service->charges_daily }} / Day
                        </button>
                        @else
                        <a href="{{ route('login') }}"
                            class="btn1 btn1-primary1 btn-sm me-3 me-xxl-4 rounded-2 hour-view" data-turbo="false">$
                            {{ $service->charges_daily }} / Day</a>
                        @endif
                        <?php
                    $idGet =  Request::segment(2);
                    ?>
                        <a class="btn11 btn1-primary11 btn-sm me-xxl-0 me-0 rounded-2 mb-xl-0 view-set"
                            href="{{$idGet}}/hot-desk/{{$service->id}}">
                            View More
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</section>
<div id="hour_plan_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width:1000px;">
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
                        @if(getLogInUser())
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label" for="Doctor">{{ __('messages.doctor.doctor')}}: <span
                                        class="required"></span></label>
                                {{ Form::select('doctor_id', $appointmentDoctors, isset(session()->get('data')['doctor_id']) ? session()->get('data')['doctor_id'] : $doctor->id,['class' => 'form-select', 'id' => 'appointmentDoctorId', 'data-control'=>"select2",'placeholder' =>  __('messages.common.select_doctor')]) }}
                            </div>
                        </div>
                        @endif
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
                            <label class="form-label"
                                for="template-medical-first_name">{{ __('messages.web.patient_name') }}:</label>
                            <input type="text" id="patientName" readonly class="form-control" value=""
                                placeholder="{{ __('messages.web.patient_name') }}">
                        </div>
                    </div>
                    <div class="col icon-set" style="text-align:center;">
                        <span class="heading-id"><img src="/assets/image/image 12.png" alt="#"
                                style="width:100%; margin-bottom: 20px;"></span>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="templateAppointmentDate">Appointment Date: <span
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
                                        <label class="form-check-label label-font" for="defaultCheck1">
                                            {{__('messages.appointment.booked')}}
                                        </label>
                                    </div>
                                    <div class="form-check d-flex align-items-center mb-2 ms-3">
                                        <input class="form-check-input form-check-success me-2 mt-0" type="checkbox"
                                            value="" id="defaultCheck1">
                                        <label class="form-check-label label-font" for="defaultCheck1">
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
                                    <p class="mb-0 text-center  no-time-slot no-slot-color">
                                        {{__('messages.appointment.no_slot_found')}}
                                    </p>
                                </div>
                                <p class="mb-0 text-center d-none no-time-slot no-slot-color">
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
                    <div class="row col-md-12 mb-5">
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
        <div class="modal-footer pt-0 mt-5" style="place-content:center;">
        </div>
        </form>
    </div>
</div>


<script>
setTimeout(function() {
    $('#hour_plan_modal').modal();
}, 5000);
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var appointmentDateInput = document.getElementById('appointment-date');
    console.log('appointmentDateInput', appointmentDateInput)
    if (appointmentDateInput) {
        appointmentDateInput.addEventListener('change', function() {
            var selectedDate = appointmentDateInput.value;
            var additionalInfoDiv = document.getElementById('additional-info');

            if (selectedDate !== '') {
                additionalInfoDiv.style.display = 'block';
            } else {
                additionalInfoDiv.style.display = 'none';
            }
        });
    }
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
</script>


@endsection