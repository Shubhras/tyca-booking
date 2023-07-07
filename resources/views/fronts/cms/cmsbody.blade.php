@extends('layouts.app')
@section('title')
    {{ __('messages.cms.cms') }}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>

            <div class="card">
                <div class="card-body p-12">
                    {{ Form::open(['route' => 'cmsbody.update', 'id' => 'addCMSForm','files' => true]) }}
                        @include('fronts.cms.cmsbodyfields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

