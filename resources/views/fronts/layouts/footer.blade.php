<style>
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
</style>

<footer style="background-color:#273432">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 order-1 order-lg-0">
                <h5 class="text-white mb-1 pb-1 pb-xxl-4 pb-xl-4 pb-xs-4 pb-sm-4 max-font"> © {{ date('Y') }} TYCA Pte Ltd</h5>
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
    <div class="col-lg-3 col-md-3 order-2 order-lg-2">
        <h5 class="text-white mb-1 pb-1 pb-xxl-4 pb-xl-4 pb-xs-4 pb-sm-4 max-font">All Rights Reserved</h5>
        {{--    <ul>
                    <li>
                        <a href="{{ route('medicalAboutUs') }}"
        class="text-decoration-none mb-2 d-block fw-light
        {{ Request::is('medical-about-us*') ? 'text-black' : 'text-white' }}">{{ __('messages.web.about_us') }}</a>
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
    <div class="col-lg-3 order-0 order-lg-3 mb-1 mb-lg-0 col-md-3">
        <h5 class="text-white mb-1 pb-1 pb-xxl-4 pb-xl-4 pb-xs-4 pb-sm-4 max-font">Terms and Conditions</h5>
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
        <h5 class="text-white mb-1 pb-1 pb-xxl-4 pb-xl-4 pb-xs-4 pb-sm-4 max-font">
            Privacy Policy
        </h5>
    </div>
    {{--    <div class="col-12 order-4 border-top-primary text-center mt-lg-5 mt-4">
                <p class="text-white fw-light py-4 mb-0">{{__('messages.web.all_rights_reserved')}} © {{ date('Y') }}
    {{ getAppName() }}</p>
    </div>--}}
    </div>
    </div>
</footer>