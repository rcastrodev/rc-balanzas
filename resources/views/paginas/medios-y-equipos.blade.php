@extends('paginas.partials.app')
@section('content')
<div class="jumbotron bg-light align-items-end d-sm-none d-xl-flex">
	<div class="container mx-auto">
		<div class="text-blue align-items-center justify-content-between d-flex mb-4">
			<h1 class="font-size-45">Medios y Equipos</h1>
			<span class="font-size-24">Conocé sobre lo que hacemos.</span>
		</div>
	</div>
</div>
@isset($mediaAndEquipments)
	@if (count($mediaAndEquipments))
        <div class="container py-5">
            @foreach ($mediaAndEquipments as $m)
                @includeIf('paginas.partials.medio-equipo', ['e' => $m])
            @endforeach
        </div>
	@endif
@endisset
@endsection
@push('head')
@endpush
@push('scripts')	
@endpush
       
