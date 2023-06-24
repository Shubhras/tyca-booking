<div class="row">
    <div class="col-md-12 mb-5">
        {{ Form::label('First Name',__('messages.doctor.first_name').':' ,['class' => 'form-label required']) }}
        {{ Form::text('first_name', $user->first_name,['class' => 'form-control','placeholder' => __('messages.doctor.first_name'),'required']) }}
    </div>


    <div class="col-lg-12">
    <div class="mb-5">
        {{ Form::label('description', __('messages.doctor.description').':', ['class' => 'form-label']) }}
        <div id="doctorDescriptionId" class="editor-height" style="height: 200px"> <?php

use Illuminate\Support\Arr;

 echo $doctor->description; ?></div>
        {{ Form::hidden('description', $doctor->description, ['id' => 'descriptionData']) }}
    </div>
</div>

    <div class="col-md-6 mb-5">
        {{ Form::label('Last Name',__('messages.doctor.last_name').':' ,['class' => 'form-label required']) }}
        {{ Form::text('last_name', $user->last_name,['class' => 'form-control','placeholder' => __('messages.doctor.last_name'),'required']) }}
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('Email',__('messages.user.email').':' ,['class' => 'form-label required']) }}
        {{ Form::email('email', $user->email,['class' => 'form-control','placeholder' =>  __('messages.web.email')]) }}
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('Contact',__('messages.user.contact_number').':' ,['class' => 'form-label']) }}
        {{ Form::tel('contact', '+'.$user->region_code.$user->contact,['class' => 'form-control','placeholder' =>  __('messages.patient.contact_no'),'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
        {{ Form::hidden('region_code',!empty($user->user) ? $user->user->region_code : null,['id'=>'prefix_code']) }}
        <span id="valid-msg" class="text-success d-none fw-400 fs-small mt-2">{{ __('messages.valid_number') }}</span>
        <span id="error-msg" class="text-danger d-none fw-400 fs-small mt-2">{{ __('messages.invalid_number') }}</span>
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('DOB',__('messages.doctor.dob').':' ,['class' => 'form-label']) }}
        {{ Form::text('dob', $user->dob,['class' => 'form-control doctor-dob','placeholder' => __('messages.doctor.dob'), 'id'=>'dob']) }}
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('Specialization',__('messages.doctor.specialization').':' ,['class' => 'form-label required']) }}
        {{ Form::select('specializations[]',$data['specializations'], $data['doctorSpecializations'],['class' => 'io-select2 form-select', 'data-control'=>"select2", 'multiple']) }}
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('Experience', __('messages.doctor.experience').':', ['class' => 'form-label']) }}
        {{ Form::text('experience', $doctor->experience, ['class' => 'form-control', 'placeholder' => __('messages.doctor.experience'),'step'=>'any']) }}
    </div>
    <div class="col-md-6 mb-5">
        <label class="form-label required">
            {{__('messages.doctor.select_gender')}}
            :
        </label>
        <span class="is-valid">
                <div class="mt-2">
                    <input class="form-check-input" type="radio" name="gender" value="1" {{ !empty($user->gender) && $user->gender === 1 ? 'checked' : '' }}>
                    <label class="form-label mr-3">{{__('messages.doctor.male')}}</label>
                    <input class="form-check-input ms-2" type="radio" name="gender" value="2" {{ !empty($user->gender) && $user->gender === 2 ? 'checked' : ''}}>
                    <label class="form-label mr-3">{{__('messages.doctor.female')}}</label>
                </div>
            </span>
    </div>
    <div class="col-md-7">
    <div class="mb-5">
    <div class="row">

<?php $days = json_decode($doctor->days);

$dayArray = array();
foreach($days as $day)
{
    $dayArray[$day->day_of_week] = array(
        'day_of_week' => $day->day_of_week,
        'start_time' => $day->start_time,
        'end_time' => $day->end_time
    );
}

// echo '<pre>'; print_r();
// echo '<pre>'; print_r($dayArray[4]['start_time']);
// echo '<pre>'; print_r($dayArray[4]['end_time']);


// die;

$slots = getSchedulesTimingSlot();

