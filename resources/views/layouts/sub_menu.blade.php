@can('manage_admin_dashboard')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/dashboard*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/dashboard*') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}">{{ __('messages.dashboard') }}</a>
    </li>
@endcan
@role('doctor')
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/dashboard*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/dashboard*') ? 'active' : '' }}"
       href="{{ route('doctors.dashboard') }}">{{ __('messages.dashboard') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/appointments*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/appointments*') ? 'active' : '' }}"
       href="{{ route('doctors.appointments') }}">{{ __('messages.appointments') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/doctor-schedule-edit*','doctors/doctor-sessions/create*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/doctor-schedule-edit*','doctors/doctor-sessions/create*') ? 'active' : '' }}"
       href="{{ getLoginDoctorSessionUrl() }}">{{ __('messages.doctor_session.my_schedule') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/visits*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/visits*') ? 'active' : '' }}"
       href="{{ route('doctors.visits.index') }}">{{ __('messages.visits') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/transactions*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/transactions*') ? 'active' : '' }}"
       href="{{ route('doctors.transactions') }}">{{ __('messages.transactions') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/holidays*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/holidays*') ? 'active' : '' }}"
       href="{{ route('doctors.holiday') }}">{{ __('messages.holiday.holiday') }}</a>
</li>
@endrole
@role('patient')
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/dashboard*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/dashboard*') ? 'active' : '' }}"
       href="{{ route('patients.dashboard') }}">{{ __('messages.dashboard') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/appointments*','patients/patient-appointments-calendar*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/appointments*','patients/patient-appointments-calendar*') ? 'active' : '' }}"
       href="{{ route('patients.patient-appointments-index') }}">{{ __('messages.appointments') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/patient-visits*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/patient-visits*') ? 'active' : '' }}"
       href="{{ route('patients.patient.visits.index') }}">{{ __('messages.visits') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/transactions*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/transactions*') ? 'active' : '' }}"
       href="{{ route('patients.transactions') }}">{{ __('messages.transactions') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/connect-google-calendar*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/connect-google-calendar*') ? 'active' : '' }}"
       href="{{ route('patients.googleCalendar.index') }}">{{ __('messages.setting.connect_google_calendar') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/reviews*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/reviews*') ? 'active' : '' }}"
       href="{{ route('patients.reviews.index') }}">{{ __('messages.reviews') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/live-consultations*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/live-consultations*') ? 'active' : '' }}"
       href="{{ route('patients.live-consultations.index') }}">{{ __('messages.live_consultations') }}</a>
</li>
@endrole
@can('manage_staff')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/staffs*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/staffs*') ? 'active' : '' }}"
           href="{{ route('staffs.index') }}">{{ __('messages.staffs') }}</a>
    </li>
@endcan
@can('manage_doctors')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/doctors*', 'admin/doctor-sessions*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/doctors*') ? 'active' : '' }}"
           href="{{ route('doctors.index') }}">{{ __('messages.doctors') }}</a>
    </li>
@endcan
<!--@can('manage_doctor_sessions')-->
<!--    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0-->
<!--    {{ !Request::is('admin/doctors*', 'admin/doctor-sessions*') ? 'd-none' : '' }}">-->
<!--        <a class="nav-link p-0 {{ Request::is('admin/doctor-sessions*') ? 'active' : '' }}"-->
<!--           href="{{ route('doctor-sessions.index') }}">{{ (getLogInUser()->hasRole('doctor')) ? __('messages.doctor_session.my_schedule') : __('messages.doctor_sessions') }}</a>-->
<!--    </li>-->
<!--@endcan-->
@can('manage_patients')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/patients*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/patients*') ? 'active' : '' }}"
           href="{{ route('patients.index') }}">{{ __('messages.patients') }}</a>
    </li>
@endcan
@can('manage_settings')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*', 'admin/specializations*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/settings*') ? 'active' : '' }}"
           href="{{ route('setting.index') }}">{{ __('messages.settings') }}</a>
    </li>
<!--    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0-->
<!--    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">-->
<!--        <a class="nav-link p-0 {{ Request::is('admin/clinic-schedules*') ? 'active' : '' }}"-->
<!--           href="{{ route('clinic-schedules.index') }}">{{ __('messages.clinic_schedules') }}</a>-->
<!--    </li>-->

@endcan
@can('manage_doctors_holiday')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*', 'admin/specializations*', 'admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/holidays*') ? 'active' : '' }}"
           href="{{ route('holidays.index') }}">{{ __('messages.holiday.doctor_holiday') }}</a>
    </li>
@endcan
@can('manage_roles')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*', 'admin/specializations*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/roles*') ? 'active' : '' }}"
           href="{{ route('roles.index') }}">{{ __('messages.roles') }}</a>
    </li>
@endcan

@can('manage_specialities')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/specializations*', 'admin/settings*', 'admin/holidays*', 'admin/roles*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/specializations*') ? 'active' : '' }}"
           href="{{ route('specializations.index') }}">{{ __('messages.specializations') }}</a>
    </li>
@endcan

@can('manage_services')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/services*','admin/service-categories*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/services*') ? 'active' : '' }}"
           href="{{ route('services.index') }}">{{ __('messages.services') }}</a>
    </li>
<!--    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/services*','admin/service-categories*') ? 'd-none' : '' }}">-->
<!--        <a class="nav-link p-0 {{ Request::is('admin/service-categories*') ? 'active' : '' }}"-->
<!--           href="{{ route('service-categories.index') }}">{{ __('messages.service_categories') }}</a>-->
<!--    </li>-->
@endcan
@can('manage_appointments')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/appointments*','admin/admin-appointments-calendar*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/appointments*','admin/admin-appointments-calendar*') ? 'active' : '' }}"
           href="{{ route('appointments.index') }}">{{ __('messages.appointments') }}</a>
    </li>
@endcan
@can('manage_patient_visits')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/visits*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/visits*') ? 'active' : '' }}"
           href="{{ route('visits.index') }}">{{ __('messages.visits') }}</a>
    </li>
@endcan
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('profile/edit*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('profile/edit*') ? 'active' : '' }}"
       href="{{ route('profile.setting') }}">{{ __('messages.user.profile_details') }}</a>
</li>
@can('manage_front_cms')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/front-services*','admin/faqs*','admin/front-patient-testimonials*','admin/cms*','admin/sliders*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/cms') ? 'active' : '' }}"
           href="{{ route('cms.index') }}">Header</a>
    </li>
    <li class="nav-item position-relative mx-xl-3 ml-3 mb-3 mb-xl-0 {{ !Request::is('admin/front-services*','admin/faqs*','admin/front-patient-testimonials*','admin/cms*','admin/cmsbody*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/cmsbody*') ? 'active' : '' }}"
           href="{{ route('cmsbody.index') }}">{{ __('messages.cms.cmd_body') }}</a>
    </li>

@endcan
@can('manage_transactions')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/transactions*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/transactions*') ? 'active' : '' }}"
           href="{{ route('transactions') }}">{{ __('messages.transactions') }}</a>
    </li>
@endcan
