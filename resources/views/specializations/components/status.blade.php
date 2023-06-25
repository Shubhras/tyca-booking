<div class="form-check form-switch form-check-custom form-check-solid float-end">
    <input class="form-check-input h-20px w-30px specialization-statusbar" data-id="{{$row->id}}" type="checkbox"
           id="flexSwitch20x30" value=""
            {{$row->status == 1 ?'checked':''}}
    data-status="{{$row->status}}"
    />
    <span id="specialization-statusbar-text-{{$row->id}}">{{$row->status == 1 ?'Active':'Inactive'}}</span>
</div>

