<div class="col-12 text-dark">
    <label class="form-label required">{{__('messages.common.discount_rate')}} ({{$dataType}})</label>
    @if($inputs !== null)
        @foreach($inputs as $key => $input)
        <div class="row">
            <div class="col-2">
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
                        name="above_count"
                    />
                    <div class="input-group-append">
                    <span class="input-group-text bg-white border-0 text-dark">
                        {{__('messages.common.hours')}}
                    </span>
                    </div>
                </div>
            </div>
            <div class="vr bg-black opacity-100 p-1px"></div>
            <div class="col-2">
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="{{__('messages.common.no_of')}}"
                        name="rate"
                    />
                    <div class="input-group-append">
                    <span class="input-group-text bg-white border-0 text-dark">
                        {{__('messages.common.per_hour')}}
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-sm btn-dark">
                    <span class=" fa fa-plus"></span>
                </button>
            </div>
        </div>
        @endforeach
    @endif
</div>
