<div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
    <label class="pb-2 fs-4 text-gray-600">{{ __('messages.patient.registered_on')  }}</label>
    <span class="fs-4 text-gray-800">{{$patient->user->created_at->diffForHumans()}}</span>
</div>
<div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
    <label class="pb-2 fs-4 text-gray-600">{{ __('messages.patient.last_updated')  }}</label>
    <span class="fs-4 text-gray-800">{{$patient->user->updated_at->diffForHumans()}}</span>
</div>
