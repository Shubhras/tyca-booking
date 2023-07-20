@extends('fronts.layouts.app')
@section('title')
{{__('messages.register')}}
@endsection
@section('front-content')

<style>
.btn-primary2:hover {
    border: 1px solid #273432;
    background: #273432;
    color: #fff;
    transition: all 0.3s ease-in-out;
}

.btn2 {
    font-weight: 600;
    color: #ffffff;
    width:200px;
    height: 42px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    user-select: none;
    background-color: #273432;
    border: 1px solid #273432;
    padding: 10px 5px 10px 5px;
    font-size: 16;
    border-radius: 0;
}

body {
    background-color: #F4F3EE;
    font-family: "Noto Serif";
}

footer {
    padding-top: 40px !important;
    position: fixed;
    bottom: 0px;
    width: 100%;
}

header {
    display: none;
}

.mb-4 {
    margin-bottom: 0.6rem !important;
}

.form-control,
.form-select {
    height: 40px;
    padding: 0px 15px;
}

@media (min-width: 360px) and (max-width: 375px) {
    .down-sign {
        width: 275px !important;
        font-size: 14px;

    }
}

@media (min-width: 992px) and (max-width: 1100px) {
    .down-sign {
        width: 275px !important;
        margin-left: -15px !important;
        font-size: 14px;
    }

    .terms {
        width: 300px;
    }
}
/* @media (min-width:1024px) and (max-width:1200px) {
    .m-top{
margin-bottom: 19% !important;
    }
}
@media (min-width:1201px) and (max-width:1440px) {
    .m-top{
margin-bottom: 16% !important;
    }
}
@media (min-width:1440px) {
    .m-top{
margin-bottom: 14% !important;
    }
} */
@media (max-width: 575px) {

    h5,
    .fs-5 {
        font-size: 15px !important;
    }
}

@media(min-width:320px) and (max-width:768px) {
    footer {
        padding-top: 40px !important;
        position: relative !important;
        bottom: 0px;
        width: 100%;
        height: auto !important;
    }

    body {
        overflow: auto !important;
    }

    .login-response {
        width: 100% !important;
    }

    h5,
    .fs-5 {
        font-size: 14px !important;
    }

    .col-3 {
        width: 40%;
    }
}

@media (min-width:320px) and (max-width:1023px) {
    .m-top-reg{
margin-bottom: 10% !important;
    }
}
@media (min-width:1024px)  {
    .section-h{
        height: 100vh!important;
    }
}
@media (min-width:1024px) and (max-width:1100px) {
    .m-top-reg{
margin-top: 4% !important;
    }
}
@media (min-width:1101px) and (max-width:1200px) {
    .m-top-reg{
margin-top: 3.5% !important;
    }
}
@media (min-width:1201px) and (max-width:1300px) {
    .m-top-reg{
margin-top: 3.5% !important;
    }
}
@media (min-width:1301px) and (max-width:1460px) {
    .m-top-reg{
margin-top: 3% !important;
    }
}
@media (min-width:1461px)and (max-width:1600px) {
    .m-top-reg{
margin-top: 3% !important;
    }
}
@media (min-width:1601px)and (max-width:1800px) {
    .m-top-reg{
margin-top: 3.5% !important;
    }
}
@media (min-width:1801px) {
    .m-top-reg{
margin-top: 11% !important;
    }
}
@media(min-width:769px) and (max-width:1440px) {

    h5,
    .fs-5 {
        font-size: 18px !important;
    }

    img.css-class {
        height: 100% !important;
    }

    .col-3 {
        width: 30% !important;
    }
}

@media(min-width:320px) and (max-width:768px) {
    img.css-class {
        height: 370px !important;
    }
}

@media(min-width:320px) and (max-width:1440px) {
    .log-padding {
        padding: 0px !important;
    }

    .log-margin {
        margin: 0;
    }
}

