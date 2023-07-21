<style>
   .box-width {
        width:145px;
    }
@media(max-width:600px) {
    .monday-form {
        display: grid !important;
    }
}

@media(max-width:768px) {
    .form-check1 {
        margin-left: 0px !important;
        padding-left: 0px !important;
        float: initial !important;
    }

    .form-switch {
        padding-left: 0 !important;
    }
    .form-check {
        padding-left: 0px !important;
    }
    .mon-width{
        width:100% !important;
    }
}
.item-photo__preview {
        width: 100px;
        height: 100px;
    }

    .item-images>div {
        float: left;
        margin-right: 30px;
        margin-bottom: 15px;
        margin-top: 15px;
    }

    .delete {
        position: absolute;
        background: transparent;
        border: 1px solid;
        border-radius: 100%
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="mb-5">
            {{ Form::label('Name',__('messages.doctor.first_name').':' ,['class' => 'form-label required']) }}
            {{ Form::text('first_name', null,['class' => 'form-control','placeholder' => __('messages.doctor.first_name'),'required']) }}
        </div>
    </div>

    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('description', __('messages.doctor.description').':', ['class' => 'form-label']) }}
            <div id="doctorDescriptionId" class="editor-height" style="height: 200px"></div>
            {{ Form::hidden('description', null, ['id' => 'descriptionData']) }}
        </div>
    </div>
    <div class="col-md-5">
        <div class="mb-5">
            {{ Form::label('Specialization',__('messages.doctor.specialization').':' ,['class' => 'form-label required']) }}
            {{ Form::select('specializations[]',$specializations, null,['class' => 'io-select2 form-select amenities-select', 'multiple', 'data-placeholder' => __('messages.doctor.specialization')]) }}
        </div>
    </div>
    <div class="col-md-7 col-xxl-12 col-xl-12 mon-width">
        <div class="mb-5">
            {{ Form::label('Specialization','Operating Hours:' ,['class' => 'form-label required']) }}

            <div class="row">
                <?php
                  $slots = getSchedulesTimingSlot();
                    ?>


                <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                    <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-xs-12">
                        <label class="form-check">
                            <input class="form-check-input form-check1 feature mx-2" type="checkbox" value="1"
                                name="days[]" />MONDAY
                        </label>
                    </div>
                    <div
                        class="col-xl-8 col-lg-3 col-sm-12 col-xs-12 col-sm-12 col-xs-12 d-flex align-items-center buisness_end monday-form">
                        <div class="d-inline-block box-width">
                            <select class="form-control" data-control="select2" name="startTime[1]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span class="px-3">To</span>
                        <div class="d-inline-block box-width">
                            <select class="form-control " data-control="select2" name="endTime[1]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                    <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-xs-12">
                        <label class="form-check">
                            <input class="form-check1 form-check-input feature mx-2" type="checkbox" value="2"
                                name="days[]" />TUESDAY
                        </label>
                    </div>
                    <div class="col-xl-8 col-lg-3  d-flex align-items-center buisness_end monday-form">
                        <div class="d-inline-block box-width">
                            <select class="form-control " data-control="select2" name="startTime[2]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span class="px-3">To</span>
                        <div class="d-inline-block box-width">
                            <select class="form-control " data-control="select2" name="endTime[2]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                    <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-xs-12">
                        <label class="form-check">
                            <input class="form-check1 form-check-input feature mx-2" type="checkbox" value="3"
                                name="days[]" />WEDNESDAY
                        </label>
                    </div>
                    <div class="col-xl-8 col-lg-3  d-flex align-items-center buisness_end monday-form">
                        <div class="d-inline-block box-width">
                            <select class="form-control " data-control="select2" name="startTime[3]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span class="px-3">To</span>
                        <div class="d-inline-block">
                            <select class="form-control box-width" data-control="select2" name="endTime[3]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                    <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-xs-12">
                        <label class="form-check">
                            <input class="v form-check-input feature mx-2" type="checkbox" value="4"
                                name="days[]" />THURSDAY
                        </label>
                    </div>
                    <div class="col-xl-8 col-lg-3  d-flex align-items-center buisness_end monday-form">
                        <div class="d-inline-block">
                            <select class="form-control box-width" data-control="select2" name="startTime[4]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span class="px-3">To</span>
                        <div class="d-inline-block">
                            <select class="form-control box-width" data-control="select2" name="endTime[4]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                    <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-xs-12">
                        <label class="form-check">
                            <input class="form-check1 form-check-input feature mx-2" type="checkbox" value="5"
                                name="days[]" />FRIDAY
                        </label>
                    </div>
                    <div class="col-xl-8 col-lg-3  d-flex align-items-center buisness_end monday-form">
                        <div class="d-inline-block">
                            <select class="form-control box-width" data-control="select2" name="startTime[5]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span class="px-3">To</span>
                        <div class="d-inline-block">
                            <select class="form-control box-width" data-control="select2" name="endTime[5]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                    <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-xs-12">
                        <label class="form-check">
                            <input class="form-check1 form-check-input feature mx-2" type="checkbox" value="6"
                                name="days[]" />SATURDAY
                        </label>
                    </div>
                    <div class="col-xl-8 col-lg-3  d-flex align-items-center buisness_end monday-form">
                        <div class="d-inline-block">
                            <select class="form-control box-width" data-control="select2" name="startTime[6]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span class="px-3">To</span>
                        <div class="d-inline-block">
                            <select class="form-control box-width" data-control="select2" name="endTime[6]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                    <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-xs-12">
                        <label class="form-check">
                            <input class="form-check1 form-check-input feature mx-2" type="checkbox" value="7"
                                name="days[]" />SUNDAY
                        </label>
                    </div>
                    <div class="col-xl-8 col-lg-3  d-flex align-items-center buisness_end monday-form">
                        <div class="d-inline-block">
                            <select class="form-control box-width" data-control="select2" name="startTime[7]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span class="px-3">To</span>
                        <div class="d-inline-block">
                            <select class="form-control box-width" data-control="select2" name="endTime[7]" tabindex="-1"
                                aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                                <?php foreach($slots as $slot){   ?>
                                <option value="<?php echo $slot; ?>"
                                    <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>>
                                    <?php echo $slot; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            <div class="mb-3" io-image-input="true">
                <label for="exampleInputImage" class="form-label">{{__('messages.doctor.icon')}}:</label>
                <div class="d-block">
                    <div class="image-picker">
                        <div class="image previewImage" id="exampleInputImage"
                            style="background-image: url({{ !empty($service->icon) ? $service->icon : asset('web/media/avatars/male.png') }})">
                        </div>
                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                            data-placement="top" data-bs-original-title="{{ __('messages.user.icon') }}">
                            <label>
                                <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                <input type="file" id="profilePicture" name="profile"
                                    class="image-upload d-none profile-validation" accept="image/*" />
                            </label>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-5">
        <label for="exampleInputImage" class="form-label">Photo</label>
        <div class="item-upload">
            <input id="photo-upload" type="file" accept="image/*" name="gallery_image[]" multiple />
            <div id="photo-upload__preview" class="upload-preview"></div>
        </div>

    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label">{{__('messages.doctor.status')}}:</label>
        <div class="col-lg-8">
            <div class="form-check form-check-solid form-switch">
                <input tabindex="12" name="status" value="0" class="form-check1 form-check-input input-switch"
                    type="checkbox" id="allowmarketing" checked="checked"> 
                <label class="form-check-label" for="allowmarketing" id="lbl_change">Active</label>
            </div>
        </div>
    </div>
    <div class="row gx-10 mb-5">
        <div class="col-md-6 mb-5">
            {{ Form::label('Address1',__('messages.doctor.address1').':' ,['class' => 'form-label required']) }}
            {{ Form::text('address1', null,['class' => 'form-control','placeholder' => __('messages.doctor.address1'),'required']) }}
        </div>
        <div class="col-md-6 mb-5">
            {{ Form::label('Address2',__('messages.doctor.address2').':' ,['class' => 'form-label ']) }}
            {{ Form::text('address2', null,['class' => 'form-control','placeholder' => __('messages.doctor.address2')]) }}
        </div>
        <div class="col-md-6 mb-5">
            {{ Form::label('Country',__('messages.doctor.country').':' ,['class' => 'form-label required']) }}
            {{ Form::select('country_id', $country, null,['class' => 'io-select2 form-select', 'data-control'=>"select2", 'id'=>'editDoctorCountryId','placeholder' => __('messages.doctor.country'),'required']) }}
        </div>
        <div class="col-md-6 mb-5">
            {{ Form::label('State',__('messages.doctor.state').':' ,['class' => 'form-label required']) }}
            {{ Form::select('state_id', [], null,['class' => 'io-select2 form-select', 'data-control'=>"select2", 'id'=> 'editDoctorStateId','placeholder' => __('messages.doctor.state'),'required']) }}
        </div>
        <div class="col-md-6 mb-5">
            {{ Form::label('City',__('messages.doctor.city').':' ,['class' => 'form-label required']) }}
            {{ Form::select('city_id', [], null,['class' => 'io-select2 form-select', 'data-control'=>'select2', 'id'=> 'editDoctorCityId','placeholder' => __('messages.doctor.city'),'required']) }}
        </div>
        <div class="col-md-6 mb-5">
            <label class="form-label required">{{__('messages.doctor.postal_code')}}:</label>
            {{ Form::text('postal_code',null,['class' => 'form-control','placeholder' => __('messages.doctor.postal_code'),'required','pattern' => '\d+','title' => __('messages.valid_number')]) }}
        </div>
    </div>
    <div class="d-flex">
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-dark me-2']) }}
        <a href="{{route('doctors.index')}}" type="reset"
            class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>


    <script>
    var quill = new Quill('#doctorDescriptionId', {
        theme: 'snow'
    });
    </script>

    <script type="text/javascript">
    function previewImage(e, selectedFiles, imagesArray) {
        const elemContainer = document.createElement('div');
        elemContainer.setAttribute('class', 'item-images');
        for (let i = 0; i < selectedFiles.length; i++) {
            imagesArray.push(selectedFiles[i]);
            const imageContainer = document.createElement('div');
            const elem = document.createElement('img');
            elem.setAttribute('src', URL.createObjectURL(selectedFiles[i]));
            elem.setAttribute('class', 'item-photo__preview')
            const removeButton = document.createElement('button');
            removeButton.setAttribute('type', 'button');
            removeButton.classList.add('delete');
            removeButton.dataset.filename = selectedFiles[i].name,
                removeButton.innerHTML = '<span>&times;</span>'
            imageContainer.appendChild(elem);
            imageContainer.appendChild(removeButton);
            elemContainer.appendChild(imageContainer);
        }
        return elemContainer;
    }
    var item_images = [];
    document.getElementById('photo-upload').addEventListener('change', (e) => {
        var selectedFiles = e.target.files;

        const photoPreviewContainer = document.querySelector('#photo-upload__preview');
        const elemContainer = previewImage(e, selectedFiles, item_images);
        photoPreviewContainer.appendChild(elemContainer);
    });

    document.getElementById('photo-upload__preview').addEventListener('click', (e) => {
        const tgt = e.target.closest('button');
        if (tgt.classList.contains('delete')) {
            tgt.closest('div').remove();
            const fileName = tgt.dataset.filename
            item_images = item_images.filter(img => img.name != fileName)
        }
    })

    $(document).ready(function() {

        $(window).click(function(e) {
            let element = document.createElement('textarea')
            let editor_content_1 = quill.root.innerHTML
            element.innerHTML = editor_content_1

            // if (quill1.getText().trim().length === 0) {
            //     displayErrorMessage('The Terms & Conditions is required.')
            //     return false
            // }

            $('#descriptionData').val($(".ql-editor").html());
        });
    });

    $('#allowmarketing').change(function () {

        if (!$(this).is(':checked')) {
         $("#lbl_change").empty().text("Inactive");
    }else{
        $("#lbl_change").empty().text("Active");
    }
     
 });

    </script>