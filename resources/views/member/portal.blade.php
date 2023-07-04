@extends('fronts.layouts.app')
@section('front-title')
{{ __('portal') }}
@endsection


@section('front-content')
@include('flash::message')
@include('layouts.errors')
<div class="transition-none">
    
      <section class="title-hero-bg parallax-effect" style="background-image: url({{asset('assets/images/Frame_3.png')}})">
               
        <div class="container">
            <div class="page-title text-center white-color">
                <h1>Member’s Portal</h1>
                   <div class="por-tal">
                   <a style="padding: 10px; text-decoration: none;" href="https://tyca-book.sftechnologiesstage.co" class="portal-btn">Book Appointment</a>
                 </div>
            </div>
        </div>
      </section>
  

  <section class="tab-section">
  <ul class="nav" style="justify-content: center;">
    <li class="nav-item1">
        <a class="nav-link active" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest" type="button" role="tab" aria-controls="latest" aria-selected="true">Member’s Information</a>
    </li>
    <li class="nav-item1">
        <a class="nav-link" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="true">Bookings</a>
    </li>
</ul>

<div class="tab-content">
    <div id="latest" class="tab-pane fade show active">
        <!-- Content for Tab 1 -->

<h2 class="h2-member">MEMBER'S INFORMATION</h2>

<div class="row" id="customer-review_wrap">
<div class="col-md-2" id="customer-img">
<img src="{{ getLogInUser()->profile_image }}" alt="" class="cust-img">
</div>
<div class="col-md-4" id="customer-content-wrap">
<div class="your-rating-wrap">
<span>{{$data['user']->first_name}} {{$data['user']->last_name}}</span>
<p>{{$data['user']->email}}</p>
</div>

<div class="row btn-portal">
<div class="col-md-4 update-btn">
<button class="up-btn"data-bs-toggle="modal"data-bs-target="#update_info_modal">Update Information</button>
</div>
<div class=" col-md-4 logout-btn">
<button class="log-btn" onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">Log Out</button>
<form id="logout-form" action="{{ route('logout')}}" method="post">
        @csrf
</form>
</div>
</div>
</div>
</div>
    </div>
    <!-- <div id="content2" class="tab-pane fade"> -->
    <div class="tab-pane fade" id="upcoming" role="tabpanel">
        <!-- Content for Tab 2 -->
        <ul class="nav">
             <li class="nav-item1">
                 <a class="nav-link active" id="latests-tab-1" data-bs-toggle="tab" data-bs-target="#latests" type="button" role="tab" aria-controls="latests" aria-selected="true">Upcoming</a>
             </li>
             <li class="nav-item1">
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
    @foreach($data['todayAppointment'] as $appointment)
    <tr style="color: #111827;">
    <?php if(isset($appointment->transaction)){ ?>
    <td>{{ $appointment->doctor->user->first_name}}</td>
        <td>{{ $appointment->services->name}}</td>
        <td>{{ $appointment->plan_type }}</td>
        <td>{{ $appointment->date }}</td>
        <td>${{ $appointment->payable_amount }}.00</td>
        @if($appointment->payment_method == 2)
        <td> 
            Stripe
        </td>
        @else
            <td>Paypal</td>        
        @endif

        @if($appointment->transaction->status == 0)
        <td>All</td>
        @elseif($appointment->transaction->status == 1)
        <td> Panding</td>
        @else
        <td> Paid</td>
        @endif

        @if($appointment->status == 1)
        <td> 
            Booked
        </td>
        @elseif($appointment->status == 2)
        <td> 
            Checking
        </td>
        @elseif($appointment->status == 3)
        <td> 
            Checkout
        </td>
        @else
            <td>Cancelled</td>        
        @endif
      
      <td><a onclick="bookedInfoData({{$appointment}});"><i class="fa-solid fa-eye"></a></i>
     <a onclick="cancelConfirm({{$appointment}})"> <i class="fa-solid fa-xmark"></i></a>
    </td>
    </tr>
    <?php } ?>
    @endforeach
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
    @foreach($data['upcomingAppointment'] as $appointment)
    <?php if(isset($appointment->transaction)){ ?>
    <tr style="color: #111827;">
     <td>{{ $appointment->doctor->user->first_name}}</td>
        <td>{{ $appointment->services->name}}</td>
        <td>{{ $appointment->plan_type }}</td>
        <td>{{ $appointment->date }}</td>
        <td>${{ $appointment->payable_amount }}.00</td>
        @if($appointment->payment_method == 2)
        <td> 
            Stripe
        </td>
        @else
            <td>Paypal</td>        
        @endif

        @if($appointment->transaction->status == false)
        <td>All</td>
        @elseif($appointment->transaction->status == true)
        <td> Panding</td>
        @else
        <td> Paid</td>
        @endif

        @if($appointment->status == 1)
        <td> 
            Booked
        </td>
        @elseif($appointment->status == 2)
        <td> 
            Checking
        </td>
        @elseif($appointment->status == 3)
        <td> 
            Checkout
        </td>
        @else
            <td>Cancelled</td>        
        @endif
      
      <td><a onclick="bookedInfoData({{$appointment}});"><i class="fa-solid fa-eye"></a></i>
     <a onclick="cancelConfirm({{$appointment}})"> <i class="fa-solid fa-xmark"></i></a>
    </td>
    </tr>
    <?php }?>
    @endforeach
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
                <p>Outlet: <b id="outinfo"></b></p>
                <p>Booking Space: <b id="bookSpaceInfo"></b></p>
                <p>Plan Type: <b id="planTypeInfo"></b></p>
                <p>Appointment At: <b id="appointAtIfo"></b></p>
                <p>Payable Amount: <b id="payableInfo"></b></p>
                <p>Payment Method: <b id="paymentMethod"></b></p>
               <p>Payment Status: <b id="statusInfo"></b></p>
               <p>Booking Status: <b id="bookedInfoses"></b></p>
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
                <p>Outlet: <b id="coutinfo"></b></p>
                <p>Booking Space: <b id="cbookSpaceInfo"></b></p>
                <p>Plan Type: <b id="cplanTypeInfo"></b></p>
                <p>Appointment At: <b id="cappointAtIfo"></b></p>
                <p>Payable Amount: <b id="cpayableInfo"></b></p>
                <p>Payment Method: <b id="cpaymentMethod"></b></p>
               <p>Payment Status: <b id="cstatusInfo"></b></p>
               <p>Booking Status: <b id="cbookedInfo"></b></p>
           </div>
           <div class="btn-cancel-booking">
