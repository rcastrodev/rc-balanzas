<div class="card card-new text-decoration-none" style="width: 100%; border:1px solid #D8D8D8;" tabindex="0">
    <div class="py-5">
        @if (Storage::disk('public')->exists($e->image))
            <img src="{{$e->image}}" class="img-fluid d-block mx-auto">
        @else
            <img src="images/default.jpg" class="img-fluid d-block mx-auto">
        @endif
    </div>
    <div class="card-body bg-white position-relative" style="border-top: 1px solid #E5E5E5;">
        <span class="card-title font-size-25 text-dark d-block fw-light">{{ $e->content_1 }}</span>
        @if (Storage::disk('public')->exists($e->content_2))
            <a href="{{ route('descargar-archivo', ['id'=> $e->id, 'reg' => 'content_2']) }}" class="w-100 bg-blue text-white d-block py-2 text-decoration-none text-center">Descargar</a>
        @endif
    </div>
</div>