@extends('adminlte::page')

@section('title', 'Agregar Producto')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-title">Agregar producto cafetería</div>
            </div>
        </div>
    </div>

@stop

@section('content')

@livewire('cruds.productos.create')

@livewireScripts


@endsection