.register-font {
    width:347px;
      top: 20px; 
      left:29px;
}
.register-heading{
    font-Weight: 700;
    font-size: 25px;
    Line-height: 34.05px;
    color: #000000;
    text-align:center;
}
.label-box{
    width:20px;
    height:20px;
    color:#323232;
}
.register-forgot{
    font-Weight: 400;
    font-size: 18px;
    Line-height: 24.52px;
    color: #535353;
}
.already-has{
    font-Weight: 400;
    font-size: 16px;
    Line-height: 21.79px;
    color: #535353;
}
</style>



<div>

    <div class="flex-column flex-column-fluid align-items-center justify-content-center">

        <div class="width-540">
            @include('flash::message')
            @include('layouts.errors')
        </div>
        <section class="section-h">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-6 login-response px-0 d-sm-block ">
        <img src="assets/image/sing-up.png"
          alt="Login image" class="w-100 section-h" style="object-fit: cover;">
      </div>
      <div class="col-6 login-response p-0">
      <div class="bg-white rounded-15 shadow-md width-540 px-3 py-1 px-sm-7 mx-auto col-7 login-response m-top-reg"
                >
                <div class="bg-white">
                <div class="col-12 text-center">
                <a href="{{ route('medical') }}" class="image mb-7 mb-sm-10">
                    <img alt="Logo" src="{{ asset(getAppLogo()) }}" class="img-fluid p-4 register-font">
                </a>
            </div>
            <h3 class="text-center mb-7 pt-3 pb-3 register-heading">{{__('messages.web.patient_registration')}}</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-sm-7 mb-4">
                        {{--  <label for="formInputFirstName" class="form-label">
                            {{ __('messages.patient.first_name').':' }}<span class="required"></span>
                        </label>--}}
                        <input name="first_name" type="text" class="form-control" id="name" aria-describedby="firstName"
                            placeholder="{{ __('messages.patient.first_name') }}" value="{{ old('first_name') }}"
                            required>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 mb-sm-7 mb-4">
                        {{--   <label for="last_name" class="form-label">
                            {{ __('messages.patient.last_name') .':' }}<span class="required"></span>
                        </label>--}}
                        <input name="last_name" type="text" class="form-control" id="last_name"
                            aria-describedby="lastName" placeholder="{{ __('messages.patient.last_name') }}" required
                            value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-sm-7 mb-4">
                        {{--   <label for="email" class="form-label">
                            {{ __('messages.patient.email').':' }}<span class="required"></span>
                        </label>--}}
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="email"
                            placeholder="{{ __('messages.patient.email') }}" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="mb-4 fv-row">
                    <div class="row">
                        <div class="col-md-12 mb-sm-7 mb-4">
                            {{-- <label for="password" class="form-label">
                                {{ __('messages.patient.password').':' }}<span class="required"></span>
                            </label> --}}
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="{{ __('messages.patient.password') }}" aria-describedby="password"
                                required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-sm-7 mb-4">
                            {{--  <label for="password_confirmation" class="form-label">
                                {{ __('messages.patient.confirm_password') .':' }}<span class="required"></span>
                            </label>--}}
                            <input name="password_confirmation" type="password" class="form-control"
                                placeholder="{{ __('messages.patient.confirm_password') }}" id="password_confirmation"
                                aria-describedby="confirmPassword" required>
                        </div>
                    </div>

                    <div class="mb-sm-7 mb-2 pt-2 pb-2 form-check terms" style="font-size:19px; color:#535353">
                        <input type="checkbox" class="form-check-input label-box" name="toc" value="1" required />
                        <span class="me-2 ml-1 register-forgot">I agree to the Terms & Conditions
                            {{--<span class="ms-1 register-forgot"
                                style="text-transform: capitalize; text-decoration:none;">Terms
                                & Conditions</span>.--}}
                        </span>
                    </div>

                    <div class="d-grid" style="justify-content:center;">
                        <button type="submit" class="btn2 btn-primary2">Register</button>
                    </div>
                    <div class="d-flex align-items-center mt-3 mb-3 down-sign" style="justify-content:center;">
                        <span class="text-gray-700 me-2 already-has">{{__('messages.web.already_have_an_account').'?'}}</span>
                        <a href="{{ route('login') }}"
                            class="form-check-label already-has">
                            {{__('messages.web.sign_in_here')}}
                        </a>
                    </div>
                </div>
            </form>
            </div>
      </div>
      </div>
    </div>
  </div>
