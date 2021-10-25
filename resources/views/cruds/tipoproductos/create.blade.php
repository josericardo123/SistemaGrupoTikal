@extends('adminlte::page')

@section('title', 'Agregar Tipo productos')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-title">Agregar Tipo Producto</div>
            </div>
        </div>
    </div>

@stop

@section('content')

    @livewire('cruds.tipoproductos.create')

    <!-- Scripts ---->
@livewireScripts


@endsection