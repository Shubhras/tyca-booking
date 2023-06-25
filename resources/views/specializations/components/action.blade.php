<div class="d-flex justify-content-center">
    <a
        href="{{ route('specializations.edit', $row->id) }}"
       title="{{ __('messages.common.edit') }}"
       class="btn px-1 text-dark fs-3" data-bs-toggle="tooltip"
       data-bs-original-title="{{ __('messages.common.edit') }}" data-id="{{$row->id}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.common.delete') }}"  data-bs-toggle="tooltip"
       data-bs-original-title="{{ __('messages.common.delete') }}"
       class="btn px-1 text-dark fs-3 specialization-delete-btn">
        <i class="fa-solid fa-trash"></i>
    </a>
</div>
