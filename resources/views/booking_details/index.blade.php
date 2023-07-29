@extends('fronts.layouts.app')
@section('front-title')
{{ __('booking_details') }}
@endsection
@section('front-content')

<div class="transition-none">
    <section class="title-hero-bg parallax-effect" style="background-image: url(assets/images/Frame_3.png);">
        <div class="container">
            <div class="page-title text-center white-color">
                <h1>BOOK A SPACE</h1>
                <h4 class="workspace">Interested in our workspace?
                    <br> Book a slot for our space now!
                </h4>
                <div class="book-now">
                    <a href="http://127.0.0.1:8000/patients/dashboard"><button class="book-btn">Book Now</button></a>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="booking-detailss" style="background-image: url('{{$bodyimage1->value}}');">
<div class="container">
    <div class="row booking-details">
        <div class="col-md-6 booking-details-right">
            <div class="column" style="display:grid;">
                <span class="extra-light">THANK YOU AND</span>
                <span class="extra-light" style="padding-bottom:35px;">SEE YOU THERE!</span>
            </div>
            @if(!empty($outletName->profile_image))
                <img src="{{$outletName->profile_image}}" alt="" class="img-height">
                    @else
                    <img src="assets/images/image_9.png" alt="" class="img-height">
            @endif
        </div>
        <div class=" col-md-6 booking-details-left">
            <h2 class="pb-4">Booking Details</h2>
            <div class="mb-1 pt-4">
                <span class="heading">Name:</span> <span class="sub-head">{{$UserData->full_name}}</span>
            </div>
            <div class="mb-1">
                <span class="heading">Email:</span> <span class="sub-head">{{$UserData->email}}</span>
            </div>
            <div class="mb-1">
                <span class="heading">Outlet:</span> <span class="sub-head">{{$outletName->full_name}}</span>
            </div>
            <div class="mb-1">
                <span class="heading">Booking Space:</span> <span class="sub-head">{{$ServiceData->name}}</span>
            </div>
            <div class="mb-1">
                @if($AppointData->plan_type == "daily")
                <span class="heading">Plan Type:</span> <span class="sub-head">Daily Plan</span>
                @elseif($AppointData->plan_type == "hourly")
                <span class="heading">Plan Type:</span> <span class="sub-head">Hourly Plan</span>
                @else
                <span class="heading">Plan Type:</span> <span class="sub-head">N/A</span>
                @endif
            </div>
            <div class="mb-1">
                <span class="heading">Appointment Date:</span> <span class="sub-head">{{ \Carbon\Carbon::createFromFormat('Y-m-d h.ia', date('Y-m-d h.ia', strtotime(str_replace('.', '', $AppointData->date))))->format('d F Y') }} 
                    @if(!$AppointData->to_date == NULL)
                    To {{ \Carbon\Carbon::createFromFormat('Y-m-d h.ia', date('Y-m-d h.ia', strtotime(str_replace('.', '', $AppointData->to_date))))->format('d F Y') }}
                    @endif
                </span>
            </div>
            <div class="mb-1">
                <span class="heading">Time Slot:</span> <span class="sub-head">{{$AppointData->from_time}} {{$AppointData->from_time_type}} - {{$AppointData->to_time}} {{$AppointData->to_time_type }}</span>
            </div>
            <div class="mb-1">
                <span class="heading">Payable Amount:</span> <span
                    class="sub-head">${{$AppointData->payable_amount}}</span>
            </div>


            @if($AppointData->payment_method == 1)
            <div class="mb-1">
                <span class="heading">Payment Method:</span> <span
                    class="sub-head">Mannual</span>
            </div>
            @elseif($AppointData->payment_method == 2)
            <div class="mb-1">
                <span class="heading">Payment Method:</span> <span
                    class="sub-head">Stripe</span>
            </div>
            @elseif($AppointData->payment_method == 4)
            <div class="mb-1">
                <span class="heading">Payment Method:</span> <span
                    class="sub-head">Paypal</span>
            </div>
            @else
            <div class="mb-1">
                <span class="heading">Payment Method:</span> <span
                    class="sub-head">NA</span>
            </div>
            @endif
            <div class="books-now">
            <a href="http://127.0.0.1:8000/patients/dashboard">
                <button  class="books-btn">Back</button></a>
            </div>
        </div>

    </div>
    </div>
</section>


@endsection






