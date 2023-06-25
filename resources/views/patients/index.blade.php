@extends('layouts.app')
@section('title')
    {{ __('messages.patients') }}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column text-dark">
            <livewire:patient-table/>
        </div>
    </div>
@endsection
