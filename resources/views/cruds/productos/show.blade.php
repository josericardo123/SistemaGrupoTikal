@extends('adminlte::page')

@section('title', 'Ver Producto')

@section('content_header')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <div class="card-body">
                    <div class="row mt-6">
                        <div class="col-6">
                            @can('admin.productos.pdf')
                            <a target="_blank" class="btn btn-danger" href="{{ route('reporte-consumoproducto.pdf', $producto) }}">
                                Lista del consumo de producto PDF
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

    @livewire('cruds.productos.show', ['producto' => $producto])

    <!-- Scripts ---->

    @livewireScripts

@endsection