@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb py-2 font-size-14 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="color-azul-oscuro text-decoration-none text-dark">inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('novedades') }}" class="color-azul-oscuro text-decoration-none text-dark">Novedades</a>
                </li>
                <li class="breadcrumb-item active text-blue" aria-current="page">{{ $new->content_1 }}</li>
            </ol>
        </div>
    </div>
</div>
<div class="jumbotron align-items-end d-flex">
	<div class="container mx-auto" style="border-bottom: 1px solid #E5E5E5;">
		<div class="mb-4">
			<h1 class="font-size-24 text-blue fw-light text-uppercase">{{ $new->content_4 }}</h1>
			<span class="font-size-32 fw-bold">{{ $new->content_1 }}</span>
		</div>
	</div>
</div>
<div class="row container mx-auto my-5">
    <div class="col-sm-12 col-md-6">
        <img src="{{ asset($new->image) }}" class="img-fluid w-100">
    </div>
    <div class="col-sm-12 col-md-6 post">{!! $new->content_3 !!}</div>
</div>
@endsection
@push('head')
@endpush
@push('scripts')	
@endpush
       
