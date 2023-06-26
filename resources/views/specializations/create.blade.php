@extends('layouts.app')
@section('title')
{{__('messages.specialization.add_specialization')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-end mb-5">
        <h1>@yield('title')</h1>
        <a class="btn btn-outline-dark float-end"
           href="{{ route('specializations.index') }}">{{ __('messages.common.back') }}</a>
    </div>

    <div class="col-12">
        @include('layouts.errors')
    </div>
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'specializations.store', 'files' => true]) }}
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        {{ Form::label('name', __('messages.common.name').':', ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.common.name')  , 'required']) }}
                    </div>
                </div>
                <div class="col-lg-12 mb-7">
                    <div class="mb-3" io-image-input="true">
                        <label for="exampleInputImage" class="form-label required">{{__('messages.front_service.icon')}}:</label>
                        <div class="d-block">
                            <div class="image-picker">
                                <div class="image previewImage" id="exampleInputImage" style="background-image: url({{ !empty($service->icon) ? $service->icon : asset('web/media/avatars/male.png') }})">
                                </div>
                                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                      data-placement="top" data-bs-original-title="{{ __('messages.common.change_image') }}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" id="profile_image" name="icon" class="image-upload d-none icon-validation" accept="image/*" />
                        </label>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
                    <a href="{{route('specializations.index')}}" type="reset"
                       class="btn btn-secondary">{{__('messages.common.discard')}}</a>
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
