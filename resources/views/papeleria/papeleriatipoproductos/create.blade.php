@extends('adminlte::page')

@section('title', 'Agregar Tipo producto papeleria')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-title">Agregar Tipo Producto Papeleria</div>
            </div>
        </div>
    </div>

@stop

@section('content')

    @livewire('papeleria.papeleriatipoproducto.create')

    <!-- Scripts ---->
@livewireScripts


@endsection