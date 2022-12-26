@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
    </div>
@stop
@section('content')
@if ($errors->any())
    @include('administrator.partials.mensaje-error')
@endif
@includeIf('administrator.partials.mensaje-exitoso')
@isset($section1)
    <section>
        <form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$section1->id}}">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section1->content_1}}" placeholder="Título" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" cols="30" rows="10" class="ckeditor">{{$section1->content_2}}</textarea>
                </div>
            </div>
            <div class="text-right col-sm-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </section>
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#modal-create-element">subir imagen</button>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div class="row">
    @foreach ($section3s as $section3)
        <div class="col-sm-12 col-md-4">
            <form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$section3->id}}">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" name="content_1" value="{{$section3->content_1}}" placeholder="Título" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="content_2" cols="30" rows="10" class="ckeditor">{{$section3->content_2}}</textarea>
                    </div>
                </div>
                <div class="text-right col-sm-12">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    @endforeach
</div>
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
    <script>
        $('.destroy').click(function(e){
            e.preventDefault()
            let element = e.target

            Swal.fire({
                title: 'Deseas eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(element.dataset.url)
                        .then(r => {
                            element.closest('div').remove()
                        })
                        .catch(e => console.error(e))
                    
                }
            })
        })
    </script>
@stop

