<header class="position-relative header">
    <!-- <div class="container"> -->
    <div class="row align-items-center header-height">
        <div class="col-lg-3 col-4">
            <a href="{{ url('/') }}" class="header-logo" style="padding-left: 20px;">
                <img src="{{ getAppLogo() }}" alt="Infy Care" class="head-logos" />
            </a>
        </div>
        <div class="col-lg-9 col-8">
            <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-light justify-content-end py-0">
                {{--<button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>--}}
                <button style="color:#273431; font-size: 15px;" class="navbar-toggler border-0 p-0" type="button"
                    id="navbar-toggler" onClick="toggleMenu()">
                    <span class="navbar-toggler-icon"></span>
                    <span style="padding: 0px 10px;">Menu</span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-center py-2 py-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-hov nav-color {{ Request::is('/*') ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/') }}">{{ __('messages.web.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-hov nav-color {{ Request::is('medical-doctors*') ? 'active' : '' }}"
                                href="{{ url('/') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-hov nav-color {{ Request::is('medical-services*') ? 'active' : '' }}"
                                href="{{ url('/') }}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-hov  nav-color {{ Request::is('medical-about-us*') ? 'active' : '' }}"
                                href="{{ url('/') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-hov  nav-color {{ Request::is('medical-about-us*') ? 'active' : '' }}"
                                href="{{ url('/') }}">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-hov nav-color  {{ Request::is('medical-contact*') ? 'active' : '' }}"
                                href="{{ url('/') }}" data-turbo="false">{{ __('messages.web.contact_us') }}</a>
                        </li>
                        <li class="nav-item">
                            @if(getLogInUser())
                            <a href="{{ url('/patients/dashboard') }}" class="nav-link nav-hov nav-color"
                                id="nav-flex"><img class="img-fluid-logos" alt="img-fluid"
                                    src="{{ getLogInUser()->profile_image }}" />
                                <h3 class="text-gray-900" id="logos-h">{{ getLogInUser()->full_name }}</h3>
                            </a>
                            @else
                            <div class="" id="menu-item-43">
                                <a href="{{ route('login') }}"
                                    class="btn3 btn-outline-primary3 me-xxl-3 me-2 mb-3 mb-lg-0 login-head "
                                    data-turbo="false">{{ __('messages.login') }}</a>
                            </div>
                            @endif
                        </li>
                        <li class="nav-item hide-hamer" id="logo-animate">
                            <a href="{{ url('/patients/dashboard') }}"
                                class=" me-xxl-3 mr-2 mb-3 mb-lg-0 hamburger"
                                data-turbo="false"><span><img src="/assets/images/rrrr.png" style="width:23px;height:18px;"></span>
                            </a>
                        </li>


                        {{--     <li class="nav-item dropdown">
                                <a href="javascript:void(0)" class="nav-link" id="dropdownMenuLink"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-language me-1"></i>{{getCurrentLanguageName()}}</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li class="add-menu-left">
                                <ul>
                                    @foreach(getUserLanguages() as $key => $value)
                                    @foreach(\App\Models\User::LANGUAGES_IMAGE as $imageKey=> $imageValue)
                                    @if($imageKey == $key)
                                    <li class="d-flex languageSelection language-padding {{ (getCurrentLanguageName() == $value) ? 'active' : '' }}"
                                        data-prefix-value="{{ $key }}">
                                        <a href="javascript:void(0)" class="text-decoration-none">
                                            <img class="rounded-1 ms-2 me-2 w-20px" src="{{asset($imageValue)}}" />
                                            <span class="language-color">{{ $value }}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                        </li>--}}
                    </ul>
            </nav>
        </div>
    </div>
    <!-- </div> -->
</header>
<script>
            let _isMenuOpenedCustom1 = false;

function toggleMenu() {
    const navbarToggler = document.getElementById('navbar-toggler');
    const navbarNav = document.querySelector('#navbarNav');
    navbarNav.classList.toggle('show', !_isMenuOpenedCustom1);
    navbarNav.classList.toggle('hide', _isMenuOpenedCustom1);

    _isMenuOpenedCustom1 = !_isMenuOpenedCustom1;

}
</script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i&display=swap">
<style>
body {
    font-family: "Noto Serif" !important;
}

.header {
    position: fixed !important;
    width: 100%;
    left: 0;
    right: 0;
    top: 0;
    margin: auto;
    padding-top: 10px !important;
    padding-bottom: 10px !important;
    padding-left:72px;
    padding-right:86px;
    transition: all 0.5s ease-in-out;
    z-index: 2 !important;
    background-color: #EEDFD0;
}

.navbar-toggler-icon1 {
    background-image: url(/assets/images/rrrr.png);
}

.hamburger {
    background: none;
    width: 34px;
    height: 5px;
    color: #273451;
    /* margin: 0px 0px 0px 15px; */
    padding:12px 22px;
    /* padding: 0 15px 0px 5px; */
}

header .navbar .navbar-nav .nav-item .nav-link {
    color: #000000 !important;
    font-weight: 500;
    padding-left: 10px;
    padding-right: 10px;
    letter-spacing: .7px;
    font-size: 16px;
    line-height:34px;    
}

.head-logos {
    width: 216px !important;
    height: 17px !important;
}

header .navbar .navbar-nav .nav-item .nav-link:hover,
header .navbar .navbar-nav .nav-item .nav-link .nav-color.active {
    background: -webkit-linear-gradient(#000000, #000000) !important;
    /* border-bottom: 1px solid #273432 !important; */
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: #00000000 !important
}

header .navbar .navbar-nav .nav-item .nav-link:hover,
header .navbar .navbar-nav .nav-item .nav-link.active {
    background: -webkit-linear-gradient(#000000, #000000) !important;
    /* border-bottom: 1px solid #273432 !important; */
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: #00000000 !important
}

.header-logo:hover {
    color: none !important;
}

a:hover {
    color: none !important;
}

a#nav-flex {
    display: flex;
}

h3#logos-h {
    font-size: 16px;
    margin-top: 10px;
}

img.img-fluid-logos {
    width: 40px;
    margin-right: 5px;
    border-radius: 50px;
}

.btn-outline-primary3:hover {
    border: 1px solid #273432;
    background: #273432;
    color: #fff;
    transition: all 0.3s ease-in-out;
}

.btn3 {
    font-weight: 400;
    color: #fff;
    /* width: 172px; */
    line-height: 34.05px;
    /* height: 56px; */
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    background-color: #273432;
    border: 1px solid #273432;
    padding: 12px 22px;
    font-size: 16px;
    border-radius: 0;
}

.btn3:hover {
    background: #273432 !important;
    color: #fff !important;
    border: 1px solid #273432 !important;
}

footer {
    padding-top: 40px !important;
}

@media(max-width:768px) {
    .login-head {
        margin: 0px 0px 0px 20px !important;
    }
}

@media (min-width:992px) and (max-width:1023px) {
    header .navbar .navbar-nav .nav-item .nav-link {
        font-size: 18px !important;
    }
}

@media (min-width:1024px) and (max-width:1200px) {
    header .navbar .navbar-nav .nav-item .nav-link {
        font-size: 17px !important;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .btn1 {
        font-size: 15px !important;
    }

    .btn11 {
        font-size: 15px !important;
    }

    .host-desk {
        font-size: 20px !important;
    }
}

@media (min-width:320px) and (max-width:991px) {
    .header {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }

    .btn1 {
        font-size: 15px !important;
    }

    .btn11 {
        font-size: 15px !important;
    }

    /* .head-logos {
        width: auto !important;
        height: auto !important;
    } */

    .hide-hamer {
        display: none !important;
    }

    .header-height {
        height: 50px;
    }
}


.nav-hov {
    color: #323232 !important;
    display: inline-block;
    margin: 0;
}

.nav-hov:after {
    display: block;
    content: '';
    border-bottom: solid 3px #323232;
    transform: scaleX(0);
    transition: transform 250ms ease-in-out;
}

.nav-hov:hover:after {
    transform: scaleX(1);
}

.nav-hov:after {
    transform-origin: 0% 50%;
}

.heart:hover {
    animation: beat .3s 2 alternate !important;
}

@keyframes beat {
    to {
        transform: scale(1.06);
    }
}

#menu-item-43:hover {
    transform: perspective(1px) translate3d(0, 0, 0) scale3d(1.08, 1.08, 1);
}

#menu-item-43 {
    transition: .2s ease-in-out 0s;
}
#logo-animate:hover {
    transform: scale(1.02);
    transition: .01s ease-in-out;
}
@media(max-width:767px){
    .head-logos {
    width: 160px !important;
    height: 17px !important;
}
}
@media(min-width:1024px) and (max-width:1200px){
header .navbar .navbar-nav .nav-item .nav-link {
    font-size: 12px !important;
}
.head-logos {
    width: 180px !important;
    height: 17px !important;
}
}
</style>