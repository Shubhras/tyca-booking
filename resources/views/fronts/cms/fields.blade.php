<div class="row">

<div class="col-lg-6">
    <div class="mb-5">
        {{ Form::label('about_title', __('messages.web.about_title').':', ['class' => 'form-label required']) }}
        {{ Form::text('about_title', $cmsData['about_title'], ['class' => 'form-control', 'placeholder' => __('messages.web.about_title'), 'required', 'id' => 'aboutTitleId']) }}
    </div>
</div>


<div class="col-lg-6">
    <div class="mb-5">
        {{ Form::label('about_short_description', __('messages.web.about_short_description').':', ['class' => 'form-label required']) }}
        <div id="doctorDescriptionId" class="editor-height" style="height: 200px">

        {!! $cmsData['about_short_description'] !!}

        </div>
    </div>
</div>
{{ Form::hidden('about_short_description', $cmsData['about_short_description'], ['id' => 'descriptionData']) }}

    <div class="col-lg-4 mb-5">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label required">{{__('messages.cms.about_image'). " "}}:</label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage" style="background-image: url('{{ !empty($cmsData['about_image_1']) ? $cmsData['about_image_1'] : asset('web/media/avatars/male.png') }}')">
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
<script>
    var quill = new Quill('#doctorDescriptionId', {
      theme: 'snow'
    });

    $(document).ready(function(){
        $(window).click(function(e) {
            let element = document.createElement('textarea')
        let editor_content_1 = quill.root.innerHTML
        element.innerHTML = editor_content_1

        $('#descriptionData').val($(".ql-editor").html());
        });
    });
  </script>
