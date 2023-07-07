<div class="row">
    <div class="col-lg-4 mb-5">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label required">{{__('messages.cms.about_image'). " "}}:</label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage" style="background-image: url('{{ !empty($cmsData['body_image']) ? $cmsData['body_image'] : asset('web/media/avatars/male.png') }}')">
                    </div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top" data-bs-original-title="{{ __('messages.common.change_image') }}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" id="profile_image" name="about_image_1" class="image-upload d-none about-image-validation" accept="image/*" />
                        </label>
                    </span>
                </div>
            </div>
            <div class="form-text">{{ __('messages.doctor.allowed_img') }}</div>
        </div>
    </div>

<div class="d-flex">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary']) }}
</div>
</div>

<style>
    .image-picker .previewImage
    {
        width: 500px;
        height: 250px;
    }
</style>
