@extends('adminlte::page')

@section('title', 'Agregar Producto Papelería')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-title">Agregar Producto Papelería</div>
            </div>
        </div>
    </div>

@stop

@section('content')

@livewire('papeleria.papelerias.create')

@livewireScripts


@endsection