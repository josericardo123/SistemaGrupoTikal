@extends('adminlte::page')

@section('title', 'Editar Producto Papeleria')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-title">Editar Producto Papelería</div>
            </div>
        </div>
    </div>

@stop

@section('content')

    @livewire('papeleria.papelerias.edit', ['papeleria' => $papeleria])

    @livewireScripts


@endsection