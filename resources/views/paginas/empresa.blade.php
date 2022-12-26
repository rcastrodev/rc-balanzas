@extends('paginas.partials.app')
@section('content')
<div class="jumbotron bg-light align-items-end d-sm-none d-xl-flex">
	<div class="container mx-auto">
		<div class="text-blue align-items-center justify-content-between d-flex mb-4">
			<h1 class="font-size-45">Nuestra Empresa</h1>
			<span class="font-size-24">Conocé más sobre nosotros</span>
		</div>
	</div>
</div>
@isset($section1)
	<section id="section1" class="py-sm-2 pt-md-5">
		<div class="container py-sm-0 py-md-3">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<h3 class="font-size-32 mb-5">{{$section1->content_1}}</h3>
					<div class="fw-light font-size-18">{!! $section1->content_2 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6 mb-sm-4 mb-md-0">
					@if(count($images))
						<div id="sliderEmpresa" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-indicators">
								@foreach ($images as $k => $item)
									<button type="button" data-bs-target="#sliderEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
								@endforeach
							</div>
							<div class="carousel-inner" style="box-shadow: -1px -1px 14px #00000014;">
								@foreach ($images as $key => $slider)
									<div class="carousel-item @if(!$key) active @endif" style="background-image: url({{$slider->image}}); background-repeat: no-repeat; background-size: cover; background-position: center;">
										<div class="container mx-auto contentHero">
											<div class="mt-sm-2 text-start" style="max-width: 800px !important;">
												<h1 class="text-uppercase font-size-50 text-white hero-content-slider mb-4">{{ $slider->content_1 }}</h1>
												<p class="text-uppercase text-white hero-content-slider">{{ $slider->content_2 }}</p>
											</div>
										</div>
									</div>			
								@endforeach
							</div>	
						</div>	
					@endif
				</div>
			</div>
		</div>
	</section>	
@endisset
@isset($section3s)
	@if (count($section3s))
		<div class="bg-light py-5">
			<div class="container mx-auto mb-4">
				<h3 class="font-size-32">¿Por qué elegir RC BALANZAS?</h3>
			</div>
			<div class="row container mx-auto mb-5">
				@foreach ($section3s as $s3)
					<div class="col-sm-12 col-md-4 mb-sm-4 mb-md-0">
						<div class="bg-white py-5 px-3" style="min-height: 360px; border-top: 7px solid #22A7DF;">
							<h4 class="text-blue mb-3 font-size-25">{{ $s3->content_1 }}</h4>
							<div class="font-size-18">{!! $s3->content_2 !!}</div>
						</div>
					</div>			
				@endforeach
			</div>
		</div>
	@endif
@endisset
@endsection
@push('head')
		<style>
			#sliderEmpresa .carousel-indicators{
				justify-content: center !important;
				left: 0 !important;
			}
			#sliderEmpresa .carousel-indicators .active{
				background-color: #22A7DF !important;
			}
		</style>
@endpush
@push('scripts')	
@endpush
       