<div class="cancel-yes-btn">
<button class="yes-btn" id="cancelledId" onclick="cancelAppoint();">Yes</button>
</div>
<div class="cancel-no-btn">
<button class="no-btn" data-bs-dismiss="modal" aria-label="Close">No</button>
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
                <form method="POST" action="{{ route('updateMember') }}" enctype="multipart/form-data">
                @csrf
                <div class="alert alert-danger d-none hide"></div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('First Name', __('First Name').(''), ['class' => 'form-label  required']) }}
                        <span class=""></span>
                        <input name="first_name" type="text" class="form-control" id="name" aria-describedby="firstName"
                                placeholder="{{ __('messages.patient.first_name') }}" value="{{ $data['user']->first_name }}"
                                required pattern="[A-Za-z]+" title="Please enter alphabetic characters only" >
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('Last Name', __('Last Name').(''), ['class' => 'form-label  required']) }}
                        <span class=""></span>
                        <input name="last_name" type="text" class="form-control" id="last_name"
                                aria-describedby="lastName" placeholder="{{ __('messages.patient.last_name') }}" required
                                value="{{ $data['user']->last_name }}" required pattern="[A-Za-z]+" title="Please enter alphabetic characters only">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('Email', __('Email Name').(''), ['class' => 'form-label  required']) }}
                        <span class=""></span>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="email"
                                placeholder="{{ __('messages.patient.email') }}" value="{{$data['user']->email }}" required disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('New Password', __('New Password').(''), ['class' => 'form-label  required']) }}
                        <span class=""></span>
                        <input type="password" name="password" class="form-control" id="password"
                                    placeholder="{{ __('messages.patient.password') }}" aria-describedby="password" required>
                    </div>
                    <div class="form-group col-sm-6">
                        {{ Form::label('Confirm New Password', __('Confirm New Password').(''), ['class' => 'form-label  required']) }}
                        <span class=""></span>
                        <input name="password_confirmation" type="password" class="form-control"
                                placeholder="{{ __('messages.patient.confirm_password') }}" id="password_confirmation"
                                aria-describedby="confirmPassword" required>
                    </div>
                </div>

                <div class="row">
                <p>Icon</p>
                    <div class="form-group col-sm-6">
                      <img src="{{$data['user']->profile_image}}" alt="" class="cust-img">
                    </div>
                    <div class="form-group col-sm-12"id="icon-pen">
                    <label>
                    <i class="fa-solid fa-pen"></i>
                    <input type="file" id="profilePicture" name="image" class="image-upload d-none profile-validation" accept="image/*" />
                    </label>
                    </div>
                </div>

            
                <div class="modal-footer pt-0 mt-5" style="place-content:center;">
                    <button type="submit" class="btns btn-secondarys">{{ __('Update') }}</button>
                </div>
            </div>
        </form>
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
    /* margin-left: 30px; */
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
    font-size: 22px;
}
.your-rating-wrap p {
    color: #535353;
    margin-top: 10px;
    margin-bottom: 30px;
}
img.cust-img {
    width: 150px;
    border-radius: 100px;
    height: 150px;
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
li.nav-item1 {
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
    /* margin-left: -80px; */
}
.portal-btn:hover {
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}
/* media */
@media (min-width: 320px) and (max-width: 600px){

.page-title h1 {
    font-size: 35px;
}
.title-hero-bg {
    min-height: 335px;
}
a#latest-tab.active {
    border-bottom: 3px solid #000000;
    color: #000000;
    font-size: 15px;
}
a#upcoming-tab {
    color: #535353;
    font-size: 15px;
}
a#latest-tab {
    color: #535353;
    font-size: 15px;
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
    width: 100px;
    height: 100px;
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
    font-size: 14px;
}
a#upcomings-tab-2 {
    background: #FFFFFF;
    color: #535353;
    margin-top: 35px;
    font-size: 14px;
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
/* .col-md-4.update-btn {
    margin-bottom: 30px;
} */

