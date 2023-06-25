@extends('layouts.app')
@section('title')
{{__('messages.specialization.edit_specialization')}}
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
            {{ Form::model($specialization, ['route' => ['specializations.update', $specialization->id], 'method' => 'PUT', 'files' => true]) }}
            @include('specializations.fields')
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
