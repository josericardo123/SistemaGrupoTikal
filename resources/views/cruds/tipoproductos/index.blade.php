
@extends('adminlte::page')

@section('title', 'Tipo productos')

@section('content_header')

<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <div class="card-body">
                <div class="col-4">
                    @can('admin.productos.index')
                    <a class="btn btn-info" href="{{ route('admin.productos.index')}}">
                        Productos cafetería
                    </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('content')

    @livewire('cruds.tipoproductos.index')

    <!-- Scripts ---->
    @livewireScripts

@stop

