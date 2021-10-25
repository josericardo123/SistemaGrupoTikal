@extends('adminlte::page')

@section('title', 'GRUPO TIKAL')

@section('content_header')


@stop

@section('content')

    @livewire('cruds.proveedores.show', ['proveedore' => $proveedore])

    <!-- Scripts ---->

    @livewireScripts

@endsection