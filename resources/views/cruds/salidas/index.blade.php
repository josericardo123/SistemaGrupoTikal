@extends('adminlte::page')

@section('title', 'GRUPO TIKAL')

@section('content_header')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-4">
                        @can('admin.productos.index')
                        <a class="btn btn-info" href="{{ route('admin.productos.index')}}">
                            Productos cafetería
                        </a>  
                        @endcan
                        @can('admin.productos.pdf')
                        <a target="_blank" class="btn btn-danger" href="{{ route('reporte-salidas.pdf')}}">
                            Lista en PDF
                            <i class="fas fa-file-download"></i>
                        </a>
                        @endcan
                    </div>
                    <div class="col-4">
                        @can('admin.productos.excel')
                        <a class="btn btn-success" href="{{ route('reporte-salidas.excel')}}">
                            Lista en EXCEL
                            <i class="fas fa-file-download"></i>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
    @livewire('cruds.salidas.index')

    @livewireScripts
@stop
