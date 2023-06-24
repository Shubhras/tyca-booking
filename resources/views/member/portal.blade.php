@extends('fronts.layouts.app')
@section('front-title')
{{ __('portal') }}
@endsection


@section('front-content')

<div class="transition-none">
      <section class="title-hero-bg parallax-effect">
      
     <img src="assets/images/Frame_3.png" alt="" class="">
               
        <div class="container">
            <div class="page-title text-center white-color">
                <h1>Member’s Portal</h1>
                   <div class="por-tal">
                   <button class="portal-btn">Book Appointment</button>
                 </div>
            </div>
        </div>
      </section>
  </div>

  <section class="tab-section">
  <ul class="nav" style="justify-content: center;">
    <li class="nav-item">
        <a class="nav-link active" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest" type="button" role="tab" aria-controls="latest" aria-selected="true">Member’s Information</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="true">Bookings</a>
    </li>
</ul>

<div class="tab-content">
    <div id="latest" class="tab-pane fade show active">
        <!-- Content for Tab 1 -->

<h2 class="h2-member">MEMBER'S INFORMATION</h2>

<div class="customer-review_wrap">
<div class="customer-img">
<img src="assets/images/Group 4111.png" alt="" class="cust-img">
</div>
<div class="customer-content-wrap">
<div class="your-rating-wrap">
<span>Hoe Wei</span>
<p>weige420@gmail.com</p>
</div>

<div class="btn-portal">
<div class="update-btn">
<button class="up-btn">Update Information</button>
</div>
<div class="logout-btn">
<button class="log-btn">Log Out</button>
</div>
</div>
</div>
</div>
    </div>
    <!-- <div id="content2" class="tab-pane fade"> -->
    <div class="tab-pane fade" id="upcoming" role="tabpanel">
        <!-- Content for Tab 2 -->
        <ul class="nav">
             <li class="nav-item">
                 <a class="nav-link active" id="latests-tab-1" data-bs-toggle="tab" data-bs-target="#latests" type="button" role="tab" aria-controls="latests" aria-selected="true">Upcoming</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" id="upcomings-tab-2" data-bs-toggle="tab" data-bs-target="#upcomings" type="button" role="tab" aria-controls="upcomings" aria-selected="true">Past</a>
             </li>
        </ul>


        <div class="tab-content">
    <div id="latests" class="tab-pane fade show active">
       <h2 class="up-booking">UPCOMING BOOKINGS</h2>

       <table class="table">
  <thead class="thead-portal">
    <tr>
      <th class="col-portal">Outlet</th>
      <th class="col-portal">Booking Space</th>
      <th class="col-portal">Plan Type </th>
      <th class="col-portal">Appointment At </th>
      <th class="col-portal">Payable Amount </th>
      <th class="col-portal">Payable Method </th>
      <th class="col-portal">Payment Status </th>
      <th class="col-portal">Booking Status </th>
      <th class="col-portal">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr style="color: #111827;">
      <td>Thank You Come Again @ Balestier</td>
      <td>Hot Desk</td>
      <td>Hour Plan</td>
      <td>17 Mar 2023  3.00 pm</td>
      <td>$4.00</td>
      <td>PayPal</td>
      <td>Paid</td>
      <td>Booked</td>
      <td><i class="fa-solid fa-eye"></i>
      <i class="fa-solid fa-xmark"></i>
    </td>
    </tr>
  </tbody>
</table>  
    </div>

    <div id="upcomings" class="tab-pane fade">
    <h2 class="past-booking">PAST BOOKINGS</h2>
    <table class="table">
  <thead class="thead-portal">
    <tr>
      <th class="col-portal">Outlet </th>
      <th class="col-portal">Booking Space </i></th>
      <th class="col-portal">Plan Type </th>
      <th class="col-portal">Appointment At </th>
      <th class="col-portal">Payable Amount </th>
      <th class="col-portal">Payable Method </th>
      <th class="col-portal">Payment Status </th>
      <th class="col-portal">Booking Status </th>
      <th class="col-portal">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr style="color: #111827;">
      <td>Thank You Come Again @ Balestier</td>
      <td>Hot Desk</td>
      <td>Hour Plan</td>
      <td>17 Mar 2023  3.00 pm</td>
      <td>$4.00</td>
      <td>PayPal</td>
      <td>Paid</td>
      <td>Cancelled</td>
      <td><i class="fa-solid fa-eye"></i>
    </td>
    </tr>
  </tbody>


</table>  
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
.por-tal{
    margin-top: 30px;
}
.portal-btn {
    width: 200px;
    height: 40px;
    font-size: 15px;
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}

.tab-section {
    padding: 50px;
}
h2.h2-member {
    font-size: 30px;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 50px;
    color: #000000;
}
.customer-review_wrap {
    display: flex;
    justify-content: center;
}
.btn-portal {
    display: flex;
}
.update-btn {
    margin-left: 30px;
    margin-right: 30px;
}
button.up-btn {
    background: #273432;
    border: #273432;
    color: #FFFFFF;
    font-size: 15px;
    padding: 10px;
    width: 200px;
}
button.log-btn {
    background: #FF7272;
    border: #273432;
    color: #FFFFFF;
    font-size: 15px;
    padding: 10px;
    width: 200px;
}
.your-rating-wrap {
    margin-left: 30px;
}
.your-rating-wrap span {
    color: #535353;
    font-size: 30px;
}
.your-rating-wrap p {
    color: #535353;
    margin-top: 10px;
    margin-bottom: 30px;
}
img.cust-img {
    width: 150px;
}
a#tab1 {
    color: #000000!important;
    font-weight: 500;
    font-size: 22px;
    border-bottom: 3px solid#273432;
}
a#tab2 {
    color: #535353!important;
    font-weight: 500;
    font-size: 22px;
}
li.nav-item {
    width: 50%;
    text-align: center;
}
a#latest-tab {
    color: #535353;
    font-size: 22px;
}
a#upcoming-tab {
    color: #535353;
    font-size: 22px;
}
a#latest-tab.active {
border-bottom: 3px solid #000000;
color: #000000;
}
a#upcoming-tab.active {
border-bottom: 3px solid #000000;
color: #000000;
}
h2.up-booking {
    font-size: 30px;
    text-align: center;
    margin-top: 30px;
    color: #000000;
}
h2.past-booking {
    font-size: 30px;
    text-align: center;
    margin-top: 30px;
    color: #000000;
}
a#latests-tab-1.active{
    background: #273432;
    color: #FFFFFF;
}

a#latests-tab-1{
    background: #FFFFFF;
    color: #535353;
    margin-top: 60px;
}
a#upcomings-tab-2.active {
    background: #273432;
    color: #FFFFFF;
}
a#upcomings-tab-2{
    background:  #FFFFFF;
    color: #535353;
    margin-top: 60px;
}
.thead-portal{
    background: #F7F7F7;
    color: #323232;
}
th.col-portal {
    padding: 20px!important;
    font-size: 15px;
    font-weight: 500;
    color: #6B7280;
}
.table>:not(caption)>*>* {
     border-bottom-width: 0!important;
}
.table>:not(:first-child) {
    border-top: none!important;
}
</style>
 