@extends('fronts.layouts.app')
@section('front-title')
{{ __('portal') }}
@endsection


@section('front-content')
@include('flash::message')
@include('layouts.errors')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<div class="transition-none" style="background-image: url('{{$bodyimage1->value}}');">

    <section class="title-hero-bg parallax-effect"
        style="background-image: url({{asset('assets/images/Frame_3.png')}})">

        <div class="container">
            <div class="page-title text-center white-color">
                <h1 style="text-transform: uppercase;">Member’s Portal</h1>
                <div class="por-tal">
                    <a style="padding: 10px; text-decoration: none;" href="https://tyca-book.sftechnologiesstage.co"
                        class="portal-btn">Book Appointment</a>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="tab-section">
            <ul class="nav" style="justify-content: center;">
                <li class="nav-item1">
                    <a class="nav-link active" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest"
                        type="button" role="tab" aria-controls="latest" aria-selected="true">Member’s Information</a>
                </li>
                <li class="nav-item1">
                    <a class="nav-link" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button"
                        role="tab" aria-controls="upcoming" aria-selected="true">Bookings</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="latest" class="tab-pane fade show active">
                    <!-- Content for Tab 1 -->

                    <h2 class="h2-member">MEMBER'S INFORMATION</h2>

                    <div class="row col-md-12" id="customer-review_wrap">
                        <div class="col-md-3 member-imgs" id="customer-img">
                            <img src="{{ getLogInUser()->profile_image }}" alt="" class="cust-img">
                        </div>
                        <div class="col-md-6" id="customer-content-wrap" style="margin-left:30px;">
                            <div class="your-rating-wrap">
                                <span>{{$data['user']->first_name}} {{$data['user']->last_name}}</span>
                                <p style="font-family:Poppins;">{{$data['user']->email}}</p>
                            </div>

                            <div class="row btn-portal col-lg-12">
                                <div class="col-lg-12 col-sm-4 col-xs-4 update-btn btn-member update-member">
                                    <button class="up-btn right-btn update-member" data-bs-toggle="modal"
                                        data-bs-target="#update_info_modal">Update
                                        Information</button>
                                    <button class="log-btn"
                                        onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">Log
                                        Out</button>
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
                            <a class="nav-link active" id="latests-tab-1" data-bs-toggle="tab" data-bs-target="#latests"
                                type="button" role="tab" aria-controls="latests" aria-selected="true">Upcoming</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" id="upcomings-tab-2" data-bs-toggle="tab" data-bs-target="#upcomings"
                                type="button" role="tab" aria-controls="upcomings" aria-selected="true">Past</a>
                        </li>
                    </ul>


                    <div class="tab-content">
                        <div id="latests" class="tab-pane fade show active">

                            <h2 class="up-booking">UPCOMING BOOKINGS</h2>
                            <div class="table-container">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr style="background: #F7F7F7;font-family: Poppins;">
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
                                        <?php if(isset($appointment->transaction)){ ?>
                                        <tr style="color: #111827; font-size: 10px;line-height: 15px;font-weight: 400;font-family: Poppins;">
                                            <td>{{ $appointment->doctor->user->first_name}}</td>
                                            <td>{{ $appointment->services->name}}</td>
                                            @if($appointment->plan_type == "hourly")
                                            <td>Hourly Plan</td>
                                            @elseif($appointment->plan_type == "daily")
                                            <td>Daily Plan</td>
                                            @else
                                            <td>N/A</td>
                                            @endif
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d h.ia', date('Y-m-d h.ia', strtotime(str_replace('.', '', $appointment->date))))->format('d F Y') }}, {{$appointment->from_time}} {{$appointment->from_time_type}}</td>
                                            <td>${{ $appointment->payable_amount }}.00</td>


                                            @if($appointment->payment_method == 2)
                                            <td>
                                                Stripe
                                            </td>
                                            @else
                                            <td>Paypal</td>
                                            @endif

                                            @if($appointment->transaction->status == 0)
                                            <td>Pending</td>
                                            @elseif($appointment->transaction->status == 1)
                                            <td>Paid</td>
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
                                            <td><a onclick="bookedInfoData({{$appointment}});"><i
                                                        class="fa-solid fa-eye pe-3"></i></a>
                                                <a onclick="cancelConfirm({{$appointment}})"> <i
                                                        class="fa-solid fa-xmark"></i></a>
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
                                <table class="table table table-striped" id="example1" style="width:100%">
                                    <thead class="thead-portal">
                                        <tr style="background: #F7F7F7; font-family: Poppins;">
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
                                        <tr style="color: #111827;font-size: 10px;line-height: 15px;font-weight: 400; font-family: Poppins;">
                                            <td>{{ $appointment->doctor->user->first_name}}</td>
                                            <td>{{ $appointment->services->name}}</td>
                                            @if($appointment->plan_type == "daily")
                                            <td>Daily Plan</td>
                                            @elseif($appointment->plan_type == "hourly")
                                            <td>Hourly Plan</td>
                                            @else
                                            <td>N/A</td>
                                            @endif
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d h.ia', date('Y-m-d h.ia', strtotime(str_replace('.', '', $appointment->date))))->format('d F Y') }}, {{$appointment->from_time}} {{$appointment->from_time_type}}</td>
                                            <td>${{ $appointment->payable_amount }}.00</td>
                                            @if($appointment->payment_method == 2)
                                            <td>
                                                Stripe
                                            </td>
                                            @else
                                            <td>Paypal</td>
                                            @endif

                                            @if($appointment->transaction->status == false)
                                            <td>Pending</td>
                                            @elseif($appointment->transaction->status == true)
                                            <td>Paid</td>
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

                                            <td><a onclick="bookedInfoData({{$appointment}});"><i
                                                        class="fa-solid fa-eye"></i></a>
                                                {{--<a onclick="cancelConfirm({{$appointment}})"> <i
                                                        class="fa-solid fa-xmark"></i></a>--}}
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



        <div id="booked_info_modal" class="modal fade" role="dialog" aria-hidden="true" style="background-color:#000000d1">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header-1">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="books-spaces">BOOKING INFORMATION</div>
                    <div class="book-p">
                        <div class="book-infos">
                            <p class="book-val">Outlet:
                            <p>&nbsp;
                            <p id="outinfo" class="book-ps"></p>
                        </div>
                        <div class="book-infos">
                            <p class="book-val">Booking Space:</p>&nbsp;
                            <p id="bookSpaceInfo" class="book-ps"></p>
                        </div>
                        <div class="book-infos">
                            <p class="book-val">Plan Type:</p>&nbsp;
                            <p id="planTypeInfo" class="book-ps"></p>
                        </div>
                        <div class="book-infos">
                            <p class="book-val">Appointment At:</p>&nbsp;
                            <p id="appointAtIfo" class="book-ps"></p><p class="book-ps">,</p>&nbsp;
                            <p id="getTime" class="book-ps"></p>&nbsp; <p id="getType" class="book-ps"></p>
                        </div>
                        <div class="book-infos">
                            <p class="book-val">Payable Amount:</p>&nbsp;
                            <p id="payableInfo" class="book-ps"></p>
                        </div>
                        <div class="book-infos">
                            <p class="book-val">Payment Method:</p>&nbsp;
                            <p id="paymentMethod" class="book-ps"></p>
                        </div>
                        <div class="book-infos">
                            <p class="book-val">Payment Status:</p>&nbsp;
                            <p id="statusInfo" class="book-ps"></p>
                        </div>
                        <div class="book-infos">
                            <p class="book-val">Booking Status:</p>&nbsp;
                            <p id="bookedInfoses" class="book-ps"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div id="cancel_booking_modal" class="modal fade" role="dialog" aria-hidden="true"  style="background-color:#000000d1">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header-1">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="books-spaces">CANCEL BOOKING</div>
                <p class="follow-booking">Do you want to cancel the following booking?</p>
                <div class="book-p-cancel">
                    <div class="book-infos">
                        <p class="book-val">Outlet:
                        <p>&nbsp;
                        <p id="coutinfo" class="book-ps"></p>
                    </div>
                    <div class="book-infos">
                        <p class="book-val">Booking Space:
                        <p>&nbsp;
                        <p id="cbookSpaceInfo" class="book-ps"></p>
                    </div>
                    <div class="book-infos">
                        <p class="book-val">Plan Type:
                        <p>&nbsp;
                        <p id="cplanTypeInfo" class="book-ps"></p>
                    </div>
                    <div class="book-infos">
                        <p class="book-val">Appointment At:
                        <p>&nbsp;
                        <p id="cappointAtIfo" class="book-ps"></p><p class="book-ps">,</p>&nbsp;
                        <p id="cgetTime" class="book-ps"></p>&nbsp; <p id="cgetType" class="book-ps"></p>
                    </div>
                    <div class="book-infos">
                        <p class="book-val">Payable Amount:
                        <p>&nbsp;
                        <p id="cpayableInfo" class="book-ps"></p>
                    </div>
                    <div class="book-infos">
                        <p class="book-val">Payment Method:
                        <p>&nbsp;
                        <p id="cpaymentMethod" class="book-ps"></p>
                    </div>
                    <div class="book-infos">
                        <p class="book-val">Payment Status:
                        <p>&nbsp;
                        <p id="cstatusInfo" class="book-ps"></p>
                    </div>
                    <div class="book-infos">
                        <p class="book-val">Booking Status:
                        <p>&nbsp;
                        <p id="cbookedInfo" class="book-ps"></p>
                    </div>
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

<div id="cancel_confirm_modal" class="modal fade" role="dialog" aria-hidden="true" style="background-color:#000000d1">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <button type="button" class="btns btn-secondarys" onclick="cancelAppoint1();"  data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="update_info_modal" class="modal fade" role="dialog" aria-hidden="true" style="background-color:#000000d1">
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
                            {{ Form::label('First Name', __('First Name').(''), ['class' => 'form-label ']) }}
                            <span class=""></span>
                            <input name="first_name" type="text" class="form-control" id="name"
                                aria-describedby="firstName" placeholder="{{ __('messages.patient.first_name') }}"
                                value="{{ $data['user']->first_name }}" pattern="[A-Za-z]+"
                                title="Please enter alphabetic characters only">
                        </div>
                        <div class="form-group col-sm-6">
                            {{ Form::label('Last Name', __('Last Name').(''), ['class' => 'form-label  ']) }}
                            <span class=""></span>
                            <input name="last_name" type="text" class="form-control" id="last_name"
                                aria-describedby="lastName" placeholder="{{ __('messages.patient.last_name') }}"
                                value="{{ $data['user']->last_name }}" pattern="[A-Za-z]+"
                                title="Please enter alphabetic characters only">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            {{ Form::label('Email', __('Email').(''), ['class' => 'form-label  ']) }}
                            <span class=""></span>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="email"
                                placeholder="{{ __('messages.patient.email') }}" value="{{$data['user']->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            {{ Form::label('New Password', __('New Password').(''), ['class' => 'form-label  ']) }}
                            <span class=""></span>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="{{ __('messages.patient.password') }}" aria-describedby="password">
                        </div>
                        <div class="form-group col-sm-6">
                            {{ Form::label('Confirm New Password', __('Confirm New Password').(''), ['class' => 'form-label  ']) }}
                            <span class=""></span>
                            <input name="password_confirmation" type="password" class="form-control"
                                placeholder="{{ __('messages.patient.confirm_password') }}" id="password_confirmation"
                                aria-describedby="confirmPassword">
                        </div>
                    </div>

                    <div class="row">
                        @php $styleCss = 'style' @endphp
                        <p style="font-family: 'poppins';">Icon</p>
                        <div class="mb-3" io-image-input="true">
                            <div class="d-block">
                                <div class="image-picker">
                                    <div class="image previewImage" id="exampleInputImage" {{ $styleCss }}="background-image: url('{{$data['user']->profile_image }}')
                                ">
                                    </div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                        data-bs-toggle="tooltip"
                                        data-bs-original-title="{{ __('messages.user.edit_profile') }}">
                                        <label>
                                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                            <input type="file" id="profilePicture" name="image"
                                                class="image-upload d-none profile-validation" accept="image/*" />
                                        </label>
                                    </span>
                                </div>
                            </div>
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







<style>
    .form-control::placeholder {
        color:#989898 !important;
        font-size:20px !important;
        font-weight:400 !important;
        line-height:30px;
    }
    .form-control, .form-select {
    height: unset !important;
    border-radius: 0px !important;
    font-size: 20px !important;
    font-weight: 400 !important;
    line-height: 30px;
    padding: 8px !important;
    border: 2px solid#273432 !important;
    color: #000000;
    font-family: 'Poppins';
}
    .form-label {
    color: #000000 !important;
    font-size: 20px !important;
    line-height: 30px;
    font-weight: 400 !important;
    font-family: 'poppins';
}
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 16px !important;
    font-family: 'Poppins';
}
table.dataTable>thead>tr>th, table.dataTable>thead>tr>td {
    padding: 10px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    font-family: 'Poppins';
}
    .modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1050;
    width: 100vw;
    height: 100vh;
    background-color: #000000 !important;
}
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 16px !important;
}
    label {
    display: inline-block;
    font-size: 10px;
    font-weight: 400;
    line-height: 15px;
    color: #414141;
    text-transform: capitalize;
}
    .dataTables_wrapper .dataTables_info {
    clear: both;
    float: left;
    padding-top: 0.755em;
    font-size: 10px;
    line-height: 15px;
    font-weight: 400;
    color: #414141 !important;
    text-transform: capitalize;
}
    table.dataTable.no-footer {
    border-bottom: 0px !important;
}
    .table-striped>tbody>tr:nth-of-type(odd)>* {
        color: #111827 !important;
    --bs-table-accent-bg: #ffffff;
    font-size: 10px;
    line-height: 15px;
    font-weight: 400;
}
    .dataTables_wrapper .dataTables_length select {
    border: none !important;
    border-radius: 0px !important;
    padding: 10px;
    font-size: 10px;
    font-weight: 700;
    line-height: 15px;
    color: #414141;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    display: none;
}

