@extends('adminlte::page')

@section('title', 'Ver Tipo producto')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-title">Ver Tipo Producto</div>
            </div>
        </div>
    </div>

@stop

@section('content')

    @livewire('papeleria.papeleriatipoproducto.show', ['papeleriatipoproducto' => $papeleriatipoproducto])

    <!-- Scripts ---->
    @livewireScripts

@endsection