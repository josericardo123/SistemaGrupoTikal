
@extends('adminlte::page')

@section('title', 'Productos papelería')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-4">
                            @can('admin.papelerias.pdf')
                            <a target="_blank" class="btn btn-danger" href="{{ route('reporte-papeleria.pdf') }}">
                                Lista en PDF
                                <i class="fas fa-file-download"></i>
                            </a>   
                            @endcan
                            @can('admin.papeleriaentradas.index')
                            <a class="btn btn-primary" href="{{ route('admin.papeleriaentradas.index') }}">
                                Entradas
                            </a>  
                            @endcan
                        </div>
                        <div class="col-4">
                            @can('admin.papeleriasalidas.index')
                            <a href="{{ route('admin.papeleriasalidas.index') }}" class="btn btn-secondary">Salidas</a>
                            @endcan
                            @can('admin.papeleriatipoproductos.index')
                            <a href="{{ route('admin.papeleriatipoproductos.index') }}" class="btn btn-secondary">Agregar tipo-producto</a>
                            @endcan
                        </div> 
                
                        <div class="col-4">
                            @can('admin.papelerias.inactivo')
                            <a href="{{ route('papeleria-productos-inactivos') }}" class="btn btn-danger">Papelería productos INACTIVOS</a>
                            @endcan
                        </div>   
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('content')

    @livewire('papeleria.papelerias.index')

    <!-- Scripts ---->

    @livewireScripts

@stop