.dataTables_wrapper .dataTables_paginate {
    float: right;
    text-align: right;
    padding-top: 0.25em;
    display: none;
}

.dataTables_wrapper .dataTables_length {
    float: right !important;
    position: absolute;
    right: 0;
    bottom: 0;
}

.image {
    display: inline-block;
    flex-shrink: 0;
    position: relative;
    -o-object-fit: cover;
    object-fit: cover;
}

.image-picker {
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 0.475rem;
    display: inline-block;
    position: relative;
}

.image-picker .previewImage {
    width: 100px;
    height: 100px;
    background-repeat: no-repeat;
    background-size: 100%;
    box-shadow: 0 5px 20px rgba(173, 181, 189, 0.2);
    border-radius: 0.313rem;
    border: 0.063rem solid #E9ECEF;
    background-position: center;
}

.image-picker .picker-edit {
    width: 25px;
    height: 25px;
    background-color: #FFFFFF;
    box-shadow: 0 5px 20px rgba(173, 181, 189, 0.2);
    border: 0.063rem solid #E9ECEF;
    display: flex;
    text-align: center;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: -10px;
    right: -10px;
}

.image-picker .picker-edit label {
    cursor: pointer;
}

body {
    font-family: "Noto Serif" !important;
}

.member-imgs {
    text-align: end;
}

