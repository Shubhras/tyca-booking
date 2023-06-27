@extends('fronts.layouts.app')
@section('title')
{{__('messages.web.forgot_password')}}
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
@media (min-width:1200px) and (max-width:1440px){
    .btn-down{
        flex-direction:column !important;
        font-size:15px;
    }
}
@media (min-width:320px) and (max-width:767px) {
.set-forget{
    width:100% !important;
}
.btn-forgot{
    width:100% !important;
}
.btn-size{
    font-size:12px !important;
}
.btn-down{
        flex-direction:column !important;
        font-size:15px;
    }
}
@media (min-width:768px) and (max-width:992px) {
    .set-forget{
    width:50% !important;
    justify-content:center !important;
}
.btn-forgot{
    width:100% !important;
    justify-content:center !important;
}
.btn-size{
    font-size:12px !important;
}
.btn-down{
        flex-direction:column !important;
        font-size:15px;
    }
}
@media (min-width:992px) and (max-width:1024px) {
/* .set-forget{
    width:100% !important;
} */
.btn-forgot{
    width:100% !important;
}
.btn-size{
    font-size:12px !important;
}
}
@media (min-width: 992px) and (max-width: 1100px){
    .btn-down{
        flex-direction:column !important;
        font-size:15px;
    }

}
</style>
<div class="d-flex flex-column flex-column-fluid align-items-center mt-12">

    <div class="width-540">
        @include('layouts.errors')
        @if (session('status'))
        @include('flash::message')
        @endif
    </div>
    <div class="row col-12">
        <div class="col-7  set-forget"  style="padding: 0;">
            <img src="assets/image/sing-up.png" class="css-class" alt="alt text" style="width: 100%;">
        </div>
        <div class=" set-forget bg-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto mx-auto col-4"
            style="height: 50%;margin: auto;">
            <div class="col-12 text-center">
                <a href="{{ route('medical') }}" class="image mb-7 mb-sm-10 ">
                    <img alt="Logo" src="{{ asset(getAppLogo()) }}" class="img-fluid p-4">
                </a>
            </div>
            <h3 class="text-center mb-7">{{__('messages.web.forgot_password').' ?'}}</h3>
            <div class="mb-4 text-center mb-5">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <form class="form w-100" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row" style="padding-bottom: 20px;">
                    <div class="col-md-12 mb-sm-7 mb-4 form-check">
                       {{--  <label for="email" class="form-label">
                            {{ __('messages.web.email').':' }}<span class="required"></span>
                        </label>--}}
                        <input id="email" class="form-control" type="email"
                            value="{{ old('email') }}" required autofocus name="email" autocomplete="off"
                            placeholder="{{__('messages.web.email')}}" />
                    </div>
                </div>
                <!-- <div class="row"> -->
                <!-- Submit Field -->
                <!-- <div class="form-group col-sm-12 d-flex text-start align-items-center">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label"> {{ __('messages.email_password_reset_link') }}</span>
                        </button> -->

                <!-- <a href="{{ route('login') }}"
                            class="btn btn-secondary my-0 ms-5 me-0">{{__('messages.common.cancel')}}</a> -->
                <!-- </div> -->
                <div class="d-grid col-8 btn-forgot" style="margin: auto; width:100%">
                    <button type="submit" class="btn btn-primary btn-size">
                        <span class="indicator-label"> {{ __('messages.email_password_reset_link') }}</span>
                    </button>
                </div>
                <!-- </div> -->
                <div class="d-flex align-items-center mt-4 btn-down" style="padding: 20px;">
                    <span class="text-gray-700 me-2 down-sign">{{__('messages.web.already_have_an_account').'?'}}</span>
                    <a href="{{ route('login') }}" class="form-check-label fs-7" style="color: #000000;">
                         Redirect to Sign Up page
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush