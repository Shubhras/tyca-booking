@extends('fronts.layouts.app')
@section('front-title')
{{ __('portal') }}
@endsection


@section('front-content')

<div class="transition-none">
    
      <section class="title-hero-bg parallax-effect" style="background-image: url(assets/images/Frame_3.png);">
               
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

<div class="row" id="customer-review_wrap">
<div class="col-md-2" id="customer-img">
<img src="assets/images/Group 4111.png" alt="" class="cust-img">
</div>
<div class="col-md-4" id="customer-content-wrap">
<div class="your-rating-wrap">
<span>Hoe Wei</span>
<p>weige420@gmail.com</p>
</div>

<div class="row btn-portal">
<div class="col-md-4 update-btn">
<button class="up-btn"data-bs-toggle="modal"data-bs-target="#update_info_modal">Update Information</button>
</div>
<div class=" col-md-4 logout-btn">
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
<div class="table-container">
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
      
      <td><a data-bs-toggle="modal"data-bs-target="#booked_info_modal"><i class="fa-solid fa-eye"></a></i>
     <a data-bs-toggle="modal"data-bs-target="#cancel_booking_modal"> <i class="fa-solid fa-xmark"></i></a>
    </td>
    </tr>
  </tbody>
</table>  
</div>
    </div>

    <div id="upcomings" class="tab-pane fade">
    <h2 class="past-booking">PAST BOOKINGS</h2>
    <div class="table-container">
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
      <td><a data-bs-toggle="modal"data-bs-target="#booking_cancel_modal"><i class="fa-solid fa-eye"></a></i>
    </td>
    </tr>
  </tbody>


</table>  
</div>
    </div>
    </div>
 </div>
</div>
  </section>



  <div id="booked_info_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header-1">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="books-spaces">BOOKING INFORMATION</div>
            <div class="book-p">
                <p>Outlet: <b>Thank You Come Again @ Balestier</b></p>
                <p>Booking Space: <b>Hot Desk</b></p>
                <p>Plan Type: <b>Hour Plan</b></p>
                <p>Appointment At: <b>17 Mar 2023  3.00 pm</b></p>
                <p>Payable Amount:<b> $4.00</b></p>
                <p>Payment Method: <b>PayPal</b></p>
               <p>Payment Status: <b> Paid</b></p>
               <p>Booking Status: <b>Booked</b></p>
           </div>
            </div>
        </div>
    </div>
</div>





<div id="booking_cancel_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header-1">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="books-spaces">BOOKING INFORMATION</div>
            <div class="book-p">
                <p>Outlet: <b>Thank You Come Again @ Balestier</b></p>
                <p>Booking Space: <b>Hot Desk</b></p>
                <p>Plan Type: <b>Hour Plan</b></p>
                <p>Appointment At: <b>17 Mar 2023  3.00 pm</b></p>
                <p>Payable Amount:<b> $4.00</b></p>
                <p>Payment Method: <b>PayPal</b></p>
               <p>Payment Status: <b> Paid</b></p>
               <p>Booking Status: <b>Cancelled</b></p>
           </div>
            </div>
        </div>
    </div>
</div>


<div id="cancel_booking_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header-1">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="books-spaces">CANCEL BOOKING</div>
            <p class="follow-booking">Do you want to cancel the following booking?</p>
            <div class="book-p-cancel">
                <p>Outlet: <b>Thank You Come Again @ Balestier</b></p>
                <p>Booking Space: <b>Hot Desk</b></p>
                <p>Plan Type: <b>Hour Plan</b></p>
                <p>Appointment At: <b>17 Mar 2023  3.00 pm</b></p>
                <p>Payable Amount:<b> $4.00</b></p>
                <p>Payment Method: <b>PayPal</b></p>
               <p>Payment Status: <b> Paid</b></p>
               <p>Booking Status: <b>Booked</b></p>
           </div>
           <div class="btn-cancel-booking">
<div class="cancel-yes-btn">
<button class="yes-btn" data-bs-toggle="modal"data-bs-target="#cancel_confirm_modal">Yes</button>
</div>
<div class="cancel-no-btn">
<button class="no-btn">No</button>
</div>
</div>
            </div>
        </div>
    </div>
</div>

