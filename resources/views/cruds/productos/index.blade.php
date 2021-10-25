
@extends('adminlte::page')

@section('title', 'Productos cafetería')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-4">
                            @can('admin.productos.pdf')
                            <a target="_blank" class="btn btn-danger" href="{{ route('reporte-producto.pdf')}}">
                                Lista en PDF
                                <i class="fas fa-file-download"></i>
                            </a>
                            @endcan
                            @can('admin.entradas.index')
                            <a class="btn btn-primary" href="{{ route('admin.entradas.index')}}">
                                Entradas
                            </a>
                            @endcan
                        </div>
                        <div class="col-4">
                            @can('admin.salidas.index')
                                <a href="{{ route('admin.salidas.index')}}" class="btn btn-secondary">Salidas</a>
                            @endcan
                            @can('admin.tipoproductos.index')
                                <a href="{{ route('admin.tipoproductos.index')}}" class="btn btn-secondary">Agregar tipo-producto</a>    
                            @endcan
                        </div>
                        <div class="col-4">
                        @can('admin.productos.inactivo')
                            <a href="{{ route('productos-inactivos') }}" class="btn btn-danger">Productos INACTIVOS</a>
                        @endcan  
                        </div>      
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('content')

    @livewire('cruds.productos.index')

    <!-- Scripts ---->
    @livewireScripts

@endsection




