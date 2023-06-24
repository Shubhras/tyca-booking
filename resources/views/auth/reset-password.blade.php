@extends('fronts.layouts.app')
@section('title')
Reset Password
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
</style>
<div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center">
    <div class="width-540">
        @include('flash::message')
        @include('layouts.errors')
    </div>
    <div class="row col-12">
        <div class="col-7" style="padding: 0;">
            <img src="assets/image/sing-up.png" class="css-class" alt="alt text" style="width: 100%;">
        </div>
        <div class="bg-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto col-4"  style="height: 50%;margin: auto;">
        <div class="col-12 text-center">
                <a href="{{ route('medical') }}" class="image mb-7 mb-sm-10 ">
                    <img alt="Logo" src="{{ asset(getAppLogo()) }}" class="img-fluid p-4">
                </a>
            </div>
            <h3 class="text-center mb-7">{{__('auth.sign_in')}}</h3>
            <form method="POST" action="{{ route('password.update') }}" id="">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <!--Email-->
                <div class="mb-sm-7 mb-4">
                    <label for="email" class="form-label">
                        {{ __('messages.user.email').':' }}<span class="required"></span>
                    </label>
                    <input id="email" class="form-control form-control-solid" type="email"
                        value="{{ old('email', $request->email) }}" required autofocus name="email" autocomplete="off"
                        placeholder="{{__('messages.web.email')}}" />
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                {{--Password--}}
                <div class="mb-sm-7 mb-4">
                    <label class="form-label" for="password">{{__('messages.patient.password')}}</label>
                    <div class="mb-3 position-relative">
                        <input id="password" class="form-control form-control-solid" type="password" name="password"
                            required autocomplete="off" />
                    </div>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="fv-row mb-5">
                    <label class="form-label "
                        for="password_confirmation">{{__('messages.patient.confirm_password')}}</label>
                    <input class="form-control  form-control-solid" type="password" id="password_confirmation"
                        name="password_confirmation" autocomplete="off" />
                    <div class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{ __('Reset Password') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    @endsection