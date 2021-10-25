@extends('adminlte::page')

@section('title', 'Editar Producto')



@section('content_header')

@stop

@section('content')

    @livewire('cruds.productos.edit', ['producto' => $producto])

    @livewireScripts

@endsection

