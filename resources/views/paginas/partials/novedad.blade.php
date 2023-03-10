<a href="{{ route('novedad', ['id'=>$e->id]) }}" class="card card-new d-block text-decoration-none" style="width: 100%; display: inline-block; border:1px solid #D8D8D8;" tabindex="0">
    <div class="position-relative border">
        @if (Storage::disk('public')->exists($e->image))
            <img src="{{$e->image}}" class="card-img-top img-fluid" style="max-height: 312px; min-height: 312px;    object-fit: cover;">
        @else
            <img src="images/default.jpg" class="card-img-top img-fluid" style="max-height: 312px;     object-fit: cover;">
        @endif
    </div>
    <div class="card-body bg-white position-relative" style="min-height: 250px; max-height: 250px;">
        <strong class="text-blue font-size-16 d-inline-block mb-2 text-uppercase">{{ $e->content_4 }}</strong>
        <strong class="card-title font-size-24 text-dark d-block">{{ $e->content_1 }}</strong>
        <p class="fw-light font-size-18 text-dark">{{ $e->content_2 }}</p>
        <div class="position-absolute d-flex justify-content-between text-dark" style="left: 15px; right: 15px; bottom: 20px;">
            <span>{{ date_format($e->created_at, 'd/m/Y') }}</span>
            <i class="fal fa-arrow-right"></i>
        </div>
    </div>
</a>
