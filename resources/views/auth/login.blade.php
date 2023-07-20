@extends('fronts.layouts.app')
@section('title')
{{__('messages.login')}}
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
    color: #fff;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    background-color: #273432;
    border: 1px solid #273432;
    font-size: 16px;
    gap: 10px;
    height: 42px;
    width: 200px;
    padding: 10px 5px 10px 5px;
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

@media (min-width: 767px) and (max-width: 800px) {

    h5,
    .fs-5 {
        font-size: 14px !important;
    }
}

@media (min-width: 360px) and (max-width: 375px) {
    .down-log1 {
        width: 295px !important;
    }
}

@media (min-width: 992px) and (max-width: 1100px) {
    .down-log {
        width: 286px !important;
        margin-left: -20px !important;
    }
}

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

    img.css-class {
        height: 373px;
    }

    .login-response {
        width: 100% !important;
    }

    body {
        background-color: #F4F3EE;
        overflow: auto !important;
    }
}

@media(min-width:800px) and (max-width:1440px) {

    h5,
    .fs-5 {
        font-size: 18px !important;
    }

    img.css-class {
        height: 100% !important;
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

@media(min-width:769px) and (max-width:1440px) {
    .col-3 {
        width: 30% !important;
    }
}
@media (min-width:320px) and (max-width:1023px) {
    .m-top-login{
margin-bottom: 10% !important;
    }
}
@media (min-width:1024px)  {
    .section-h{
        height: 100vh!important;
    }
}
@media (min-width:1024px) and (max-width:1100px) {
    .m-top-login{
margin-top: 12% !important;
    }
}
@media (min-width:1101px) and (max-width:1200px) {
    .m-top-login{
margin-top: 10% !important;
    }
}
@media (min-width:1201px) and (max-width:1300px) {
    .m-top-login{
margin-top: 10% !important;
    }
}
@media (min-width:1301px) and (max-width:1460px) {
    .m-top-login{
margin-top: 9% !important;
    }
}
@media (min-width:1461px)and (max-width:1600px) {
    .m-top-login{
margin-top: 7% !important;
    }
}
@media (min-width:1301px) and (max-width:1440px) {
    .m-top-login{
margin-top: 9% !important;
    }
}
@media (min-width:1441px)and (max-width:1600px) {
    .m-top-login{
margin-top: 9% !important;
    }
}
@media (min-width:1601px)and (max-width:1800px) {
    .m-top-login{
margin-top: 7% !important;
    }
}
@media (min-width:1801px) {
    .m-top-login{
margin-top: 15% !important;
    }
}


.sign-set {
    font-Weight: 700;
    font-size: 25px;
    Line-height: 34.05px;
    color: #000000;
}

.forgot-password {
    font-Weight: 400;
    font-size: 15px;
    Line-height: 20.43px;
    color: #535353;
    width: 174px;
    / height: 36px; /
}

.forgot-password1 {
    font-Weight: 400;
    font-size: 15px;
    Line-height: 20.43px;
    color: #535353
}
</style>

<div>

    <div class="flex-column flex-column-fluid align-items-center justify-content-center">

        <div class="width-540">
            @include('flash::message')
            @include('layouts.errors')
        </div>
        <!-- <div class="row col-12 log-margin" style="margin:0;">
            <div class="col-6 login-response log-padding" style="margin:0; padding:0;">
                <img src="assets/image/sing-up.png" class="css-class" alt="alt text" style="width: 100%;">
            </div>

            <div class="bg-white rounded-15 shadow-md width-540 px-3 px-sm-7 mx-auto col-3 login-response m-top-login"
                style="height: 50%;margin: auto;">
                <div class="col-12 text-center">
                    <a href="{{ route('medical') }}" class="image py-10">
                        <img alt="Logo" src="{{ asset(getAppLogo()) }}" class="img-fluid pt-4" style="padding: 20px;">
                    </a>
                </div>
                <h3 class="text-center mb-7 pt-3 pb-3 sign-set">{{__('auth.sign_in')}}</h3>
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
                    <div class="d-flex justify-content-between pt-2 pb-2">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="form-check-label forgot-password">
                            {{ __('messages.common.forgot_your_password').'?' }}
                        </a>
                        @endif
                    </div>
                    <div class="mb-sm-7 mb-3 pb-3 form-check">
                        <input type="checkbox" class="form-check-input " id="remember_me"
                            style="width:20px; height:20px;">
                        <label class="form-check-label forgot-password1" style="margin-left:10px; margin-top:5px;"
                            for="remember_me">{{ __('messages.common.remember_me') }}</label>
                    </div>
                    <div class="d-grid align-items-center" style="justify-content: center;">
                        <button type="submit" class="btn2 btn-primary2">{{ __('messages.login') }}</button>
                    </div>

                    <div class="d-flex align-items-center mb-3 mt-3 down-log down-log1"
                        style="justify-content: center;margin-bottom: 1.5rem;">
                        <span class="me-2 forgot-password1">New Customer?</span>
                        <a href="{{ route('register') }}" class="form-check-label fs-7 forgot-password1">
                            {{__('messages.web.create_an_account')}}
                        </a>
                    </div>
                </form>
            </div>
        </div> -->
        <section class="section-h">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-6 login-response px-0 d-sm-block">
        <img src="assets/image/sing-up.png"
          alt="Login image" class="w-100 section-h" style="object-fit: cover;">
      </div>
      <div class="col-6 login-response p-0">
      <div class="bg-white rounded-15 shadow-md width-540 p-3 px-sm-7 mx-auto col-7 login-response m-top-login"
                >
                <div class="bg-white">
                <div class="col-12 text-center">
                    <a href="{{ route('medical') }}" class="image py-10">
                        <img alt="Logo" src="{{ asset(getAppLogo()) }}" class="img-fluid pt-4" style="padding: 20px;">
                    </a>
                </div>
                <h3 class="text-center mb-7 pt-3 pb-3 sign-set">{{__('auth.sign_in')}}</h3>
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
                    <div class="d-flex justify-content-between pt-2 pb-2">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="form-check-label forgot-password">
                            {{ __('messages.common.forgot_your_password').'?' }}
                        </a>
                        @endif
                    </div>
                    <div class="mb-sm-7 mb-3 pb-3 form-check">
                        <input type="checkbox" class="form-check-input " id="remember_me"
                            style="width:20px; height:20px;">
                        <label class="form-check-label forgot-password1" style="margin-left:10px; margin-top:5px;"
                            for="remember_me">{{ __('messages.common.remember_me') }}</label>
                    </div>
                    <div class="d-grid align-items-center" style="justify-content: center;">
                        <button type="submit" class="btn2 btn-primary2">{{ __('messages.login') }}</button>
                    </div>

                    <div class="d-flex align-items-center mb-3 mt-3 down-log down-log1"
                        style="justify-content: center;margin-bottom: 1.5rem;">
                        <span class="me-2 forgot-password1">New Customer?</span>
                        <a href="{{ route('register') }}" class="form-check-label fs-7 forgot-password1">
                            {{__('messages.web.create_an_account')}}
                        </a>
                    </div>
                </form>
            </div>
      </div>
      </div>
    </div>
  </div>
</section>
        <!-- <section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="assets/image/sing-up.png"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Logo</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <div class="form-outline mb-4">
              <input type="email" id="form2Example18" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example18">Email address</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example28">Password</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="button">Login</button>
            </div>

            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>

          </form>

        </div>

      </div>
    </div>
  </div>
</section> -->
    </div>
</div>

@endsection