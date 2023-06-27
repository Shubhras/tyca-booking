<header class="position-relative header">
    <!-- <div class="container"> -->
        <div class="row align-items-center">
            <div class="col-lg-3 col-4">
                <a href="https://tyca-book.sftechnologiesstage.co" class="header-logo">
                    <img src="{{ getAppLogo() }}" alt="Infy Care" class="img-fluid" />
                </a>
            </div>
            <div class="col-lg-9 col-8">
                <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-light justify-content-end py-0">
                    <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav align-items-center py-2 py-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">{{ __('messages.web.home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('medical-doctors*') ? 'active' : '' }}"
                                   href="{{ route('medicalDoctors') }}">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('medical-services*') ? 'active' : '' }}"
                                   href="{{ route('medicalServices') }}">Store</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('medical-about-us*') ? 'active' : '' }}"
                                   href="{{ route('medicalAboutUs') }}">Membership</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ Request::is('medical-contact*') ? 'active' : '' }}"
                                   href="{{ route('medicalContact') }}"
                                   data-turbo="false">{{ __('messages.web.contact_us') }}</a>
                            </li>
                            <li class="nav-item">
                                        @if(getLogInUser())
                                        <a href="https://tyca-book.sftechnologiesstage.co/patients/dashboard" class="nav-link" id="nav-flex"><img class="img-fluid-logos" alt="img-fluid"
                                     src="{{ getLogInUser()->profile_image }}"/>   
                                     <h3 class="text-gray-900" id="logos-h">{{ getLogInUser()->full_name }}</h3> </a>
                                        @else
                                        <a href="{{ route('login') }}"
                                       class="btn1 btn-outline-primary1 me-xxl-3 me-2 mb-3 mb-lg-0 login-head" data-turbo="false">{{ __('messages.login') }}</a>
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
                                                        <li class="d-flex languageSelection language-padding {{ (getCurrentLanguageName() == $value) ? 'active' : '' }}" data-prefix-value="{{ $key }}">
                                                            <a href="javascript:void(0)" class="text-decoration-none">
                                                                <img class="rounded-1 ms-2 me-2 w-20px"
                                                                     src="{{asset($imageValue)}}"/>
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
.btn-outline-primary1:hover {
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
    padding: 10px 40px;
    font-size: 14px;
    border-radius: 0;
}

@media(max-width:768px){
.login-head{
    margin:0px 0px 0px 20px !important;
}
}
@media (min-width: 320px) and (max-width: 600px){
.btn1 {
    font-size: 14px !important;
}
}
    </style>