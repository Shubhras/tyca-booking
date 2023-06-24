@extends('fronts.layouts.app')
@section('front-title')
{{ __('hotdesk') }}
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
<img src="assets/images/image 9.png" alt="" class="">
</figure>
</div>
</div>
<div class="col-md-6">
<h2 class="h2-day">$35/Day</h2>
<div class="row">
<div class="col-md-6">
    
<div class="grid">
<figure class="effect-chico">
<img src="assets/images/image 10.png" alt="" class="">
</figure>
</div>
</div>
<div class="col-md-6">
<div class="grid">
<figure class="effect-chico">
<img src="assets/images/image 12.png" alt="" class="">
</figure>
</div>
</div>
</div>
<div class="row grid-space">
<div class="col-md-6">
<div class="grid">
<figure class="effect-chico">
<img src="assets/images/image 11.png" alt="" class="">
</figure>
</div>
</div>
<div class="col-md-6">
<div class="grid">
<figure class="effect-chico">
<img src="assets/images/image 13.png" alt="" class="">
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
    <p>Shared work desk within the co-working space.</p>
</div>
<div class="Amenities">
    <h2>AMENITIES</h2>
   <div class="amenities-block">
<div class="amenities-right">
<p>WI-Fi</p>
<p>Toilet</p>
<p>Chair</p>
<p>Phone Booth</p>
<p>Stationary</p>
</div>
<div class="amenities-left">
<p>Air Conditioning</p>
<p>Desk</p>
<p>Lounge Area</p>
<p>Whiteboard</p>
</div>
    </div>
</div>


<div class="Operating">
    <h2>OPERATING HOURS</h2>
   <div class="operating-block">
<div class="operating-right">
<p>Monday</p>
<p>Tuesday</p>
<p>Wednesday</p>
<p>Thursday</p>
<p>Friday</p>
<p>Saturday</p>
<p>Sunday</p>
</div>
<div class="operating-left">
<p>07.00 am - 09.30 pm</p>
<p>07.00 am - 09.30 pm</p>
<p>07.00 am - 09.30 pm</p>
<p>07.00 am - 09.30 pm</p>
<p>07.00 am - 09.30 pm</p>
<p>07.00 am - 09.30 pm</p>
<p>Closed</p>
</div>
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
<p class="hou-p">$4/Hour</p>
<div class="hourplan-button">
<button class="hourplan-btn">Book Now</button>
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
<p class="da-p">$35/Day</p>
<div class="dayplan-button">
 <button class="dayplan-btn">Book Now</button>
</div>
</div>
</div>
</div>
</div>
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
    /* float: left; */
    overflow: hidden;
    min-width: 100%;
    /* max-width: 100%;
    width: 100%; */
    margin: -18px -8px 26px;
    text-align: center;
    cursor: pointer;
}
.detailed-item-mr {
    margin-bottom: 25px;
}
.h2-day{
    font-size: 20px;
    text-align: end;
    color: #000000;
    margin-bottom: 40px;
}
.hot-desk{
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
.hot-desks{
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
    display: flex;
    justify-content: space-around;
    text-align: start;
    width: 50%;
}
.Operating  h2 {
    font-size: 22px;
    color: #000000;
    text-align: start;
}

.h2-plans{
    font-size: 22px;
    text-align: start;
    color: #000000;
    margin-bottom: 40px;
}

.h2-hourplan{
    font-size: 20px;
    color: #000000;
}

.h2-dayplan{
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
.day-plan{
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
    </style>
 