.table-container {
    max-height: 300px;
    /* Adjust the height as needed */
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
    font-size: 70px;
    line-height: 95.34px;
    font-weight: 700;
    margin: 0;
}

.workspace {
    line-height: 40px;
    font-size: 35px;
    font-weight: 300;
    margin-top: 20px;
}

.book-infos {
    display: flex;
}

.book-ps {
    font-size: 20px;
    font-weight: 700;
    line-height: 30px;
    color: #535353;
}

.book-val {
    font-size: 20px;
    font-weight: 400;
    line-height: 30px;
    color: #535353;
}

section.title-hero-bg.parallax-effect img {
    width: 100%;
}

.por-tal {
    margin-top: 30px;
}

.portal-btn {
    font-size: 25px;
    background: #273432;
    border: #273432;
    font-weight: 600;
    line-height: 34.05px;
    color: #FFFFFF;
}

.tab-section {
    padding: 50px;
}

h2.h2-member {
    font-size: 50px;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 50px;
    font-weight: 700;
    color: #000000;
    line-height: 68.1px;
}

.customer-review_wrap {
    display: flex;
    justify-content: center;
}

.btn-portal {
    display: flex;
}

.update-btn {
    margin-right: 30px;
}

button.up-btn {
    background: #273432;
    border: #273432;
    color: #FFFFFF;
    font-size: 16px;
    padding: 10px 5px 10px 5px;
    width: 200px;
    line-height: 21.79px;
    font-weight: 600;
}

