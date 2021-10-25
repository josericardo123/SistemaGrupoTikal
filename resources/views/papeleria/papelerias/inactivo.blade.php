@extends('adminlte::page')

@section('title', 'Papelería')

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
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@stop

@section('content')

@livewire('papeleria.papelerias.inactivo')

@livewireScripts


@endsection