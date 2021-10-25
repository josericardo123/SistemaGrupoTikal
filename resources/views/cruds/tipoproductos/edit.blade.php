@extends('adminlte::page')

@section('title', 'Editar Tipo producto')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-title">Editar Tipo de Producto</div>
            </div>
        </div>
    </div>

@stop

@section('content')

    @livewire('cruds.tipoproductos.edit', ['tipoproducto' => $tipoproducto])

    <!-- Scripts ---->

    @livewireScripts
    
@endsection