button.log-btn {
    background: #FF7272;
    border: #273432;
    color: #FFFFFF;
    font-size: 16px;
    padding: 10px 5px 10px 5px;
    width: 200px;
    line-height: 21.79px;
    font-weight: 600;
}

.your-rating-wrap span {
    color: #535353;
    font-size: 30px;
    font-weight: 500;
    line-height: 40.86px;
}

.your-rating-wrap p {
    color: #535353;
    margin-top: 10px;
    font-size: 20px;
    line-height: 30px;
    font-weight: 400;
    margin-bottom: 30px;
}

img.cust-img {
    width: 150px;
    border-radius: 100px;
    height: 150px;
}

a#tab1 {
    color: #000000 !important;
    font-weight: 500;
    font-size: 22px;
    border-bottom: 3px solid#273432;
}

a#tab2 {
    color: #535353 !important;
    font-weight: 500;
    font-size: 22px;
}

li.nav-item1 {
    width: 50%;
    text-align: center;
}

a#latest-tab {
    color: #535353 !important;
    font-size: 30px;
    font-weight: 700;
    line-height: 40.86px;
}

a#upcoming-tab {
    color: #535353;
    font-size: 30px;
    font-weight: 700;
    line-height: 40.86px;
}

a#latest-tab.active {
    border-bottom: 6px solid #000000;
    color: #000000;
    font-weight: 700;
}

