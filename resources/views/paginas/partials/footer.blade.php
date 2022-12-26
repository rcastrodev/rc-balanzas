<footer class="font-size-14 text-sm-center text-md-start bg-gray">
    <div class="row justify-content-between container mx-auto py-sm-2 py-md-5">
        <div class="col-sm-12 col-xl-3" style="">
            @if (Storage::disk('public')->exists($data->logo_footer))
                <div class="d-md-flex flex-column mb-3 text-decoration-none">
                    <img src="{{ asset($data->logo_footer) }}" class="d-block mx-auto">
                    <div class="text-center mt-4">
                        @if ($data->instagram)
                            <a href="{{ $data->instagram }}" class="me-4"><i class="fab fa-instagram font-size-13 text-white"></i></a>
                        @endif
                        @if ($data->phone3)
                            <a href="{{$data->phone3}}" class="me-4"><i class="fab fa-whatsapp text-white"></i></a>
                        @endif
                        @if ($data->facebook)
                            <a href="{{ $data->facebook }}" class="font-size-13"><i class="fab fa-facebook-f text-white"></i></a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        <div class="col-sm-12 col-md-4 d-sm-none d-md-block">
            <div class="row justify-content-between">
                <div class="col-sm-12">    
                    <div class="row">
                        <h6 class="text-uppercase text-blue fw-bold mb-4 text-sm-start pe-5 pb-2 w-100">secciones</h6>
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ route('index') }}" class="d-block text-decoration-none text-white mb-1 underline">Home</a>
                            <a href="{{ route('empresa') }}" class="d-block text-decoration-none text-white mb-1 underline">Empresa</a>
                            <a href="{{ route('medios-y-equipos') }}" class="d-block text-decoration-none text-white mb-1 underline">Medios y Equipos</a>
                            <a href="{{ route('clientes') }}" class="d-block text-decoration-none text-white mb-1 underline">Clientes</a>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ route('novedades') }}" class="d-block text-decoration-none text-white mb-1 underline">Novedades</a>
                            <a href="#" class="d-block text-decoration-none text-white mb-1 underline">Solicitud De Clientes</a>
                            <a href="{{ route('contacto') }}" class="d-block text-decoration-none text-white mb-1 underline">Contacto</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 font-size-13 px-sm-3 px-md-0">
            <h6 class="text-uppercase text-blue fw-bold mb-4 text-sm-start pe-5 pb-2">Contacto</h6>
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fal fa-map-marker-alt text-white d-block me-2" style="font-size: 20px;"></i>
                        <address class="d-block text-white m-0"> {{ $data->address }}</address>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fal fa-envelope text-white d-block me-2" style="font-size: 20px;"></i><span class="d-block"></span>
                        <div class="text-start">
                            <a href="mailto:{{ $data->email }}" class="text-white text-decoration-none underline">{{ $data->email }}</a>    
                            <a href="mailto:{{ $data->email2 }}" class="text-white text-decoration-none underline">{{ $data->email2 }}</a>    
                        </div>     
                    </div>
                    @php $phone = Str::of($data->phone1)->explode('|') @endphp
                    <div class="d-flex align-items-center mb-3">
                        <i class="fal fa-phone-alt text-white d-block me-2" style="font-size: 20px;"></i>
                        @if(count($phone) == 2)
                            <a href="tel:{{$phone[0]}}" class="text-white text-decoration-none underline">{{ $phone[1] }}</a>
                        @else
                            <a href="tel:{{$data->phone1}}" class="text-white text-decoration-none underline">{{ $data->phone1 }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-white py-3 bg-blue">
        <div class="container d-flex flex-wrap justify-content-between">
            <span class="text-white">© RC BALANZAS | Todos los derechos reservados.</span>
            <a href="https://osole.com.ar/" class="text-white text-decoration-none underline">BY OSOLE</a>
        </div>
    </div>
</footer>
<a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
    <i class="fab fa-whatsapp"></i>
</a>