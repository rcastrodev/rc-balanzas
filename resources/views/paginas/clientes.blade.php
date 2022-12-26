@extends('paginas.partials.app')
@section('content')
<div class="jumbotron bg-light align-items-end d-sm-none d-xl-flex">
	<div class="container mx-auto">
		<div class="text-blue align-items-center justify-content-between d-flex mb-4">
			<h1 class="font-size-45">Clientes</h1>
			<span class="font-size-24">Conocé con quienes trabajamos</span>
		</div>
	</div>
</div>
<div class="py-5 container">
    <div class="d-flex flex-wrap justify-content-sm-center justify-content-md-start clientes">
        @foreach ($clients as $c)
            <div class="text-center mb-5">
                <img src="{{ asset($c->image) }}" alt="{{ $c->content_1 }}" class="d-block mx-auto img-client img-fluid">
                <strong class="text-blue">{{ $c->content_1 }}</strong>
            </div>
        @endforeach
    </div>
</div>
@endsection
@push('head')
    <style>
        @media(min-width:768px){
            .clientes > div{
                width: 50%;
            }
        }

        @media(min-width:992px){
            .clientes > div{
                width: 33%;
            }
        }

        @media(min-width:1200px){
            .clientes > div{
                width: 25%;
            }
        }

        @media(max-width:768px){
            .clientes > div{
                width: 100%;
            }
        }

        .img-client{
            min-height: 70px;
            max-height: 70px;
            object-fit: cover;
            margin-bottom: 10px;
        }
    </style>
@endpush
@push('scripts')	
@endpush
       
