@extends('fronts.layouts.app')
@section('title')
{{__('messages.login')}}
@endsection
@section('front-content')

<style>
    .btn-primary1:hover {
    border: 1px solid #212529;
    background: black;
    color: #fff;
    transition: all 0.3s ease-in-out;
}
.btn1 {
    display: inline-block;
    font-weight: 400;
    color: #fff;
    line-height: 1.5;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    background-color: #212529;
    border: 1px solid #212529;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    border-radius: 0;
}
body {
    background-color: #F4F3EE;
}

header {
    display: none;
}

.mb-4 {
    margin-bottom: 0.6rem !important;
}
@media (min-width: 767px) and (max-width: 800px){
h5, .fs-5 {
    font-size: 14px !important;
}
}
@media (min-width: 360px) and (max-width: 375px){
.down-log1{
    width: 295px !important;
    /* margin-left: -20px !important; */
}
}
@media (min-width: 992px) and (max-width: 1100px){
.down-log{
    width: 286px !important;
    margin-left: -20px !important;
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
}
@media(min-width:800px) and (max-width:1440px) {
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

<div>

    <div class="flex-column flex-column-fluid align-items-center justify-content-center">

        <div class="width-540">
            @include('flash::message')
            @include('layouts.errors')
        </div>
        <div class="row col-12 log-margin">
            <div class="col-7 login-response log-padding">
                <img src="assets/image/sing-up.png" class="css-class" alt="alt text" style="width: 100%;">
            </div>

            <div class="bg-white rounded-15 shadow-md width-540 px-5 px-sm-7 mx-auto col-4 login-response"
                style="height: 50%;margin: auto;">
                <div class="col-12 text-center">
                    <a href="{{ route('medical') }}" class="image py-10">
                        <img alt="Logo" src="{{ asset(getAppLogo()) }}" class="img-fluid" style="padding: 20px;">
                    </a>
                </div>
                <h3 class="text-center mb-7">{{__('auth.sign_in')}}</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-sm-7 mb-4">
                        {{--  <label for="email" class="form-label">
                            {{ __('messages.patient.email').':' }}<span class="required"></span>
                        </label>--}}
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
                            required placeholder="Email">
                    </div>

                    <div class="mb-sm-7 mb-4">
                        <div class="d-flex justify-content-between">
                            {{-- <label for="password" class="form-label">{{ __('messages.patient.password') .':' }}<span
                                class="required"></span></label>--}}

                        </div>
                        <input name="password" type="password" class="form-control" id="password" required
                            placeholder="Password">
                    </div>
                    <div class="d-flex justify-content-between" style="padding-bottom: 10px;">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="form-check-label" style="color: #000000;">
                            {{ __('messages.common.forgot_your_password').'?' }}
                        </a>
                        @endif
                    </div>
                    <div class="mb-sm-7 mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me">
                        <label class="form-check-label"
                            for="remember_me">{{ __('messages.common.remember_me') }}</label>
                    </div>
                    <div class="d-grid col-6" style="margin: auto;">
                        <button type="submit" class="btn1 btn-primary1">{{ __('messages.login') }}</button>
                    </div>

                    <div class="d-flex align-items-center mb-10 mt-4 down-log down-log1"
                        style="justify-content: center;margin-bottom: 1.5rem;">
                        <span class="text-gray-700 me-2">New Customer?</span>
                        <a href="{{ route('register') }}" class="form-check-label fs-7" style="color: #000000;">
                            {{__('messages.web.create_an_account')}}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection