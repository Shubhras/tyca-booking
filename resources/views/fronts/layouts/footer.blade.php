<style>
        body {
    font-family: "Noto Serif" !important;
}
.footer-font{
    font-size: 16px;
    font-family: "Poppins", Sans-serif;
    font-weight: 400;
    text-align: center;
}
@media (max-width:1024px) {

.max-font {
        font-size: 14px !important;
    }
}

@media (max-width:768px) {

    h5,
    .fs-5 {
        font-size: 14px !important;
    }
}
@media (min-width:768px) {
    .footer-fonts {
        margin-top: -10px !important;
    }
}
@media (min-width:992px) {
    .footer-width{
        width: 600px!important;
    }
    .social-width{
    width: 450px!important;
}
}


.social-icon{
    color: #FFFFFF;
    border-color: #FFFFFF;
    font-size: 25px;
    text-align: center;
}
.footer-padding
{
    padding: 55px 0!important;
}
a.social-icon.aaa :hover {
    color: #ffffff !important;
}
</style>

<footer class="footer-padding" style="background-color:#273432">
    <div class="container footer-width">
        <div class="row">
            <div class="col-lg-6 col-md-6 order-1 order-lg-0">
            <p class="text-white  footer-font  max-font"> © {{ date('Y') }} Cover Projects Pte Ltd</p>
             {{--    <div class="footer-info">
                    <div class="d-flex align-items-center footer-info__block mb-3 pb-1 pb-xxl-4">
                        <div class="footer-info__footer-icon fs-5 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-phone text-primary "></i>
                        </div>
                        <a href="tel:+{{ getSettingValue('region_code') }} {{ getSettingValue('contact_no') }}"
                           class="text-decoration-none text-white footer-info__contact-label">
                            +{{ getSettingValue('region_code') }} {{ getSettingValue('contact_no') }}
                        </a>
                    </div>
                    <div class="d-flex align-items-center footer-info__block mb-3 pb-1 pb-xxl-4">
                        <div class="footer-info__footer-icon fs-5 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-envelope text-primary "></i>
                        </div>
                        <a href="mailto:{{getSettingValue('email')}}"
                           class="text-decoration-none text-white footer-info__contact-label">
                            {{ getSettingValue('email') }}
                        </a>
                    </div>
                </div>--}}
            </div>
            <div class="col-lg-6 col-md-6 order-2 order-lg-2">
                <p class="text-white footer-font max-font">All Rights Reserved</a>
             {{--    <ul>
                    <li>
                        <a href="{{ route('medicalAboutUs') }}"
                           class="text-decoration-none  mb-2 d-block fw-light {{ Request::is('medical-about-us*') ? 'text-black' : 'text-white' }}">{{ __('messages.web.about_us') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('medicalContact') }}"
                           class="text-decoration-none  mb-2 d-block fw-light {{ Request::is('medical-contact*') ? 'text-black' : 'text-white' }}"
                           data-turbo="false">{{ __('messages.web.contact_us') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('front.faqs') }}"
                           class="text-decoration-none mb-2 d-block fw-light {{ Request::is('faqs*') ? 'text-black' : 'text-white' }}">{{ __('messages.web.faqs') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('terms.conditions') }}"
                           class="text-decoration-none mb-2 d-block fw-light {{ Request::is('terms-conditions*') ? 'text-black' : 'text-white' }}">{{ __('messages.terms_conditions') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('privacy.policy') }}"
                           class="text-decoration-none mb-2 d-block fw-light {{ Request::is('privacy-policy*') ? 'text-black' : 'text-white' }}">{{ __('messages.privacy_policy') }}</a>
                    </li>
                </ul>--}}
            </div>
            <!-- <div class="col-lg-3 order-0 order-lg-3 mb-1 mb-lg-0 col-md-3">
                <p class="text-white  footer-font mb-1 pb-1 pb-xxl-4 pb-xl-4 max-font pb-xl-4 pb-xs-4 pb-sm-4">Terms and Conditions</p>
            {{--     <div class="footer-subcribe">
                    {{ Form::open(['id'=>'subscribeForm' , 'class' => 'subscribe-form subscription-form']) }}
                    <div class="subscribeForm-message"></div>
                        <div class="input-group mb-md-3">
                            {{ Form::email('email',null, ['class' => 'form-control form-control-transparent','id'=>'email', 'placeholder' => __('messages.web.enter_your_email'), 'required']) }}
                            <button type="submit" class="input-group-text" id="basic-addon2">
                                <i class="fa-solid fa-paper-plane text-primary"></i>
                                </button>
                        </div>
                    {{ Form::close() }}
                </div>--}}
            </div>
            <div class="col-lg-3 order-0 order-lg-3 mb-1 mb-lg-0 col-md-3"> 
                <p class="text-white  footer-font mb-1 pb-1 pb-xxl-4 pb-xl-4 pb-xl-4 pb-xs-4 pb-sm-4 max-font">
                Privacy Policy
            </p>
            </div> -->
         {{--    <div class="col-12 order-4 border-top-primary text-center mt-lg-5 mt-4">
                <p class="text-white fw-light py-4 mb-0">{{__('messages.web.all_rights_reserved')}} © {{ date('Y') }} {{ getAppName() }}</p>
            </div>--}}
        </div>
    </div>
    <div class="container social-width ">
        <div class="row justify-content-center">
        <div class="col-3 text-center">
        <a class="social-icon aaa" href="https://www.facebook.com/tyca.sg">
			<i aria-hidden="true" class="fab fa-facebook-square"></i></a> 
        </div>
        <div class="col-3 text-center"> 
        <a class="social-icon aaa" href="https://instagram.com/tyca.sg">
			<i aria-hidden="true" class="fab fa-instagram"></i></a>
        </div>
        <div class="col-3 text-center "> 
        <a class="social-icon aaa" href="https://tiktok.com/@tyca.sg">
			<i aria-hidden="true" class="fab fa-tiktok"></i></a>
        </div>
        </div>
    </div>
    
</footer>
