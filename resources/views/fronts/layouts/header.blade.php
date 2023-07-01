<script type="text/javascript">
let _isMenuOpened = false;

function toggleMenu() {
    const navbarToggler = document.getElementById('navbar-toggler');
    const navbarNav = document.querySelector('#navbarNav');
    if (_isMenuOpened == false) {
        navbarNav.classList.toggle('hide');

    } else {

        navbarNav.classList.toggle('show');
    }
    // isMenuOpened = !isMenuOpened;

}
document.addEventListener('DOMContentLoaded', function() {
    const navbarToggler = document.getElementById('navbar-toggler');
    const navbarNav = document.querySelector('#navbarNav');

    navbarToggler.addEventListener('click', function() {
        navbarNav.classList.toggle('show');
        navbarNav.classList.toggle('hide');
    });
});
</script>
<header class="position-relative header">
    <!-- <div class="container"> -->
    <div class="row align-items-center">
        <div class="col-lg-3 col-4">
            <a href="https://tyca-book.sftechnologiesstage.co" class="header-logo" style="padding-left: 20px;">
                <img src="{{ getAppLogo() }}" alt="Infy Care" class="img-fluid" />
            </a>
        </div>
        <div class="col-lg-9 col-8">
            <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-light justify-content-end py-0">
                {{--<button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>--}}
                <button class="navbar-toggler border-0 p-0" type="button" id="navbar-toggler" onClick="toggleMenu()">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-center py-2 py-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-color {{ Request::is('/*') ? 'active' : '' }}" aria-current="page"
                                href="{{ url('/') }}">{{ __('messages.web.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-color {{ Request::is('medical-doctors*') ? 'active' : '' }}"
                                href="{{ route('medicalDoctors') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-color {{ Request::is('medical-services*') ? 'active' : '' }}"
                                href="{{ route('medicalServices') }}">Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-color {{ Request::is('medical-about-us*') ? 'active' : '' }}"
                                href="{{ route('medicalAboutUs') }}">Membership</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-color  {{ Request::is('medical-contact*') ? 'active' : '' }}"
                                href="{{ route('medicalContact') }}"
                                data-turbo="false">{{ __('messages.web.contact_us') }}</a>
                        </li>
                        <li class="nav-item">
                            @if(getLogInUser())
                            <a href="http://localhost:8000/patients/dashboard" class="nav-link nav-color" id="nav-flex"><img
                                    class="img-fluid-logos" alt="img-fluid" src="{{ getLogInUser()->profile_image }}" />
                                <h3 class="text-gray-900" id="logos-h">{{ getLogInUser()->full_name }}</h3>
                            </a>
                            @else
                            <a href="{{ route('login') }}"
                                class="btn3 btn-outline-primary3 me-xxl-3 me-2 mb-3 mb-lg-0 login-head"
                                data-turbo="false">{{ __('messages.login') }}</a>
                            @endif
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


<style>
header .navbar .navbar-nav .nav-item .nav-link:hover, header .navbar .navbar-nav .nav-item .nav-link .nav-color.active {
    background: -webkit-linear-gradient(#000000, #000000) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: #00000000 !important
}
header .navbar .navbar-nav .nav-item .nav-link:hover, header .navbar .navbar-nav .nav-item .nav-link.active {
    background: -webkit-linear-gradient(#000000, #000000) !important;
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
    font-size: 18px;
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
    display: inline-block;
    font-weight: 400;
    color: #fff;
    line-height: 1.5;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    background-color: #273432;
    border: 1px solid #273432;
    padding: 10px 40px;
    font-size: 14px;
    border-radius: 0;
}

.btn3:hover {
    background: #273432 !important;
    color: #fff !important;
    border: 1px solid #273432 !important;
}

@media(max-width:768px) {
    .login-head {
        margin: 0px 0px 0px 20px !important;
    }
}

@media (min-width: 320px) and (max-width: 600px) {
    .btn1 {
        font-size: 14px !important;
    }
}
</style>