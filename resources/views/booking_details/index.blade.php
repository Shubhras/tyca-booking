@extends('fronts.layouts.app')
@section('front-title')
{{ __('booking_details') }}
@endsection

<style>
body {
    font-family: "Noto Serif" !important;
}
</style>

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
                    <button class="book-btn">Book Now</button>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="booking-detailss">
    <div class="row booking-details">
        <div class="  col-md-6 booking-details-right">
            <div class="column" style="display:grid;">
                <span class="extra-light">THANK YOU AND</span>
                <span class="extra-light">SEE YOU THERE!</span>
            </div>

            <img src="assets/images/image_9.png" alt="" class="w-img">
        </div>
        <div class=" col-md-4 booking-details-left">
            <h2>Booking Details</h2>
            <div class="mb-1">
                <span class="heading">Name:</span> <span class="sub-head">Hoe Jun Jun</span>
            </div>
            <div class="mb-1">
                <span class="heading">Email:</span> <span class="sub-head">weige123@gmail.com</span>
            </div>
            <div class="mb-1">
                <span class="heading">Outlet:</span> <span class="sub-head">Thank You Come Again @ Balestier</span>
            </div>
            <div class="mb-1">
                <span class="heading">Booking Space:</span> <span class="sub-head">Hot Desk</span>
            </div>
            <div class="mb-1">
                <span class="heading">Plan Type:</span> <span class="sub-head">Hour Plan</span>
            </div>
            <div class="mb-1">
                <span class="heading">Appointment Date:</span> <span class="sub-head">17 Mar 2023</span>
            </div>
            <div class="mb-1">
                <span class="heading">Time Slot:</span> <span class="sub-head">3.00 pm</span>
            </div>
            <div class="mb-1">
                <span class="heading">Payable Amount:</span> <span class="sub-head">$4.00</span>
            </div>
            <div class="mb-1">
                <span class="heading">Payment Method:</span> <span class="sub-head">PayPal</span>
            </div>
            <div class="books-now">
                <button class="books-btn">Back</button>
            </div>
        </div>

    </div>

</section>


@endsection






<style>
    .heading{
    font-size: 18px;
    color: #000000;
    }
    .sub-head{
    font-size: 16px;
    color: #000000;
    font-weight: 600;
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

.book-now {
    margin-top: 50px;
}

.book-btn {
    width: 150px;
    height: 40px;
    font-size: 15px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}

.books-now {
    margin-top: 50px;
}

.books-btn {
    width: 200px;
    height: 40px;
    font-size: 15px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
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
    font-size: 30px;
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
    font-size: 40px;
    color: #000000;
    font-weight: 200;
}

.row.booking-details {
    margin-top: 0;
    margin-right: 0;
}


/* media */


@media (min-width: 320px) and (max-width: 600px) {

    span.extra-light {
        font-size: 18px !important;
        color: #000000;
        font-weight: 200;
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
        font-size: 35px !important;
        color: #000000;
        font-weight: 200;
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

@media (min-width: 768px) and (max-width: 800px) {

    h5,
    .fs-5 {
        font-size: 14px !important;
    }
}
</style>