a#upcoming-tab.active {
    border-bottom: 6px solid #000000;
    color: #000000;
    font-weight: 700;
}

h2.up-booking {
    font-size: 50px;
    font-weight: 700;
    text-align: center;
    margin-top: 30px;
    line-height: 68.1px;
    color: #000000;
    margin-bottom: 30px;
}

h2.past-booking {
    font-size: 50px;
    font-weight: 700;
    text-align: center;
    margin-top: 30px;
    line-height: 68.1px;
    color: #000000;
    margin-bottom: 30px;
}

a#latests-tab-1.active {
    background: #273432;
    color: #FFFFFF;
    font-weight: 700;
    /* width: 707.5px; */
    /* height: 70px; */
    font-size: 20px;
    line-height: 27.24px;
}

a#latests-tab-1 {
    background: #FFFFFF;
    color: #535353;
    margin-top: 60px;
    font-weight: 700;
    font-size: 20px;
    line-height: 27.24px;
}

a#upcomings-tab-2.active {
    background: #273432;
    color: #FFFFFF;
    font-weight: 700;
    font-size: 20px;
    line-height: 27.24px;
}

a#upcomings-tab-2 {
    background: #FFFFFF;
    color: #535353;
    margin-top: 60px;
    font-weight: 700;
    line-height: 27.24px;
    font-size: 20px;
}

.thead-portal {
    background: #F7F7F7;
    color: #6B7280;
}

th.col-portal {
    padding: 16px !important;
    font-size: 12px;
    line-height:18px;
    font-weight: 600 !important; 
    color: #6B7280;
}

.table>:not(caption)>*>* {
    border-bottom-width: 0 !important;
}

.table>:not(:first-child) {
    border-top: none !important;
}

.books-spaces {
    text-align: center;
    font-size: 50px;
    font-weight: 700;
    line-height: 68.1px;
    color: #000000;
    font-family: 'Noto Serif';
}

.book-p {
    align-self: center;
    margin-top: 30px;
    margin-bottom: 40px;
    color: #535353;
    font-family: 'Poppins';
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
    font-size: 20px;
    line-height: 27.24px;
    font-weight: 400;
}

.book-p-cancel {
    align-self: center;
    margin-top: 20px;
    margin-bottom: 40px;
    color: #535353;
    text-align: left;
    font-family: 'Poppins';
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
    padding: 10px 5px 10px 5px;
    color: #FFFFFF;
    line-height: 21.79px;
    font-size: 16px;
    font-weight: 600;
}

button.no-btn {
    width: 200px;
    background: #FF7272;
    border: #FF7272;
    padding: 10px 5px 10px 5px;
    color: #FFFFFF;
    line-height: 21.79px;
    font-size: 16px;
    font-weight: 600;
}

.cancel-yes-btn {
    width: 220px;
}