?>

    <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                    <label class="form-check">
                        <input class="form-check-input feature mx-2" <?php if(isset($dayArray[1]['day_of_week']) =='1'){ echo 'checked'; } ?> type="checkbox" value="1"
                               name="days[]" />MONDAY
                    </label>
                </div>
                <div class="col-xl-8 col-lg-3 col-3 d-flex align-items-center buisness_end">
                    <div class="d-inline-block">
                        <select class="form-control" data-control="select2" name="startTime[1]" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[1]['start_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <span class="px-3">To</span>
                    <div class="d-inline-block">
                    <select class="form-control " data-control="select2" name="endTime[1]"  tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[1]['end_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>
            </div>

        <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                    <label class="form-check">
                        <input class="form-check-input feature mx-2" type="checkbox" value="2" <?php if(isset($dayArray[2]['day_of_week']) =='2'){ echo 'checked'; } ?>
                               name="days[]" />TUESDAY
                    </label>
                </div>
                <div class="col-xl-8 col-lg-3 col-3 d-flex align-items-center buisness_end">
                    <div class="d-inline-block">
                        <select class="form-control " data-control="select2" name="startTime[2]" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[2]['start_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                        </select>
                        </div>
                    <span class="px-3">To</span>
                    <div class="d-inline-block">
                    <select class="form-control " data-control="select2" name="endTime[2]"  tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[2]['end_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                    <label class="form-check">
                        <input class="form-check-input feature mx-2" type="checkbox" value="3" <?php if(isset($dayArray[3]['day_of_week']) =='3'){ echo 'checked'; } ?>
                               name="days[]" />WEDNESDAY
                    </label>
                </div>
                <div class="col-xl-8 col-lg-3 col-3 d-flex align-items-center buisness_end">
                    <div class="d-inline-block">
                        <select class="form-control " data-control="select2" name="startTime[3]" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[3]['start_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <span class="px-3">To</span>
                    <div class="d-inline-block">
                    <select class="form-control " data-control="select2" name="endTime[3]"  tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[3]['end_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                    </select>

                </div>
                </div>
            </div>
            <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                    <label class="form-check">
                        <input class="form-check-input feature mx-2" type="checkbox" value="4" <?php if(isset($dayArray[4]['day_of_week']) =='4'){ echo 'checked'; } ?>
                               name="days[]" />THURSDAY
                    </label>
                </div>
                <div class="col-xl-8 col-lg-3 col-3 d-flex align-items-center buisness_end">
                    <div class="d-inline-block">
                        <select class="form-control " data-control="select2" name="startTime[4]" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[4]['start_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <span class="px-3">To</span>
                    <div class="d-inline-block">
                    <select class="form-control " data-control="select2" name="endTime[4]"  tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[4]['end_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                    </select>

                </div>
                </div>
            </div>

            <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                    <label class="form-check">
                        <input class="form-check-input feature mx-2" type="checkbox" value="5" <?php if(isset($dayArray[5]['day_of_week']) =='5'){ echo 'checked'; } ?>
                               name="days[]" />FRIDAY
                    </label>
                </div>
                <div class="col-xl-8 col-lg-3 col-3 d-flex align-items-center buisness_end">
                    <div class="d-inline-block">
                        <select class="form-control " data-control="select2" name="startTime[5]" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[5]['start_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                        </select>

                    </div>
                    <span class="px-3">To</span>
                    <div class="d-inline-block">
                    <select class="form-control " data-control="select2" name="endTime[5]"  tabindex="-1" aria-hidden="true">

                    <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[5]['end_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                    </select>                    </div>
                </div>
            </div>
            <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                    <label class="form-check">
                        <input class="form-check-input feature mx-2" type="checkbox" value="6" <?php if(isset($dayArray[6]['day_of_week']) =='6'){ echo 'checked'; } ?>
                               name="days[]" />SATURDAY
                    </label>
                </div>
                <div class="col-xl-8 col-lg-3 col-3 d-flex align-items-center buisness_end">
                    <div class="d-inline-block">
                        <select class="form-control " data-control="select2" name="startTime[6]" tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[6]['start_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                        </select>
                     </div>
                    <span class="px-3">To</span>
                    <div class="d-inline-block">
                    <select class="form-control " data-control="select2" name="endTime[6]"  tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[6]['end_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>
            </div>

            <div class="col-xxl-6 mb-7 d-sm-flex align-items-center mb-3">
                <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                    <label class="form-check">
                        <input class="form-check-input feature mx-2" type="checkbox" value="7" <?php if(isset($dayArray[7]['day_of_week']) =='7'){ echo 'checked'; } ?>
                               name="days[]" />SUNDAY
                    </label>
                </div>
                <div class="col-xl-8 col-lg-3 col-3 d-flex align-items-center buisness_end">
                    <div class="d-inline-block">
                        <select class="form-control" data-control="select2" name="startTime[7]"  tabindex="-1" aria-hidden="true">
                        <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[7]['start_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <span class="px-3">To</span>
                    <div class="d-inline-block">
                    <select class="form-control " data-control="select2" name="endTime[7]"  tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="select2-data-6-zpds">Select Time</option>
                        <?php foreach($slots as $slot){   ?>
                        <option value="<?php echo $slot; ?>" <?php if($slot == isset($dayArray[7]['end_time'])) { echo 'selected'; } ?>><?php echo $slot; ?></option>
                        <?php } ?>
                    </select>

                </div>
                </div>
            </div>

    </div>
    </div>
</div>

<?php

//  echo '<pre>'; print_R($user->media);

?>
    <div class="col-md-6 mb-5">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label">{{__('messages.doctor.profile')}}:</label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage" style="background-image: url({{ !empty($user->profile_image) ? $user->profile_image : asset('web/media/avatars/male.png') }})">
                    </div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top" data-bs-original-title="{{__('messages.user.edit_profile')}}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" id="profilePicture" name="profile" class="image-upload d-none profile-validation" accept="image/*" />
                        </label>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 mb-5">
    <div class="item-upload">

<input id="photo-upload" type="file" accept="image/*"  name="gallery_image[]" multiple/>
<div id="photo-upload__preview" class="upload-preview" ></div>
</div>

    </div>
<div class="col-md-6 mb-5">
    <label class="form-label">{{__('messages.doctor.status')}}:</label>
    <div class="col-lg-8">
        <div class="form-check form-check-solid form-switch">
            <input name="status" class="form-check-input checkBoxClass"
                   type="checkbox" {{$user->status == 1 ? 'checked' : ''}}>
            <label class="form-check-label" for="allowmarketing"></label>
        </div>
    </div>
</div>
<div class="row gx-10 mb-5">
    <div class="col-md-6 mb-5">
        {{ Form::label('Address 1', __('messages.doctor.address1').':', ['class' => 'form-label']) }}
        {{ Form::text('address1', isset($user->address->address1) ? $user->address->address1 : '', ['class' => 'form-control', 'placeholder' =>  __('messages.doctor.address1')]) }}
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('Address 2', __('messages.doctor.address2').':', ['class' => 'form-label']) }}
        {{ Form::text('address2', isset($user->address->address2) ? $user->address->address2 : '', ['class' => 'form-control', 'placeholder' =>  __('messages.doctor.address2')]) }}
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('Country',__('messages.doctor.country').':' ,['class' => 'form-label']) }}
        {{ Form::select('country_id', $countries, isset($user->address->country_id) ? $user->address->country_id:null,
['class' => 'io-select2 form-select', 'data-control'=>"select2", 'id'=>'editDoctorCountryId','placeholder' => __('messages.common.select_country')]) }}
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('State',__('messages.doctor.state').':' ,['class' => 'form-label']) }}
        {{ Form::select('state_id', (isset($state) && $state!=null) ? $state:[], isset($user->address->state_id) ? $user->address->state_id:null, ['class' => 'io-select2 form-select', 'data-control'=>"select2", 'id'=> 'editDoctorStateId','placeholder' => __('messages.common.select_state')]) }}
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('City',__('messages.doctor.city').':' ,['class' => 'form-label']) }}
        {{ Form::select('city_id', (isset($cities) && $cities!=null) ? $cities:[], isset($user->address->city_id) ? $user->address->city_id:null, ['class' => 'io-select2 form-select', 'data-control'=>"select2", 'id'=> 'editDoctorCityId','placeholder' => __('messages.common.select_city')]) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('Postal Code', __('messages.doctor.postal_code').':', ['class' => 'form-label']) }}
        {{ Form::text('postal_code', isset($user->address->postal_code) ? $user->address->postal_code : '', ['class' => 'form-control', 'placeholder' => __('messages.doctor.postal_code')]) }}
    </div>
</div>


<div class="d-flex">
    <button type="submit" class="btn btn-primary">{{__('messages.common.save')}}</button>&nbsp;&nbsp;&nbsp;

</div>

<style>
.item-photo__preview {
  width: 100px;
  height: 100px;
}
.item-images > div
{
    float: left;
    margin-right: 30px;
    margin-bottom: 15px;
    margin-top: 15px;
}
.delete
{
    position: absolute;
    background: transparent;
    border: 1px solid;
    border-radius: 100%
}
</style>
<script type="text/javascript">

let quill2 = new Quill('#doctorDescriptionId', {
    modules: {
        toolbar: [
            [
                {
                    header: [1, 2, false],
                }],
            ['bold', 'italic', 'underline'],
            ['image', 'code-block'],
        ],
    },
    placeholder: 'Description',
    theme: 'snow', // or 'bubble'
})
quill2.on('text-change', function (delta, oldDelta, source) {
    if (quill2.getText().trim().length === 0) {
        quill2.setContents([{ insert: '' }])
    }
})


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
let item_images = [];
document.getElementById('photo-upload').addEventListener('change', (e) => {
  let selectedFiles = e.target.files;
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

$(document).ready(function(){

$("#doctorDescriptionId").keyup(function(){
    let element = document.createElement('textarea')
    let editor_content_1 = quill2.root.innerHTML
    element.innerHTML = editor_content_1

    // if (quill1.getText().trim().length === 0) {
    //     displayErrorMessage('The Terms & Conditions is required.')
    //     return false
    // }

    $('#descriptionData').val(editor_content_1);
});
});

</script>
