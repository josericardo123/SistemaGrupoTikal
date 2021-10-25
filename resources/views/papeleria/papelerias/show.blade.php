@extends('adminlte::page')

@section('title', 'Ver Producto Papeleria')

@section('content_header')

<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <div class="card-body">
                <div class="row mt-6">
                    <div class="col-6">
                        @can('admin.papelerias.pdf')
                        <a target="_blank" class="btn btn-danger" href="{{ route('reporte-consumoproducto-papeleria.pdf', $papeleria) }}">
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



    @livewire('papeleria.papelerias.show', ['papeleria' => $papeleria])

    <!-- Scripts ---->
    @livewireScripts

@endsection