.btns {
    background: #273432;
    border: #273432;
    color: #FFFFFF !important;
    font-size: 16px;
    padding: 10px 5px 10px 5px;
    font-weight: 600;
    width: 200px;
    line-height: 21.79px;
}

.btn-secondarys {
    color: #fff;
    background-color: #273432;
    border-color: #273432;
}

.modal-footer {
    border-top: none !important;
}

.book-space {
    text-align: center;
    font-size: 50px;
    font-weight: 700;
    margin-top: -15px;
    line-height: 68.1px;
}

.book1-space {
    text-align: center;
    font-size: 20px;
    color: #535353;
    margin-top: -15px;
    font-weight: 400;
    line-height: 27.24px;
}

.modal-header {
    border-bottom: none !important;
}

.modal-backdrop.show {
    opacity: 0 !important;
}
.modal .fade .show{
    opacity: 0.5 !important;
}
.form-control,
.form-select {
    height: unset !important;
    border-radius: 0px !important;
    font-size: 18px;
    font-weight: 300;
    padding: 8px !important;
    border: 2px solid#273432 !important;
}

.form-label {
    color: #000000 !important;
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
}

.portal-btn:hover {
    background: #273432;
    border: #273432;
    color: #FFFFFF;
}

.right-btn {
    margin-right: 20px;
}

/* media */
@media (min-width: 320px) and (max-width: 600px) {
    .right-btn {
        margin-right: 0px !important;
    }

    .update-member {
        margin-bottom: 10px;
    }

    .member-imgs {
        text-align: center !important;
    }

    .page-title h1 {
        font-size: 25px;
    }

    .portal-btn {
        font-size: 20px !important;
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
        padding: 10px !important;
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
        color: #535353;
        font-size: 10px;
        font-family: 'Poppins';
    }

    .books-spaces {
        text-align: center;
        font-size: 18px;
        color: #000000;
        font-family: 'Noto Serif';
    }

    .book-p-cancel {
        font-size: 10px;
        font-family: 'Poppins';
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
        margin-bottom: 0px !important;
    }

    .col-lg-3.order-0.order-lg-3.mb-4.mb-lg-0 {
        margin-bottom: 0px !important;
    }
}


@media (max-width: 768px) {
    div#customer-review_wrap {
        justify-content: space-evenly;
    }
    h5.text-white.mb-4.pb-1 {
        font-size: 18px !important;
    }
}

@media (min-width: 600px) and ((max-width: 768px)) {
    .your-rating-wrap {
        margin-left: 0px !important;
    }

    .btn-portal {
        display: block !important;
    }

    .update-btn {
        margin-bottom: 10px !important;
    }
}

@media (min-width: 320px) and ((max-width: 1023px)) {
    button.log-btn {
        margin-left: 0px !important;
    }

    .update-member {
        margin-bottom: 10px !important;
    }
}

@media (max-width: 1024px) {

    .col-md-2.logout-btn {
        margin-left: 45px;
    }

    button.log-btn {
        margin-left: 0px;
    }

    .update-member {
        margin-bottom: 10px !important;
    }

    h5.text-white.mb-4.pb-1 {
        font-size: 18px !important;
    }

    .your-rating-wrap {
        margin-left: 0px !important;
    }
}
@media (max-width: 992px){
    .form-label {
    color: #000000 !important;
    font-size: 18px !important;
    }
}
@media (min-width: 768px) and (max-width: 800px) {

    h5,
    .fs-5 {
        font-size: 14px !important;
    }
}

