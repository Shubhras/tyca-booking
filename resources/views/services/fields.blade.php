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
            {{ Form::label('short_description', __('messages.service.description').':', ['class' => 'form-label
            required']) }}
            {{ Form::textarea('short_description', null, ['class' => 'form-control', 'placeholder' =>
            __('messages.service.description'), 'rows'=> 5,'maxlength'=> 60]) }}
        </div>
    </div>
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
                                    <span class="input-group-text bg-white border-0 text-dark">{{__('messages.common.per_daily')}}</span>
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
                <label class="form-label required">{{__('messages.common.discount_rate')}}
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
                    <span class="input-group-text bg-white border-0 text-dark">
                        {{__('messages.common.hours')}}
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
                </div>
                <div class="hourly_records_dynamic"></div>
            </div>
            <div class="col-6 text-dark">
                <label class="form-label required">{{__('messages.common.discount_rate')}}
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
                        {{__('messages.common.hours')}}
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
                        {{__('messages.common.per_hour')}}
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
                <div class="daily_records_dynamic"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mb-7">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label required">{{__('messages.front_service.icon')}}:</label>
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
            <label for="exampleInputImage" class="form-label required">{{__('messages.front_service.photos')}}:</label>
            <div class="d-block">
                <div class="image-picker">
                    @if(isset($service))
                    @foreach ($service->gallery as $image)
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ !empty($image) ? $image : asset('web/media/avatars/male.png') }})">
                    </div>
                    @endforeach
                    @else
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{  asset('web/media/avatars/male.png') }})">
                    </div>
                    @endif
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top" data-bs-original-title="{{ __('messages.common.change_image') }}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" id="gallery" name="gallery[]"
                                   class="image-upload d-none icon-validation" accept="image/*" multiple/>
                        </label>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div>
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
        <a href="{{route('services.index')}}" type="reset"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>
<script type="text/javascript">
    listenClick('#addHourlyCharge', function (event) {
        //console.log(event, $('.hourly_records').clone())
        $('.hourly_records').clone().appendTo('.hourly_records_dynamic');
        $('.hourly_records_dynamic .hourly_records').addClass('single remove');
        $('.single > .action-btn > .extra-fields-hourly').remove();
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
</script>
