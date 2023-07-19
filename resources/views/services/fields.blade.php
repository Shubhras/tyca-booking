<div class="row">
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('name', __('messages.common.name').':', ['class' => 'form-label required']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.common.name') ,
            'required']) }}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-5">
            {{ Form::label('description', __('messages.doctor.description').':', ['class' => 'form-label required']) }}
            <div id="doctorDescriptionId" class="editor-height" style="height: 150px">

            @if(isset($service->short_description))
                {!! $service->short_description !!}
            @endif
            </div>
            {{ Form::hidden('short_description', null, ['id' => 'short_description']) }}
        </div>
    </div>

    <input type="hidden" name="status" value="<?php if(isset($service->status)){ echo $service->status; };  ?>">
    <div class="col-lg-6 mb-5">
        {{ Form::label('specializations', __('messages.specializations').':', ['class' => 'form-label required']) }}
        {{ Form::select('specializations[]',$data['specializations'],(isset($selectedSpecializations)) ?
        $selectedSpecializations : null,['class' =>
        'form-control io-select2', 'data-placeholder' => __('messages.common.select_specializations'),
        'data-control'=>'select2','multiple']) }}
    </div>
    <div class="col-lg-6 mb-5">
        {{ Form::label('doctors', __('messages.doctors').':', ['class' => 'form-label required']) }}
        {{ Form::select('doctors[]',$data['doctors'],(isset($selectedDoctor)) ? $selectedDoctor : null,['class' =>
        'form-control io-select2', 'data-placeholder' => __('messages.doctor.select_doctors'),
        'data-control'=>'select2','multiple']) }}
    </div>
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header p-0"><h4 class="required">Pricing</h4></div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="col-6 mb-5">
                            {{ Form::label('charges',
                            __('messages.common.base_rate').'('.__('messages.common.hourly').')', ['class' =>
                            'form-label required']) }}
                            <div class="input-group">
                                {{ Form::text('charges', null, ['class' => 'form-control price-input', 'placeholder' =>
                                __('messages.service.amount'),'step'=>'any','onkeyup' => 'if (/\D/g.test(this.value))
                                this.value =
                                this.value.replace(/\D/g,"")']) }}
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-0 text-dark">{{__('messages.common.per_hour')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-6 mb-5">
                            {{ Form::label('charges_daily',
                            __('messages.common.base_rate').'('.__('messages.common.daily').')', ['class' => 'form-label
                            required']) }}
                            <div class="input-group">
                                {{ Form::text('charges_daily', null, ['class' => 'form-control charges_daily',
                                'placeholder' =>
                                __('messages.service.amount'),'step'=>'any','onkeyup' => 'if (/\D/g.test(this.value))
                                this.value =
                                this.value.replace(/\D/g,"")']) }}
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-0 text-dark">per day</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mb-7 mt-5">
        <div class="row">
            <div class="col-6 text-dark">
                <label class="form-label">{{__('messages.common.discount_rate')}}
                    ({{__('messages.common.hourly')}})</label>

                <div class="row hourly_records mb-5">
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-0 text-dark">
                                    {{__('messages.common.above')}}
                                </span>
                            </div>
                            <input
                                type="text"
                                class="form-control "
                                placeholder="{{__('messages.common.no_of')}}"
                                name="above_count_hourly[]"
                                onkeyup='if (/\D/g.test(this.value))this.value = this.value.replace(/\D/g,"")'
                            />
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-0 text-dark hourAdd">
                                    hours
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="vr bg-black opacity-100 p-1px"></div>
                    <div class="col-4">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="{{__('messages.common.discount_percent')}}"
                                name="rate_hourly[]"
                            />
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-0 text-dark">
                                    {{__('messages.common.per_hour')}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 action-btn">
                        <button type="button" class="btn btn-sm btn-dark extra-fields-hourly" id="addHourlyCharge">
                            <span class=" fa fa-plus"></span>
                        </button>
                    </div>
                    <div class="diss" style="margin-top: 10px;">Discounted Rate(pre Hour) : </div>

                </div>
                <div class="hourly_records_dynamic">
                    @if(isset($hourlyDiscounts) && !empty($hourlyDiscounts))
                    @foreach($hourlyDiscounts as $discounts)
                    <div class="remove row mb-5">
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0 text-dark">
                                        Above
                                    </span>
                                </div>
                                <input
                                    value="{{$discounts['above_count']}}"
                                    type="text" class="form-control "
                                    placeholder="No. of" name="above_count_hourly[]"
                                       onkeyup="if (/\D/g.test(this.value))this.value = this.value.replace(/\D/g,&quot;&quot;)" class="hourAdd">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-0 text-dark">
                                        hours
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="vr bg-black opacity-100 p-1px"></div>
                        <div class="col-4">
                            <div class="input-group">
                                <input
                                    value="{{$discounts['rate']}}"
                                    type="text"
                                    class="form-control"
                                    placeholder="Discount %"
                                    name="rate_hourly[]"
                                    class="hourAdd"
                                >
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-0 text-dark">
                                    per hour
                                </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-1 action-btn">
                            <button type="button" class="btn btn-sm btn-danger remove-hourly-field">
                                <span class=" fa fa-minus"></span>
                        </div>
                        <div class="">Discounted Rate(pre Hour) : </div>

                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
            <div class="col-6 text-dark">
                <label class="form-label">{{__('messages.common.discount_rate')}}
                    ({{__('messages.common.daily')}})</label>

                <div class="row daily_records mb-5">
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                    <span class="input-group-text bg-white border-0 text-dark">
                        {{__('messages.common.above')}}
                    </span>
                            </div>
                            <input
                                type="text"
                                class="form-control "
                                placeholder="{{__('messages.common.no_of')}}"
                                name="above_count_daily[]"
                                onkeyup='if (/\D/g.test(this.value))this.value = this.value.replace(/\D/g,"")'
                            />
                            <div class="input-group-append">
                    <span class="input-group-text bg-white border-0 text-dark">
                    days
                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="vr bg-black opacity-100 p-1px"></div>
                    <div class="col-4">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="{{__('messages.common.discount_percent')}}"
                                name="rate_daily[]"
                            />
                            <div class="input-group-append">
                    <span class="input-group-text bg-white border-0 text-dark">
                       per day
                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 action-btn">
                        <button type="button" class="btn btn-sm btn-dark extra-fields-daily" id="addDailyCharge">
                            <span class=" fa fa-plus"></span>
                        </button>
                    </div>
                </div>
                <div class="daily_records_dynamic">
                    @if(isset($dailyDiscounts) && !empty($dailyDiscounts))
                    @foreach($dailyDiscounts as $discounts)

                    <div class="d_remove row mb-5">
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0 text-dark">
                                    Above
                                    </span>
                                </div>
                                <input
                                    type="text"
                                    class="form-control "
                                    placeholder="No. of"
                                    name="above_count_daily[]"
                                    onkeyup="if (/\D/g.test(this.value))this.value = this.value.replace(/\D/g,&quot;&quot;)"
                                    value="{{$discounts['above_count']}}"
                                />

                                <div class="input-group-append">
                                    <span class="input-group-text bg-white border-0 text-dark">
                                    hours
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="vr bg-black opacity-100 p-1px"></div>
                            <div class="col-4">
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Discount %"
                                        name="rate_daily[]"
                                        value="{{$discounts['rate']}}"
                                        onkeyup="if (/\D/g.test(this.value))this.value = this.value.replace(/\D/g,&quot;&quot;)"
                                    >
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-white border-0 text-dark">
                                        per hour
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 action-btn">
                                <button type="button" class="btn btn-sm btn-danger remove-field">
                                    <span class=" fa fa-minus"></span>
                                </button>
                            </div>
                        </div>


                        @endforeach
                        @endif

                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-7">
            <div class="mb-3" io-image-input="true">
                <label for="exampleInputImage"
                       class="form-label required">{{__('messages.front_service.icon')}}:</label>
                <div class="d-block">
                    <div class="image-picker">
                        <div class="image previewImage" id="exampleInputImage"
                             style="background-image: url({{ !empty($service->icon) ? $service->icon : asset('web/media/avatars/male.png') }})">
                        </div>
                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                              data-placement="top" data-bs-original-title="{{ __('messages.common.change_image') }}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" id="profile_image" name="icon"
                                   class="image-upload d-none icon-validation" accept="image/*"/>
                        </label>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-7">
            <div class="mb-3" io-image-input="true">
                <label for="exampleInputImage"
                       class="form-label required">{{__('messages.front_service.photos')}}:</label>

                       <div class="item-upload">

                <input  type="file" accept="image/*" id="gallery" name="gallery[]" multiple/>
                <div id="photo-upload__preview" class="upload-preview" >

                <?php if(isset($service)) { ?>
                <div class="item-images">
                    <?php foreach($service->gallery as $image) { ?>
                    <div>
                    <img src="<?php echo $image; ?>" class="item-photo__preview">
                    <?php
                    $filename = explode("/", $image);
                        ?>
                    <button type="button" class="delete" data-filename="<?php echo $filename[5]; ?>" data-id="<?php echo $filename[4]; ?>"><span>×</span>
                </button></div>
                <?php } ?>

                </div>

                <?php } ?>

                </div>
                </div>
            </div>
        </div>



    </div>
    <div class="col-lg-12 mb-7">
            {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
            <a href="{{route('services.index')}}" type="reset"
               class="btn btn-secondary">{{__('messages.common.discard')}}</a>
        </div>
</div>

<script>
    var quill = new Quill('#doctorDescriptionId', {
      theme: 'snow'
    });

    $(document).ready(function(){

$(window).click(function(e) {
let element = document.createElement('textarea')
let editor_content_1 = quill.root.innerHTML
element.innerHTML = editor_content_1

$('#short_description').val($(".ql-editor").html());
});
});


  </script>
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
        listenClick('#addHourlyCharge', function (event) {
            //console.log(event, $('.hourly_records').clone())
            $('.hourly_records').clone().appendTo('.hourly_records_dynamic');
            $('.hourly_records_dynamic .hourly_records').addClass('single remove');
            $('.single > .action-btn > .extra-fields-hourly').remove();
            $('.single > .action-btn > .diss').remove();
            $('.single > .action-btn').append('<button type="button" class="btn btn-sm btn-danger remove-hourly-field" ><span class=" fa fa-minus"></span></button>');
            $('.hourly_records_dynamic > .single').attr("class", "remove row mb-5");
        });

        listenClick('#addDailyCharge', function (event) {
            //console.log(event, $('.hourly_records').clone())
            $('.daily_records').clone().appendTo('.daily_records_dynamic');
            $('.daily_records_dynamic .daily_records').addClass('d_single d_remove');
            $('.d_single > .action-btn > .extra-fields-daily').remove();
            $('.d_single > .action-btn').append('<button type="button" class="btn btn-sm btn-danger remove-field" ><span class=" fa fa-minus"></span></button>');
            $('.daily_records_dynamic > .d_single').attr("class", "d_remove row mb-5");
        });


        listenClick('.remove-field', function (event) {
            $(event.target).parents('div').parent('.d_remove').remove()
            event.preventDefault();
        });
        listenClick('.remove-hourly-field', function (event) {
            $(event.target).parents('div').parent('.remove').remove()
            event.preventDefault();
        });

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
document.getElementById('gallery').addEventListener('change', (e) => {
  var selectedFiles = e.target.files;

  const photoPreviewContainer = document.querySelector('#photo-upload__preview');
  const elemContainer = previewImage(e, selectedFiles, item_images);
  photoPreviewContainer.appendChild(elemContainer);
});

document.getElementById('photo-upload__preview').addEventListener('click', (e) => {
  const tgt = e.target.closest('button');
  if (tgt.classList.contains('delete')) {

       let fileId = tgt.dataset.id;
    $.ajax({
        url: route('delete-media', fileId),
        type: 'POST',
        data: {
            fileId: fileId,
        },
        success: function (result) {

        },
    });
    tgt.closest('div').remove();
    const fileName = tgt.dataset.filename
    item_images = item_images.filter(img => img.name != fileName)
  }
})





    </script>
