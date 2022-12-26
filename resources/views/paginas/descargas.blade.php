@extends('paginas.partials.app')
@section('content')
<div class="jumbotron bg-light align-items-end d-sm-none d-xl-flex">
	<div class="container mx-auto">
		<div class="text-blue align-items-center justify-content-between d-flex mb-4">
			<h1 class="font-size-45">Descargas</h1>
			<span class="font-size-24">Accedé a nuestros manuales</span>
		</div>
	</div>
</div>
@isset($elements)
    <div class="py-5 container">
        <div class="row mb-5">
            @if (count($elements))
                @foreach ($elements as $e)
                    <div class="col-sm-12 col-md-4 mb-4">
                        @includeIf('paginas.partials.descargas', ['e' => $e])
                    </div>			
                @endforeach
            @else
                <div class="col-sm-12">
                    <h2 class="text-center">No hay archivos de descargas</h2>
                </div>
            @endif
        </div>
    </div>   
@endisset
@endsection
@push('head')
@endpush
@push('scripts')	
@endpush
       
