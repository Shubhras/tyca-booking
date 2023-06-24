@extends('fronts.layouts.app')
@section('front-title')
{{ __('book slot') }}
@endsection

@section('front-content')
<style>
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
    font-size: 30px;
    font-weight: 500;
    margin-top: -15px;
}

.btns {
    padding: 0.7rem 2.25rem;
    color: #273432;
}

.btn-secondarys {
    color: #fff;
    background-color: #273432;
    border-color: #273432;
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

.blog-text p {
    line-height: 1.8;
    color: #505050;
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
    width: 136px;
    height: 40px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}

.btn2 {
    width: 163px;
    height: 40px;
    background: #fff;
    color: #273432;
}

.book-btn {
    padding: 10px;
    width: 200px;
    height: 40px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
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
    border: 1px solid #F5F5F5;
    padding: 0px;
}

.sec-set {
    padding: 30px 0px;
}

.sec2 {
    padding: 0px 20px;
    width: 66%;
}

.amities {
    margin-bottom: 50px;
}

.icon-set {
    padding: 0px 10px;
}

.set-padding {
    padding: 15px 0px;
}

.hosts {
    width: 200px;
    margin-left: 30px;
}

.host-desk {
    padding: 10px 0px;
    margin-left: 30px;
    width: 200px;
}

.amities1 {
    margin-bottom: 30px;
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
</style>

{{--<section class="main-block11 gray11">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="grid11">
                    <figure class="effect-chico11">
                        <img src="assets/images/image 9.png" alt="" class="">
                    </figure>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">

                        <div class="grid11">
                            <figure class="effect-chico11">
                                <img src="assets/images/image 10.png" alt="" class="">
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="grid11">
                            <figure class="effect-chico11">
                                <img src="assets/images/image 12.png" alt="" class="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}


<section class="main-block1 gray">
    <div class="container">
        <div class="row col-12">
            <div class="col-md-8">
                <div class="grid">
                    <figure class="effect-chico">
                        <img src="/assets/image/image 12.png" alt="#" class="">
                    </figure>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 set-img1">

                        <div class="grid">
                            <div class="effect-chico">
                                <img src="/assets/image/image 10.png" alt="#" class="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 set-imgs">

                        <div class="grid">
                            <div class="effect-chico">
                                <img src="/assets/image/image 11.png" alt="#" class="">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="main-block sec-set">
    <div class="container">
        <div class="row" style="display:flex;">
            <div class="col-md-8 responsive-wrap sec2">
                <div class="full-blog">
                    <div class="blog-content">
                        <div class="blog-text">
                            <h1 class="font-700 roboto-font">Thank You Come Again @Balestier</h1>
                            <h3 class="roboto-font font-300 font-20px">355 Balestier Road Singapore 329782</h3>
                            <p>THANK YOU COME AGAIN / TYCA is a new social hub concept located in the city fringe of
                                Balestier Road. It consists of a café restaurant and event spaces for the collective
                                community.</p>
                            <p>With remote working becoming more and more popular, TYCA provides the perfect location
                                for those who want to take advantage of the trend.</p>
                            <p>TYCA provides a variety of workspaces from hot desks, co-working pods and private rooms
                                combined with hospitality services such as a concierge, gym, food and beverage.</p>
                            <p>TYCA is fully equipped with Wifi, A/V equipment, car and bicycle parking, Grab & Go bar,
                                and restaurant. Whether it's a corporate event, social get-together or meetings, TYCA is
                                your go-to place for small to medium gatherings.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 responsive-wrap">
                <div class="sidebar">
                    <div class="widget-box mb-40 amities">
                        <h1 class="mb-20 amities1">Amenities</h1>
                        <div class="latest-blog">
                            <div class="col section-border">
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <p class="heading-id"><img src="/assets/image/image 15.png" alt="#"
                                                style="padding-right:10px;">wi-fi</p>
                                    </div>
                                    <div class="col icon-set">
                                        <p class="sub-name1"><img src="/assets/image/image 23.png" alt="#"
                                                style="padding-right:10px;">Desk</p>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <p class="heading-id"><img src="/assets/image/image 17.png" alt="#"
                                                style="padding-right:10px;">air
                                            conditioning</p>
                                    </div>
                                    <div class="col icon-set">
                                        <p class="sub-name1"><img src="/assets/image/Frame 4546.png" alt="#"
                                                style="padding-right:10px;">refrigerator</p>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <p class="heading-id"><img src="/assets/image/image 18.png" alt="#"
                                                style="padding-right:10px;">shower facilities</p>
                                    </div>
                                    <div class="col icon-set">
                                        <p class="sub-name1"><img src="/assets/image/Frame 4552.png" alt="#"
                                                style="padding-right:10px;">electric kettle</p>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <p class="heading-id"><img src="/assets/image/image 33.png" alt="#"
                                                style="padding-right:10px;">toilets</p>
                                    </div>
                                    <div class="col icon-set">
                                        <p class="sub-name1"><img src="/assets/image/image 26.png" alt="#"
                                                style="padding-right:10px;">sofa</p>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <p class="heading-id"><img src="/assets/image/image 21.png" alt="#"
                                                style="padding-right:10px;">telephone</p>
                                    </div>
                                    <div class="col icon-set">
                                        <p class="sub-name1"><img src="/assets/image/image 16.png" alt="#"
                                                style="padding-right:10px;">toiltries</p>
                                    </div>
                                </div>
                                <div class="row mt-10 mb-1" style="display:flex;">
                                    <div class="col icon-set">
                                        <p class="heading-id"><img src="/assets/image/image 22.png" alt="#"
                                                style="padding-right:10px;">wardrobe</p>
                                    </div>
                                    <div class="col icon-set">
                                        <p class="sub-name1"><img src="/assets/image/image 20.png" alt="#"
                                                style="padding-right:10px;">Telivision</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-box">
                        <h1 class="amities1">Operating Hours</h1>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <b class="heading-id1">Monday</b>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <b class="heading-id1">Tuesday</b>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <b class="heading-id1">Wednesday</b>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <b class="heading-id1">Thursday</b>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <b class="heading-id1">Friday</b>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <b class="heading-id1">Saturday</b>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                        <div class="row mt-10 mb-1" style="display:flex;">
                            <div class="col">
                                <b class="heading-id1">Sunday</b>
                            </div>
                            <div class="col">
                                <span class="sub-name">07:00 am - 09:00 am </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="white-bg">
    <div class="container">
        <div class="row col-12">
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3 hosts">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding image-left flex-sets">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active" data-bs-toggle="modal"
                        data-bs-target="#hour_plan_modal">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0" data-bs-toggle="modal"
                        data-bs-target="#hour_plan_modal">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3 hosts">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding image-left flex-sets">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active" data-bs-toggle="modal"
                        data-bs-target="#hour_plan_modal">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0" data-bs-toggle="modal"
                        data-bs-target="#hour_plan_modal">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3" style="width:60%;margin-left:30px;">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding image-left flex-sets">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active" data-bs-toggle="modal"
                        data-bs-target="#hour_plan_modal">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0" data-bs-toggle="modal"
                        data-bs-target="#hour_plan_modal">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3 hosts">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding image-left flex-sets">
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0" data-bs-toggle="modal"
                        data-bs-target="#hour_plan_modal">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3 hosts">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding image-left flex-sets">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active" data-bs-toggle="modal"
                        data-bs-target="#hour_plan_modal">
                        $4 / Hour
                    </button>
                    <button class="btn1 btn1-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0" data-bs-toggle="modal"
                        data-bs-target="#hour_plan_modal">
                        $35 / Day
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        View More
                    </button>
                </div>
            </div>
            <div class="col-5 row" style="margin:30px;">
                <div class="row col-12 set-border">
                    <div class="col-5" style="padding:0px;">
                        <a href="{{ URL::route('hot-desk'); }}">
                            <img src="/assets/image/image 11.png" alt="Digital" style="width:200px">
                        </a>
                    </div>
                    <div class="col-7">
                        <div class="column">
                            <div class="col-3 host-desk">
                                Hot Desk
                            </div>
                            <div class="col-3" style="width:60% ; margin-left:30px;">
                                Shared work desk within the
                                co-working space.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xl-start header-btn-grp set-padding image-left flex-sets">
                    <button class="btn1 btn1-primary1 btn-sm me-2 rounded-2 active">
                        Get Quote
                    </button>
                    <button class="btn2 btn2-primary1 btn-sm me-xxl-3 me-2 rounded-2 mb-xl-0">
                        <a href="{{ URL::route('hot-desk'); }}" style="text-decoration: none; color:#273432;"> View More
                        </a>
                    </button>
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
</script>