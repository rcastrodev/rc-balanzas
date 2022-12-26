@extends('paginas.partials.app')
@section('content')
<div class="jumbotron bg-light align-items-end d-sm-none d-xl-flex">
	<div class="container mx-auto">
		<div class="text-blue align-items-center justify-content-between d-flex mb-4">
			<h1 class="font-size-45">Contacto</h1>
			<span class="font-size-24">Contactate con nuestra empresa.</span>
		</div>
	</div>
</div>
<div class="py-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
            <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14">
                    <div class="">
                        <h4 class="text-blue font-size-35 mb-4">RC BALANZAS</h4>
                        <p class="font-size-16 fw-light" style="color: #545454;">Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</p>
                    </div> 
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-envelope text-blue d-block me-3"></i><span class="d-block"></span>  
                        <div class="">
                            <a href="mailto:{{ $data->email }}" class="underline text-dark text-decoration-none">{{ $data->email }}</a><br> 
                            <a href="mailto:{{ $data->email2}}" class="underline text-dark text-decoration-none">{{ $data->email2 }}</a>  
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-phone-alt text-blue d-block me-3"></i>
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{ $phone[0] }}" class="underline text-dark text-decoration-none">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{ $data->phone1 }}" class="underline text-dark text-decoration-none">{{ $data->phone1 }}</a>
                        @endif        
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-map-marker-alt text-blue d-block me-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fal fa-circle text-blue d-block me-3"></i>
                        <div class="">
                            <span>Radio de trabajo:</span><br>
                            <span>{{ $data->work }}</span>    
                        </div>
                    </div>   
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">Nombre y apellido*</label>
                                <input type="text" name="nombre" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">Email*</label>
                                <input type="email" name="email" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">Teléfono</label>
                                <input type="text" name="telefono" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">Empresa</label>
                                <input type="text" name="compania" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">Mensaje*</label>
                                <textarea name="mensaje" class="form-control font-size-14 input-fondo" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="termino" id="termino">
                                <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad *</label>
                            </div>
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 d-flex justify-content-between">
                            <span style="color: #454545;">*Campos Obligatorios</span>
                            <button type="submit" class="text-uppercase btn bg-blue font-size-14 py-2 font-weight-600 mb-sm-3 mb-md-0 ancho-boton text-white px-5" style="border-radius:0;">Enviar mensaje</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('head')
    <style>
        .input-fondo{
            background-color: #F5F5F5 !important;
        }
    </style>
@endpush
@push('scripts')	
@endpush
       

