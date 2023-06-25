<?php
$data = DB::table('patients')
    ->where('id', $row->user_id)
    ->first();

    $userData = DB::table('users')
    ->where('id', $data->user_id)
    ->first();
 ?>
<div class="d-flex align-items-center">
    <div class="d-flex flex-column">
        <a href="{{route('patients.show', $row->user->id)}}" class="mb-1 text-decoration-none fs-6">
            {{$userData->first_name.' '.$userData->last_name}}
        </a>
        <span class="fs-6">{{$userData->email}}</span>
    </div>
</div>

