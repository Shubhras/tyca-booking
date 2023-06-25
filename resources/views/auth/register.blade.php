@extends('fronts.layouts.app')
@section('title')
{{__('messages.register')}}
@endsection
@section('front-content')

<style>
body {
    background-color: #F4F3EE;
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

@media (min-width: 360px) and (max-width: 375px){
.down-sign{
    width: 275px !important;
    font-size:14px;

}
}
@media (min-width: 992px) and (max-width: 1100px){
.down-sign{
    width: 275px !important;
    margin-left: -15px !important;
    font-size:14px;
}
.terms{
    width:300px;
}
}
@media (max-width: 575px){
h5, .fs-5 {
    font-size: 15px !important;
}
}
@media(min-width:320px) and (max-width:768px) {
    .login-response {
        width: 100% !important;
    }
    h5, .fs-5 {
    font-size: 14px !important;
}
}
@media(min-width:769px) and (max-width:1440px) {
    h5, .fs-5 {
    font-size: 18px !important;
}
}
@media(min-width:320px) and (max-width:1440px) {
.log-padding{
    padding:0px !important;
}
.log-margin{
    margin:0;
}
}
</style>

<div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center">

    <div class="width-540">
        @include('flash::message')
        @include('layouts.errors')
    </div>
    <div class="row col-12">
        <div class="col-7 login-response" style="padding: 0;">
            <img src="assets/image/sing-up.png" class="css-class" alt="alt text" style="width: 100%;">
        </div>
        <div class="bg-white rounded-15 shadow-md width-540 px-5 px-sm-7  mx-auto col-4 login-response"
            style="height: 50%;margin: auto;">
            <div class="col-12 text-center">
                <a href="{{ route('medical') }}" class="image mb-7 mb-sm-10 ">
                    <img alt="Logo" src="{{ asset(getAppLogo()) }}" class="img-fluid p-4">
                </a>
            </div>
            <h3 class="text-center mb-7">{{__('messages.web.patient_registration')}}</h3>
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
                <div class="mb-5 fv-row">
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

                    <div class="mb-sm-7 mb-4 form-check terms">
                        <input type="checkbox" class="form-check-input " name="toc" value="1" required />
                        <span class="text-gray-700 me-2 ml-1 ">{{__('messages.web.i_agree')}}
                            <a href="{{ route('terms.conditions') }}" class="ms-1 link-primary "
                                style="color: #000000b3;">{{__('messages.web.terms_and_conditions')}}</a>.
                        </span>
                    </div>

                    <div class="d-grid col-6" style="margin: auto;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="d-flex align-items-center mt-4 down-sign">
                        <span class="text-gray-700 me-2">{{__('messages.web.already_have_an_account').'?'}}</span>
                        <a href="{{ route('login') }}" class="form-check-label fs-7" style="color: #000000;">
                            {{__('messages.web.sign_in_here')}}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection