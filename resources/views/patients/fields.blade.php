<div class="row">
    <div class="col-md-6 mb-5">
        {{ Form::label('firstName',__('messages.patient.first_name').':' ,['class' => 'form-label required']) }}
        {{ Form::text('first_name',!empty($patient->user) ? $patient->user->first_name : null,['class' =>
        'form-control','placeholder' => __('messages.patient.first_name'),'required']) }}
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('lastName',__('messages.patient.last_name').':' ,['class' => 'form-label required']) }}
        {{ Form::text('last_name',!empty($patient->user) ? $patient->user->last_name : null,['class' =>
        'form-control','placeholder' => __('messages.patient.last_name'),'required']) }}
    </div>
    <div class="col-md-6 mb-5 d-none">
        {{ Form::label('patientUniqueId',__('messages.patient.patient_unique_id').':' ,['class' => 'form-label
        required']) }}
        {{ Form::text('patient_unique_id',isset($data['patientUniqueId']) ? $data['patientUniqueId'] : null,['class' =>
        'form-control','required','maxLength' => '8','readonly']) }}
    </div>
    <div class="col-md-12 mb-5">
        {{ Form::label('email',__('messages.patient.email').':' ,['class' => 'form-label required']) }}
        {{ Form::email('email',!empty($patient->user) ? $patient->user->email : null,['class' =>
        'form-control','placeholder' => __('messages.patient.email'),'required']) }}
    </div>

    <div class="col-md-6 mb-5">
        <div class="mb-1">
            {{ Form::label('password',__('messages.patient.password').':' ,['class' => 'form-label required']) }}
            <span data-bs-toggle="tooltip" title="{{ __('messages.flash.user_8_or') }}">
                <i class="fa fa-question-circle"></i></span>
            <div class="mb-3 position-relative">
                {{Form::password('password',['class' => 'form-control','placeholder' =>
                __('messages.patient.password'),'autocomplete' =>
                'off','aria-label'=>"Password",'data-toggle'=>"password"])}}
                <span
                    class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600"> <i
                        class="bi bi-eye-slash-fill"></i> </span>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-5">
        <div class="mb-1">
            {{ Form::label('confirmPassword',__('messages.patient.confirm_password').':' ,['class' => 'form-label
            required']) }}
            <span data-bs-toggle="tooltip"
                  title="{{ __('messages.flash.user_8_or') }}">
                    <i class="fa fa-question-circle"></i></span>
            <div class="mb-3 position-relative">
                {{Form::password('password_confirmation',['class' => 'form-control','placeholder' =>
                __('messages.user.confirm_password'),'autocomplete' =>
                'off','aria-label'=>"Password",'data-toggle'=>"password"])}}
                <span
                    class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600"> <i
                        class="bi bi-eye-slash-fill"></i> </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 mt-5">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label">{{__('messages.patient.profile')}}:</label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ !empty($patient->profile) ? $patient->profile : asset('web/media/avatars/male.png') }})">
                    </div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top" data-bs-original-title="{{ __('messages.user.edit_profile') }}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" name="profile" id="profilePicture"
                                   class="image-upload d-none profile-validation" accept="image/*"/>
                        </label>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
        <a href="{{route('patients.index')}}" type="reset"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>
