<div class="row container mx-auto mb-5">
    <div class="col-sm-12 col-xl-5 p-0 d-sm-none d-xl-block">
        @if (Storage::disk('public')->exists($e->image))
            <img src="{{ asset($e->image) }}" class="img-fluid w-100">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100">
        @endif
    </div>
    <div class="col-sm-12 col-xl-7 bg-light d-flex p-0 d-flex align-items-center justify-content-center py-sm-3 py-xl-0">
        <div class="" style="max-width: 80%">
            <h3 class="text-blue font-size-32 mb-4">{{ $e->content_1 }}</h3>
            <div class="fw-light font-size-18">{!! $e->content_2 !!}</div>
        </div>
    </div>
</div>
