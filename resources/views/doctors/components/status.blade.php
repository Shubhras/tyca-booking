<div class="form-check form-switch form-check-custom form-check-solid justify-content-center">
    <input class="form-check-input h-20px w-30px doctor-status" data-id="{{$row->user->id}}" type="checkbox"
           id="flexSwitch20x30"
            {{ $row->user->status == 1 ? 'checked' : ''}}
    data-status="{{$row->user->status}}"

    >
    <span id="doctor-statusbar-text-{{$row->user->id}}">{{$row->user->status == 1 ?'Active':'Inactive'}}</span>
</div>
