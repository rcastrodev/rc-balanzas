@extends('paginas.partials.app')
@section('content')
<div class="jumbotron bg-light align-items-end d-sm-none d-xl-flex">
	<div class="container mx-auto">
		<div class="text-blue align-items-center justify-content-between d-flex mb-4">
			<h1 class="font-size-45">Novedades</h1>
			<span class="font-size-24">Enterate de nuestras últimas noticias.</span>
		</div>
	</div>
</div>
<div class="py-5 container">
    <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="todas-tab" data-bs-toggle="tab" data-bs-target="#todas" type="button" role="tab" aria-controls="todas" aria-selected="true">todas</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="empresa-tab" data-bs-toggle="tab" data-bs-target="#empresa" type="button" role="tab" aria-controls="empresa" aria-selected="false">empresa</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="equipos-tab" data-bs-toggle="tab" data-bs-target="#equipos" type="button" role="tab" aria-controls="equipos" aria-selected="false">equipos</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="todas" role="tabpanel" aria-labelledby="todas-tab">
			<div class="row mb-5">
				@foreach ($news as $n)
					<div class="col-sm-12 col-lg-4 mb-4">
						@includeIf('paginas.partials.novedad', ['e' => $n])
					</div>			
				@endforeach
			</div>
        </div>
        <div class="tab-pane fade" id="empresa" role="tabpanel" aria-labelledby="empresa-tab">
			<div class="row mb-5">
				@foreach ($news->where('content_4', 'Empresa') as $e)
					<div class="col-sm-12 col-lg-4 mb-4">
						@includeIf('paginas.partials.novedad', ['e' => $e])
					</div>			
				@endforeach
			</div>
        </div>
        <div class="tab-pane fade" id="equipos" role="tabpanel" aria-labelledby="equipos-tab">
			<div class="row mb-5">
				@foreach ($news->where('content_4', 'Equipos') as $ee)
					<div class="col-sm-12 col-lg-4 mb-4">
						@includeIf('paginas.partials.novedad', ['e' => $ee])
					</div>			
				@endforeach
			</div>
        </div>
    </div>
</div>
@endsection
@push('head')
    <style>
        .nav-tabs .nav-link{
            background: #F5F5F5 !important;
            color: #454545 !important;
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
            color: white !important;
            background-color: #22A7DF !important;
        }
        .nav-tabs{
            border-bottom: none !important;
        }
        .nav-tabs .nav-link {
            border-top-left-radius: 0 !important; 
            border-top-right-radius: 0 !important;
        }
    </style>
@endpush
@push('scripts')	
@endpush
       