.back-imgs {
    background-image: url("/assets/image/Frame 1907.png");
}
</style>
<script type="text/javascript">
function bookedInfoData(data) {
    var formatDate = function(date) {
    var months = new Array(12);
months[0] = "January";
months[1] = "February";
months[2] = "March";
months[3] = "April";
months[4] = "May";
months[5] = "June";
months[6] = "July";
months[7] = "August";
months[8] = "September";
months[9] = "October";
months[10] = "November";
months[11] = "December";
    
    
  return date.getDate() + " " + months[date.getMonth()] + " " + date.getFullYear() + " ";
}

var timestamp = data.date;
var date = new Date(timestamp);
    document.getElementById('outinfo').innerHTML = data.doctor.user.first_name;
    document.getElementById('bookSpaceInfo').innerHTML = data.services.name;
    var planTypeInfo = '';
    if (data.plan_type == 'hourly') {
        planTypeInfo = 'Hourly Plan';
    } else if(data.plan_type == 'daily') {
        planTypeInfo = 'Daily Plan';
    }
    document.getElementById('planTypeInfo').innerHTML = planTypeInfo;
    document.getElementById('getTime').innerHTML = data.from_time;
    document.getElementById('getType').innerHTML = data.from_time_type;
    document.getElementById('appointAtIfo').innerHTML = formatDate(date);
    document.getElementById('payableInfo').innerHTML = "$" + data.payable_amount + ".00";
    var payment_method = '';
    if (data.payment_method == 2) {
        payment_method = 'Stripe';
    } else {
        payment_method = 'Paypal';
    }
    document.getElementById('paymentMethod').innerHTML = payment_method;
    var transaction = '';
    if (data.transaction.status == 0) {
        transaction = "Pending";
    } else if (data.transaction.status == 1) {
        transaction = "Paid";
    } else {
        transaction = "Paid";
    }
    document.getElementById('statusInfo').innerHTML = transaction;
    var bookedInfos = '';

    if (data.status == 1) {
        bookedInfos = "Booked";
    } else if (data.status == 2) {
        bookedInfos = "Checking";
    } else if (data.status == 3) {
        bookedInfos = "Checkout";

    } else {

        bookedInfos = "Cancelled";
    }
    document.getElementById('bookedInfoses').innerHTML = bookedInfos;
    $("#booked_info_modal").modal('show');
}
var id = 0;

function cancelConfirm(data) {

    var formatDateC = function(date) {
    var months = new Array(12);
months[0] = "January";
months[1] = "February";
months[2] = "March";
months[3] = "April";
months[4] = "May";
months[5] = "June";
months[6] = "July";
months[7] = "August";
months[8] = "September";
months[9] = "October";
months[10] = "November";
months[11] = "December";
    
    
  return date.getDate() + " " + months[date.getMonth()] + " " + date.getFullYear() + " ";
}

var timestampC = data.date;
var date = new Date(timestampC);
    id = data.id;
    document.getElementById('coutinfo').innerHTML = data.doctor.user.first_name;
    document.getElementById('cbookSpaceInfo').innerHTML = data.services.name;
    var cplanTypeInfo = '';
    if (data.plan_type == 'hourly') {
        cplanTypeInfo = 'Hourly Plan';
    } else if(data.plan_type == 'daily') {
        cplanTypeInfo = 'Daily Plan';
    }
    document.getElementById('cplanTypeInfo').innerHTML = cplanTypeInfo;
    document.getElementById('cappointAtIfo').innerHTML = formatDateC(date);
    document.getElementById('cgetTime').innerHTML = data.from_time;
    document.getElementById('cgetType').innerHTML = data.from_time_type;
    document.getElementById('cpayableInfo').innerHTML = "$" + data.payable_amount + ".00";
    var cpaymentMethod = '';
    if (data.payment_method == 2) {
        cpaymentMethod = 'Stripe';
    } else {
        cpaymentMethod = 'Paypal';
    }
    document.getElementById('cpaymentMethod').innerHTML = cpaymentMethod;
    var cstatusInfo = '';
    if (data.transaction.status == 0) {
        cstatusInfo = "Pending";
    } else if (data.transaction.status == 1) {
        cstatusInfo = "Paid";
    } else {
        cstatusInfo = "Paid";
    }
    document.getElementById('cstatusInfo').innerHTML = cstatusInfo;
    var cbookedInfo = '';
    if (data.status == 1) {
        cbookedInfo = "Booked";
    } else if (data.status == 2) {
        cbookedInfo = "Checking";
    } else if (data.status == 3) {
        cbookedInfo = "Checkout";
    } else {
        cbookedInfo = "Cancelled";
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
function cancelAppoint1() {
           
    $("#cancel_confirm_modal").modal('show');
    $("#cancel_booking_modal").modal('hide');
    window.location.reload();
}

// var d = document.getElementById("booked_info_modal");
// d.className += " back-imgs";
// var e = document.getElementById("cancel_booking_modal");
// e.className += " back-imgs";
</script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
$('#example').DataTable({

});
$('#example1').DataTable({

});
</script>

@endsection