h5.text-white.mb-4.pb-1 {
    font-size: 18px !important;
}
}

@media (min-width: 600px) and ((max-width: 768px)){
    .your-rating-wrap {
    margin-left: 0px !important;
}
    .btn-portal {
    display: block !important;
}
.update-btn{
    margin-bottom: 10px !important;
}
}

@media (min-width: 320px) and ((max-width: 1023px)){
button.log-btn {
    margin-left:0px !important;
}
}
@media (max-width: 1024px){

.col-md-2.logout-btn {
    margin-left: 45px;
}

button.log-btn {
    margin-left: 40px;
}
h5.text-white.mb-4.pb-1 {
    font-size: 18px!important;
}
}

@media (min-width: 768px) and (max-width: 800px){
h5, .fs-5 {
    font-size: 14px!important;
}
}
</style>
<script type="text/javascript">

function bookedInfoData(data){
 document.getElementById('outinfo').innerHTML = data.doctor.user.first_name;
    document.getElementById('bookSpaceInfo').innerHTML = data.services.name; 
    document.getElementById('planTypeInfo').innerHTML = data.plan_type; 
    document.getElementById('appointAtIfo').innerHTML = data.date; 
    document.getElementById('payableInfo').innerHTML =  "$" + data.payable_amount + ".00";
    var payment_method = '';
    if(data.payment_method == 2){
        payment_method = 'Stripe';
    }else{
        payment_method = 'Paypal';
    }
    document.getElementById('paymentMethod').innerHTML =  payment_method;
    var transaction = '';
    if(data.transaction.status == 0){ 
        transaction  =  "All";
    }
    else if(data.transaction.status == 1)
    {
        transaction = "Panding";
    }else{
        transaction = "Paid"; 
    }
    document.getElementById('statusInfo').innerHTML =  transaction;
    var bookedInfos = '';

    if(data.status == 1){ 

        bookedInfos =  "All";
    }
    else if(data.status == 2)
    {
        bookedInfos =  "Checking";
    }
    else if(data.status == 3)
    {
        bookedInfos =  "Checkout";

    }else{

        bookedInfos =  "Cancelled"; 
    }
    document.getElementById('bookedInfoses').innerHTML =  bookedInfos;

    $("#booked_info_modal").modal('show');
}
var id = 0;
function cancelConfirm(data){
    id = data.id;
    document.getElementById('coutinfo').innerHTML = data.doctor.user.first_name;
    document.getElementById('cbookSpaceInfo').innerHTML = data.services.name; 
    document.getElementById('cplanTypeInfo').innerHTML = data.plan_type; 
    document.getElementById('cappointAtIfo').innerHTML = data.date; 
    document.getElementById('cpayableInfo').innerHTML =  "$" + data.payable_amount + ".00";
    var cpaymentMethod = '';
    if(data.payment_method == 2){
        cpaymentMethod = 'Stripe';
    }else{
        cpaymentMethod = 'Paypal';
    }
     document.getElementById('cpaymentMethod').innerHTML = cpaymentMethod;
    var cstatusInfo = ''; 
    if(data.transaction.status == 0){ 
        cstatusInfo =  "All";
    }
    else if(data.transaction.status == 1)
    {
        cstatusInfo =  "Panding";
    }else{
        cstatusInfo =  "Paid"; 
    }
    document.getElementById('cstatusInfo').innerHTML = cstatusInfo;
    var cbookedInfo = '';
    if(data.status == 1){ 
        cbookedInfo =  "All";
    }
    else if(data.status == 2)
    {
        cbookedInfo =  "Checking";
    }
    else if(data.status == 3)
    {
        cbookedInfo =  "Checkout";
    }else{
        cbookedInfo =  "Cancelled"; 
    }

    document.getElementById('cbookedInfo').innerHTML = cbookedInfo;

    $("#cancel_booking_modal").modal('show');
}

function cancelAppoint() {
    $.ajax({
        type: 'POST',
        url: "{{ route('cancelAppoint') }}",
        data: {
            "_token": "{{ csrf_token() }}",
            "id": id
        },
        success: function(data) {
            if (data.success == true) {
                $("#cancel_booking_modal").modal('hide');
                $("#cancel_confirm_modal").modal('show');
            } else {
                //var url = "{{ route('login') }}";
                //location.href = url;
            }
        }
    });

}
</script>