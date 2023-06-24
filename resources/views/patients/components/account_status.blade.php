<div class="form-check form-switch form-check-custom form-check-solid float-end">
    <input class="form-check-input h-20px w-30px patient-statusbar" data-id="{{$row->user->id}}" type="checkbox"
           id="flexSwitch20x30" value=""
           {{$row->user->status == 1 ?'checked':''}} />
</div>

