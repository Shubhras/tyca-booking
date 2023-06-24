<div class="d-flex align-items-center text-dark">
    <a href="{{route('staffs.show',$row->id)}}">
        <div class="image image-circle image-mini me-3">
            <img src="{{$row->profile_image }}" alt="user" class="user-img">
        </div>
    </a>
    <div class="d-flex flex-column">
        <a href="{{ route('staffs.show',$row->id) }}" class="mb-1 text-decoration-none fs-6 text-dark">
            {{$row->full_name}}
        </a>
        <span class="fs-6">{{$row->email}}</span>
    </div>
</div>