<div id="cancel_confirm_modal" class="modal fade" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="book-space">CANCEL BOOKING</div>
                            <div class="modal-body">
                                <div class="alert alert-danger d-none hide"></div>
                                <div class="row">
                                    <div class="book1-space">
                                    Booking has been cancelled.
                                    </div>
                                </div>
                                <div class="modal-footer pt-0 mt-5" style="place-content:center;">
                                    <button type="button" class="btns btn-secondarys"
                                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div id="update_info_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="book-space">UPDATE INFORMATION</div>
            <div class="modal-body">
                <div class="alert alert-danger d-none hide"></div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('First Name', __('First Name').(''), ['class' => 'form-label']) }}
                        <span class=""></span>
                        {{ Form::text('First Name', null, ['class' => 'form-control','required','placeholder' => __('First Name')]) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('Last Name', __('Last Name').(''), ['class' => 'form-label']) }}
                        <span class=""></span>
                        {{ Form::text('Last Name', null, ['class' => 'form-control','required','placeholder' => __('Last Name')]) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('Email', __('Email Name').(''), ['class' => 'form-label']) }}
                        <span class=""></span>
                        {{ Form::text('Email', null, ['class' => 'form-control','required','placeholder' => __('Email')]) }}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('New Password', __('New Password').(''), ['class' => 'form-label']) }}
                        <span class=""></span>
                        {{ Form::text('New Password', null, ['class' => 'form-control','required','placeholder' => __('New Password')]) }}
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('Confirm New Password', __('Confirm New Password').(''), ['class' => 'form-label']) }}
                        <span class=""></span>
                        {{ Form::text('Confirm New Password', null, ['class' => 'form-control','required','placeholder' => __('Confirm New Password')]) }}
                    </div>
                </div>

                <div class="row">
                <p>Icon</p>
                    <div class="form-group col-sm-6">
                      <img src="assets/images/Group 4111.png" alt="" class="cust-img" style="width: 100px;">
                    </div>
                    <div class="form-group col-sm-12"id="icon-pen">
                    <i class="fa-solid fa-pen"></i>
                    </div>
                </div>

            
                <div class="modal-footer pt-0 mt-5" style="place-content:center;">
                    <button type="button" class="btns btn-secondarys"
                        data-bs-dismiss="modal">{{ __('Update') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection






 <style>
.table-container {
  max-height: 300px; /* Adjust the height as needed */
  overflow-y: auto;
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
.books-spaces {
    text-align: center;
    font-size: 30px;
    color: #000000;
}
.book-p {
    align-self: center;
    margin-top: 30px;
    margin-bottom: 40px;
    color: 535353;
}
.modal-header-1 {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: end;
    padding: 1rem 1rem;
}

p.follow-booking {
    text-align: center;
    margin-top: 30px;
    color: #535353;
}
.book-p-cancel {
    align-self: center;
    margin-top: 20px;
    margin-bottom: 40px;
    color: 535353;
    text-align: left;
}
.btn-cancel-booking {
    display: flex;
    align-self: center;
    margin-bottom: 40px;
}
button.yes-btn {
    width: 200px;
    background: #273432;
    border: #273432;
    padding: 10px;
    color: #FFFFFF;
}
button.no-btn {
    width: 200px;
    background: #FF7272;
    border: #FF7272;
    padding: 10px;
    color: #FFFFFF;
}
.cancel-yes-btn {
    width: 220px;
}
.btns {
    background: #273432;
    border: #273432;
    color: #FFFFFF;
    font-size: 15px;
    padding: 10px;
    width: 170px;
}

.btn-secondarys {
    color: #fff;
    background-color: #273432;
    border-color: #273432;
}
    .modal-footer {
        border-top:none !important;
    }
.book-space {
    text-align: center;
    font-size: 30px;
    font-weight: 500;
    margin-top: -15px;
}
.book1-space {
    text-align: center;
    font-size: 20px;
    color:#535353;
    margin-top: -15px;
}
.modal-header {
    border-bottom: none !important;
}
.modal-backdrop.show {
    opacity: 0 !important;
}
.form-control, .form-select {
    height: unset!important;
    border-radius: 0px!important;
    font-size: 18px;
    font-weight: 300;
    padding: 8px!important;
    border: 2px solid#273432!important;
}
.form-label {
    color: #000000!important;
    font-size: 14px;
    font-weight: 300;
}
div#icon-pen {
    position: absolute;
    margin-left: 85px;
    margin-top: 35px;
    background: #FFFFFF;
    border-radius: 200px;
    height: 40px;
    padding: 12px;
    width: 40px;
}

div#customer-review_wrap {
    justify-content: center;
}
.row.btn-portal {
    display: flex;
    justify-content: space-around;
    margin-left: -80px;
}

/* media */
@media (min-width: 320px) and (max-width: 600px){

    .tab-section {
    padding: 10px;
}
.page-title h1 {
    font-size: 35px;
    top: 60%;
}
.title-hero-bg {
    min-height: 335px;
}
a#latest-tab.active {
    border-bottom: 3px solid #000000;
    color: #000000;
    font-size: 10px;
}
a#upcoming-tab {
    color: #535353;
    font-size: 10px;
}
a#latest-tab {
    color: #535353;
    font-size: 10px;
}
h2.h2-member {
    font-size: 15px;
    text-align: center;
    margin-bottom: 12px;
    margin-top: 25px;
    color: #000000;
}
.your-rating-wrap span {
    color: #535353;
    font-size: 15px;
}
.your-rating-wrap p {
    color: #535353;
    margin-top: 10px;
    margin-bottom: 30px;
    font-size: 10px;
}
img.cust-img {
    width: 70px;
}
div#customer-review_wrap {
    text-align: center;
}
.your-rating-wrap {
    margin-left: 0;
    margin-top: 15px;
}
a#latests-tab-1 {
    margin-top: 35px;
    font-size: 10px;
}
a#upcomings-tab-2 {
    background: #FFFFFF;
    color: #535353;
    margin-top: 35px;
    font-size: 10px;
}
h2.up-booking {
    font-size: 15px;
    text-align: center;
    margin-top: 10px;
    color: #000000;
}
h2.past-booking {
    font-size: 15px;
    text-align: center;
    margin-top: 10px;
    color: #000000;
}
th.col-portal {
    padding: 10px!important;
    font-size: 10px;
    font-weight: 500;
    color: #6B7280;
}
tr {
    font-size: 10px;
}
.col-md-4.update-btn {
    margin-bottom: 20px;
}
.col-md-4.logout-btn {
    margin-right: -50px;
}
.book-p {
    align-self: center;
    margin-top: 30px;
    margin-bottom: 40px;
    color: 535353;
    font-size: 10px;
}
.books-spaces {
    text-align: center;
    font-size: 18px;
    color: #000000;
}
.book-p-cancel {
    font-size: 10px;
}
p.follow-booking {
    font-size: 12px;
    margin-top: 10px;
    margin-bottom: 0px;
}
button.yes-btn {
    width: 100px;
    margin-right: 10px;
}
button.no-btn {
    width: 100px;
}
.btn-cancel-booking {
    margin-top: -25px;
}
.cancel-yes-btn {
    width: unset;
}
.book-space {
    font-size: 18px;
}
.book1-space {
    font-size: 12px;
}
button.btns.btn-secondarys {
    margin-top: -20px;
}
.row.btn-portal {
    display: block;
    width: 100px;
}
h5.text-white.mb-4.pb-1 {
    font-size: 15px !important;
}
.col-lg-3.col-md-6.order-1.order-lg-0 {
    margin-bottom: 0px!important;
}
.col-lg-3.order-0.order-lg-3.mb-4.mb-lg-0 {
    margin-bottom: 0px!important;
}
}


@media (max-width: 768px) {
    div#customer-review_wrap {
    justify-content: space-evenly;
}
.row.btn-portal {
    display: block!important;
}
.col-md-4.update-btn {
    margin-bottom: 30px;
}
button.log-btn {
    margin-left: 75px;
    margin-top: -12px;
}
h5.text-white.mb-4.pb-1 {
    font-size: 18px !important;
}
}



@media (max-width: 1024px){

.col-md-2.logout-btn {
    margin-left: 45px;
}
.row.btn-portal {
    display: flex;
    justify-content: space-between;
    margin-right: -60px;
}
.col-md-4.update-btn {
    margin-left: 75px;
}
h5.text-white.mb-4.pb-1 {
    font-size: 18px!important;
}
}

@media (min-width: 767px) and (max-width: 800px){
h5, .fs-5 {
    font-size: 14px !important;
}
}
</style>
 