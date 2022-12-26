<div class="fixed-top w-100 bg-white">
    <header class="header">
        <div class="container d-flex justify-content-end align-items-center py-2">
            <a href="" class="me-3"><i class="fab fa-instagram text-blue me-2"></i></a>
            <a href="" class="me-3"><i class="fab fa-whatsapp text-blue me-2"></i></a>
            <a href="" class="me-3"><i class="fab fa-facebook-f text-blue me-2"></i></a>
            @if (Auth::guard('clients')->check())
                <span class="text-blue font-size-13 me-1">Bienvenido </span>
                <strong class="text-blue me-1">{{ client()->name }} </strong>
                <a href="{{ route('client.logout') }}" class="text-white font-size-14 me-3 py-1 px-2 bg-blue">Salir</a>  
            @else
                <div class="position-relative">
                    <div class="text-uppercase text-white font-size-13 bg-blue p-2" id="zona-cliente" style="cursor: pointer">Area de clientes</div>
                    <div class="formularios position-relative">
                        <div class="triangulo-equilatero-bottom position-absolute"></div>
                        <form action="{{ route('client.authenticate') }}" method="post" id="form-login" 
                        class="position-absolute py-5 px-3" autocomplete="off">
                            <div id="login-message" class="text-center mb-4"></div>
                            <div class="font-size-21 mb-3 text-blue" style="text-transform: initial;">INGRESO PARA CLIENTES</div>
                            <div class="form-group mb-3">
                                <label class="font-size-16" style="text-transform: initial;">Correo</label>
                                <input type="email" name="email" class="form-control bg-transparent" placeholder="Ingrese el correo por favor">
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-size-16" style="text-transform: initial;">Contrase&ntilde;a</label>
                                <input type="password" name="password" class="form-control bg-transparent" placeholder="Ingrese la clave">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn text-uppercase d-block px-4 py-2 mb-3 d-block w-100 mb-3 bg-blue text-white">ingresar</button>
                                <button type="submit" class="btn bg-red text-uppercase text-blue d-block px-4 py-2 d-block w-100 crear-cuenta" style="background-color: transparent; !important; border: 1px solid #22A7DF;">crear cuenta</button>
                            </div>
                        </form> 
                        <form action="{{ route('client.register-async') }}" method="post" id="form-register" 
                        class="position-absolute py-5 px-3" autocomplete="off">
                            <div id="register-message" class="text-center mb-4"></div>
                            <div class="font-size-21 mb-3" style="text-transform: initial;">Zona privada para clientes</div>
                            <div class="form-group mb-3">
                                <label class="font-size-16" style="text-transform: initial;">Usuario</label>
                                <input type="name" name="name" class="form-control bg-transparent">
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-size-16" style="text-transform: initial;">Correo</label>
                                <input type="email" name="email" class="form-control bg-transparent">
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-size-16" style="text-transform: initial;">Contrase&ntilde;a</label>
                                <input type="password" name="password" class="form-control bg-transparent">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-blue text-white d-block px-4 py-2 d-block w-100 mb-3">Crear cuenta</button>
                                <button type="submit" class="btn text-uppercase px-4 py-2 mb-3 bg-red text-uppercase text-white w-100 ingresar text-blue" style="background-color: transparent; !important; border: 1px solid #22A7DF;">ingresar</button>
                            </div>
                        </form> 
                    </div>
                </div> 
            @endif
    
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light w-100">
        <div class="container">
            <a class="navbar-brand d-flex" href="{{ route('index') }}">
                <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header d-block me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
                <ul class="navbar-nav position-relative align-items-center justify-content-between">
                    @if (! Auth::guard('clients')->check())
                        <li class="nav-item @if(Request::is('/')) position-relative @endif">
                            <a class="nav-link font-size-16 text-dark @if(Request::is('/')) active @endif" href="{{ route('index') }}">Inicio</a>
                        </li>
                        <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                            <a class="nav-link font-size-16 text-dark @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                        </li>
                        <li class="nav-item text-truncate @if(Request::is('medios-y-equipos')) position-relative @endif">
                            <a class="nav-link font-size-16 text-dark @if(Request::is('medios-y-equipos')) active @endif" href="{{ route('medios-y-equipos') }}">Medios y Equipos</a>
                        </li>  
                        <li class="nav-item @if(Request::is('clientes')) position-relative @endif">
                            <a class="nav-link font-size-16 text-dark @if(Request::is('clientes')) active @endif" href="{{ route('clientes') }}" >Clientes</a>
                        </li> 
                        <li class="nav-item @if(Request::is('novedades') || Request::is('novedad/*')) position-relative @endif">
                            <a class="nav-link font-size-16 text-dark @if(Request::is('novedades') || Request::is('novedad/*')) active @endif" href="{{ route('novedades') }}" >Novedades</a>
                        </li> 
                        <li class="nav-item @if(Request::is('presupuesto')) position-relative @endif">
                            <a class="nav-link font-size-16 text-dark @if(Request::is('presupuesto')) active @endif" href="{{ route('presupuesto') }}" >presupuesto</a>
                        </li> 
                        <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                            <a class="nav-link font-size-16 text-dark @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                        </li>
                    @else       
                        <li class="nav-item @if(Request::is('descargas')) position-relative @endif">
                            <a class="nav-link font-size-16 text-dark @if(Request::is('descargas')) active @endif" href="{{ route('descargas') }}">descargas</a>
                        </li>
                        <li class="nav-item @if(Request::is('certificados')) position-relative @endif">
                            <a class="nav-link font-size-16 text-dark @if(Request::is('certificados')) active @endif" href="{{ route('certificados') }}">certificados</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>      
</div>
<div class="margin-nav-fixed"></div>
