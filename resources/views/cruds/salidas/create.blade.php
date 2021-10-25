@extends('adminlte::page')

@section('title', 'GRUPO TIKAL')

@section('content_header')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <div class="card-body">
                <div class="col-4">
                    <a class="btn btn-danger" href="{{ route('admin.salidas.index')}}">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')

    @livewire('cruds.salidas.create')

    @livewireScripts
@stop