<style>
body {
    font-family: "Noto Serif" !important;
}
.img-height{
    width:500px;
    height:500px;
}
@media(min-width:320px) and (max-width:767px){
.img-height {
    width: 250px !important;
    height: 250px !important;
}
.sub-head {
    font-size: 15px !important;
}
.heading {
    font-size: 15px !important;
}
}
@media(min-width:768px) and (max-width:991px){
.img-height {
    width: 250px !important;
    height: 250px !important;
}
.sub-head {
    font-size: 18px !important;
}
.heading {
    font-size: 18px !important;
}
.booking-details-left h2 {
    font-size: 25px !important;
}
}
@media(min-width:991px) and (max-width:1192px){
.img-height {
    width: 350px !important;
    height: 350px !important;
}
}
.heading {
    font-size: 24px;
    color: #000000;
    font-weight: 400;
    line-height: 24px;
    font-family:'Poppins';
}

.sub-head {
    font-size: 24px;
    color: #000000;
    font-weight: 700;
    line-height: 36px;
    font-family:'Poppins';
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

.page-title {
    position: absolute;
    top: 50%;
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
    color:#ffffff;
}

.workspace {
    line-height: 40px;
    font-size: 40px;
    font-weight: 400;
    margin-top: 20px;
    line-height:54.48px;
    color:#ffffff;
}

section.title-hero-bg.parallax-effect img {
    width: 100%;
}

.book-now {
    margin-top: 50px;
}

.book-btn {
    width: 260px;
    height: 60px;
    font-size: 25px;
    font-weight: 600;
    background: #273432;
    border: #273432;
    line-height: 34.05px;
    color: #FFFFFF;
    text-align: center;
    padding:10px 5px 10px 5px;
}

.books-now {
    margin-top: 50px;
}

.books-btn {
    width: 200px;
    height: 42px;
    font-size: 16px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
    line-height: 21.79px;
    font-weight: 600;
    padding: 10px 5px 10px 5px;
}

.booking-details {
    display: flex;
    padding: 80px;
}

.booking-details-right h2 {
    font-size: 22px;
    color: #000000;
}

.booking-details-left h2 {
    font-size: 40px;
    line-height: 54.48px;
    font-weight: 700;
    color: #000000;
    border-bottom: 1px solid#969696;
}

.booking-details-left p {
    /* line-height: 2px; */
    margin-top: 20px;
}

img.w-img {
    width: 80%;
}

span.extra-light {
    font-size: 60px;
    color: #000000;
    font-weight: 200;
    line-height: 81.72px;
}

.row.booking-details {
    margin-top: 0;
    margin-right: 0;
}


/* media */


@media (min-width: 320px) and (max-width: 600px) {

    span.extra-light {
    font-size: 16px !important;
    color: #000000;
    font-weight: 200;
    line-height: 40px !important;
    }

    img.w-img {
        width: 100%;
        margin-top: 20px;
    }

    section.booking-detailss {
        margin-top: -40px;
    }

    .page-title h1 {
        font-size: 35px;
        line-height: 1.5em;
        font-weight: 700;
        margin: 0;
    }

    .workspace {
        line-height: 40px;
        font-size: 20px;
        font-weight: 300;
        margin-top: 20px;
    }

    .booking-details-left h2 {
        font-size: 18px;
        color: #000000;
        border-bottom: 1px solid#969696;
    }

    .booking-details-left p {
        margin-top: 15px;
        line-height: 10px;
        font-size: 9px;
    }

    .books-now {
        margin-top: 30px;
        margin-left: -20px;
    }

    .page-title {
        top: 60%;
    }

    .title-hero-bg {
        min-height: 430px;
    }


    h5.text-white.mb-4.pb-1 {
        font-size: 15px !important;
    }

    .col-lg-3.col-md-6.order-1.order-lg-0 {
        margin-bottom: 0px !important;
    }

    .col-lg-3.order-0.order-lg-3.mb-4.mb-lg-0 {
        margin-bottom: 0px !important;
    }
}

/* // */
@media (min-width: 768px) and (max-width: 992px) {
    span.extra-light {
    font-size: 25px !important;
    color: #000000;
    font-weight: 200;
    line-height: 40px;
    }

    .col-md-4.booking-details-left {
        width: 50%;
    }

    h5.text-white.mb-4.pb-1 {
        font-size: 18px !important;
    }
}

/* // */
@media (max-width: 1024px) {

    span.extra-light {
        font-size: 35px;
        color: #000000;
        font-weight: 200;
    }

    h5.text-white.mb-4.pb-1 {
        font-size: 18px !important;
    }

}

@media (min-width: 1192px) and (max-width: 1399px) {

.img-height {
    width: 350px !important;
    height: 350px !important;
}
}
@media (min-width: 768px) and (max-width: 800px) {

    h5,
    .fs-5 {
        font-size: 14px !important;
    }
}
</style>