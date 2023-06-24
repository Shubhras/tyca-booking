@extends('fronts.layouts.app')
@section('front-title')
{{ __('booking_details') }}
@endsection


@section('front-content')

<div class="transition-none">
      <section class="title-hero-bg parallax-effect">
      
     <img src="assets/images/Frame_3.png" alt="" class="">
               
        <div class="container">
            <div class="page-title text-center white-color">
                <h1>BOOK A SPACE</h1>
                <h4 class="workspace">Interested in our workspace? 
                   <br> Book a slot for our space now!</h4>
                   <div class="book-now">
                   <button class="book-btn">Book Now</button>
                 </div>
            </div>
        </div>
      </section>
  </div>
<section>
<div class="booking-details">
<div class="booking-details-right">
    <div class="column" style="display:grid;">
    <span class="extra-light">THANK YOU AND</span>
<span class="extra-light">SEE YOU THERE!</span>
    </div>

<img src="assets/images/image_9.png" alt="" class="w-img">
</div>
<div class="booking-details-left">
    <h2>Booking Details</h2>
<p>Name: <b>Hoe Jun Jun</b></p>
<p>Email: <b>weige123@gmail.com</b></p>
<p>Outlet: <b>Thank You Come Again @ Balestier</b></p>
<p>Booking Space: <b>Hot Desk</b></p>
<p>Plan Type: <b>Hour Plan</b></p>
<p>Appointment Date: <b>17 Mar 2023</b> </p>
<p>Time Slot:<b> 3.00 pm</b></p>
<p>Payable Amount: <b>$4.00</b></p>
<p>Payment Method: <b>PayPal</b></p>
<div class="books-now">
<button class="books-btn">Back</button>
 </div>
</div>
    
</div>

</section>
  

@endsection






 <style>
    .page-title {
    position: absolute;
    top: 36%;
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
.workspace  {
    line-height: 40px;
    font-size: 35px;
    font-weight: 300;
    margin-top: 20px;
}
section.title-hero-bg.parallax-effect img {
    width: 100%;
}

.book-now{
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
    font-size: 22px;
    color: #000000;
    border-bottom: 1px solid#969696;
}
.booking-details-left p {
    line-height: 2px;
    margin-top: 30px;
}
img.w-img {
    width: 80%;
}
span.extra-light {
    font-size: 55px;
    color: #000000;
    font-weight: 200;
}
    </style>
 