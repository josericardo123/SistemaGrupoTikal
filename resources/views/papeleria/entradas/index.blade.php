
@extends('adminlte::page')

@section('title', 'Productos papeleria')

@section('content_header')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-4">
                        @can('admin.papelerias.index')
                        <a class="btn btn-info" href="{{ route('admin.papelerias.index')}}">
                            Productos Papelería
                        </a>  
                        @endcan
                        @can('admin.papelerias.pdf')
                        <a target="_blank" class="btn btn-danger" href="{{ route('reporte-papeleriaentradas.pdf') }}">
                            Lista en PDF
                            <i class="fas fa-file-download"></i>
                        </a>
                        @endcan
                    </div>
                    <div class="col-4">
                        @can('admin.papelerias.excel')
                        <a class="btn btn-success" href="{{ route('reporte-papeleriaentradas.excel') }}">
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

    @livewire('papeleria.entradas.index')

    <!-- Scripts ---->

    @livewireScripts

@stop