</section>
  
    </div>
</div>
<!-- <div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center">

    <div class="width-540">
        @include('flash::message')
        @include('layouts.errors')
    </div>
    <div class="row col-12">
        <div class="col-lg-6 login-response" style="padding: 0;">
            <img src="assets/image/sing-up.png" class="css-class" alt="alt text" style="width: 100%;">
        </div>
        <div class="bg-white rounded-15 shadow-md width-540 px-3 px-sm-7  mx-auto col-xl-3 col-sm-5 login-response m-top"
            style="height: 50%;margin: auto;">
            <div class="col-12 text-center">
                <a href="{{ route('medical') }}" class="image mb-7 mb-sm-10">
                    <img alt="Logo" src="{{ asset(getAppLogo()) }}" class="img-fluid p-4 register-font">
                </a>
            </div>
            <h3 class="text-center mb-7 pt-3 pb-3 register-heading">{{__('messages.web.patient_registration')}}</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-sm-7 mb-4">
                        {{--  <label for="formInputFirstName" class="form-label">
                            {{ __('messages.patient.first_name').':' }}<span class="required"></span>
                        </label>--}}
                        <input name="first_name" type="text" class="form-control" id="name" aria-describedby="firstName"
                            placeholder="{{ __('messages.patient.first_name') }}" value="{{ old('first_name') }}"
                            required>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 mb-sm-7 mb-4">
                        {{--   <label for="last_name" class="form-label">
                            {{ __('messages.patient.last_name') .':' }}<span class="required"></span>
                        </label>--}}
                        <input name="last_name" type="text" class="form-control" id="last_name"
                            aria-describedby="lastName" placeholder="{{ __('messages.patient.last_name') }}" required
                            value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-sm-7 mb-4">
                        {{--   <label for="email" class="form-label">
                            {{ __('messages.patient.email').':' }}<span class="required"></span>
                        </label>--}}
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="email"
                            placeholder="{{ __('messages.patient.email') }}" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="mb-4 fv-row">
                    <div class="row">
                        <div class="col-md-12 mb-sm-7 mb-4">
                            {{-- <label for="password" class="form-label">
                                {{ __('messages.patient.password').':' }}<span class="required"></span>
                            </label> --}}
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="{{ __('messages.patient.password') }}" aria-describedby="password"
                                required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-sm-7 mb-4">
                            {{--  <label for="password_confirmation" class="form-label">
                                {{ __('messages.patient.confirm_password') .':' }}<span class="required"></span>
                            </label>--}}
                            <input name="password_confirmation" type="password" class="form-control"
                                placeholder="{{ __('messages.patient.confirm_password') }}" id="password_confirmation"
                                aria-describedby="confirmPassword" required>
                        </div>
                    </div>

                    <div class="mb-sm-7 mb-2 pt-2 pb-2 form-check terms" style="font-size:19px; color:#535353">
                        <input type="checkbox" class="form-check-input label-box" name="toc" value="1" required />
                        <span class="me-2 ml-1 register-forgot">I agree to the Terms & Conditions
                            {{--<span class="ms-1 register-forgot"
                                style="text-transform: capitalize; text-decoration:none;">Terms
                                & Conditions</span>.--}}
                        </span>
                    </div>

                    <div class="d-grid" style="justify-content:center;">
                        <button type="submit" class="btn2 btn-primary2">Register</button>
                    </div>
                    <div class="d-flex align-items-center mt-3 mb-3 down-sign" style="justify-content:center;">
                        <span class="text-gray-700 me-2 already-has">{{__('messages.web.already_have_an_account').'?'}}</span>
                        <a href="{{ route('login') }}"
                            class="form-check-label already-has">
                            {{__('messages.web.sign_in_here')}}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->
@endsection