@extends('paginas.partials.app')
@section('content')
@if(count($sliders))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($sliders as $k => $item)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner" style="box-shadow: -1px -1px 14px #00000014;">
			@foreach ($sliders as $key => $slider)
				<div class="carousel-item @if(!$key) active @endif" style="background-image: linear-gradient( rgb(0 0 0 / 26%), rgba(0, 0, 0, 0.1)), url({{$slider->image}}); background-repeat: no-repeat; background-size: cover; background-position: center;">
					
					<div class="container mx-auto contentHero">
						<div class="mt-sm-2 text-start" style="max-width: 800px !important;">
							<h1 class="font-size-50 text-white hero-content-slider mb-4">{{ $slider->content_1 }}</h1>
							<p class="text-white hero-content-slider font-size-18">{{ $slider->content_2 }}</p>
						</div>
					</div>
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@isset($mediaAndEquipments)
	@if (count($mediaAndEquipments))
		<div class="row container mx-auto my-5">
			<div class="col-sm 12-col-md-6">
				<h3 class="text-blue font-size-32">Medios y Equipos</h3>
			</div>
			<div class="col-sm-12 col-md-6 text-end d-sm-none d-xl-block">
				<a href="{{ route('medios-y-equipos') }}" class="text-blue text-decoration-none py-2 px-4 font-size-20" style="border: 1px solid #22A7DF;">Ver más</a>
			</div>
		</div>
		@foreach ($mediaAndEquipments as $m)
			@includeIf('paginas.partials.medio-equipo', ['e' => $m])
		@endforeach
	@endif
@endisset
@isset($section2)
	<section id="section2">
		<div class="row">
			<div class="col-sm-12 col-xl-6 px-0">
				@if (Storage::disk('public')->exists($section2->image))
					<img src="{{Storage::disk('public')->url($section2->image)}}" class="img-fluid w-100">
				@endif
			</div>
			<div class="col-sm-12 col-xl-6 text-white bg-blue d-flex align-items-center justify-content-center px-0 py-2">
				<div style="max-width: 70%">
					<h3 class="font-size-32 fw-bold mt-md-4 mt-sm-0 mb-3">{{ $section2->content_1 }}</h3>
					<div class="font-size-18 fw-light">{!! $section2->content_2 !!}</div>
					@if ($section2->content_3)
						@if(Storage::disk('public')->exists($section2->content_3))
							<a href="{{ route('descargar-archivo', ['id'=> $section2->id, 'reg' => 'content_3']) }}" class="bg-blue text-white py-2 px-4 text-decoration-none mt-sm-2 mt-md-4 d-inline-block" style="border:1px solid white;">Descargar Certificado</a>
						@endif
					@endif
				</div>
			</div>
		</div>
	</section>
@endisset
@isset($clients)
	@if (count($clients))
		<div class="row container mx-auto my-5">
			<div class="col-sm 12-col-md-6">
				<h3 class="text-blue font-size-32">Nuestros Clientes</h3>
			</div>
			<div class="col-sm 12-col-md-6 text-end d-sm-none d-xl-block">
				<a href="{{ route('clientes') }}" class="text-blue text-decoration-none py-2 px-4 font-size-20" style="border: 1px solid #22A7DF;">Ver más</a>
			</div>
		</div>
		<div class="row container mx-auto mb-5 clientes">
			@foreach ($clients as $c)
				<div class="col-sm-12 col-md-3 mb-3 ">
					@if (Storage::disk('public')->exists($c->image))
						<a href="{{ route('clientes') }}"><img src="{{ asset($c->image) }}" class="img-fluid"></a>
					@endif
				</div>
			@endforeach
		</div>
	@endif
@endisset
@isset($news)
	@if (count($news))
		<div class="bg-light py-5">
			<div class="row container mx-auto mb-5">
				<div class="col-sm 12-col-md-6">
					<h3 class="text-blue font-size-32">Novedades</h3>
				</div>
				<div class="col-sm 12-col-md-6 text-end d-sm-none d-xl-block">
					<a href="{{ route('novedades') }}" class="text-blue text-decoration-none py-2 px-4 font-size-20" style="border: 1px solid #22A7DF;">Ver más</a>
				</div>
			</div>
			<div class="row container mx-auto mb-5">
				@foreach ($news as $n)
					<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
						@includeIf('paginas.partials.novedad', ['e' => $n])
					</div>			
				@endforeach
			</div>
		</div>
	@endif
@endisset
@endsection
@push('head')
	<style>
	    @media(min-width:768px){
            .clientes > div{
                width: 50%;
				text-align: center;
            }
        }

        @media(min-width:992px){
            .clientes > div{
                width: 33%;
				text-align: center;
            }
        }

        @media(min-width:1200px){
            .clientes > div{
                width: 25%;
				text-align: center;
            }
        }

        @media(max-width:768px){
            .clientes > div{
                width: 100%;
				text-align: center;
            }
        }	

		@media(max-width:992px){
			#sliderHero, #sliderHero .carousel-inner, #sliderHero .carousel-item{
				max-height: 400px !important;
				min-height: 400px !important;
			}
		}

		@media(max-width:768px){
			#sliderHero, #sliderHero .carousel-inner, #sliderHero .carousel-item{
				max-height: 300px !important;
				min-height: 300px !important;
			}
		}
	</style>
@endpush
