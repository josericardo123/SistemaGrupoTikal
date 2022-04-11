@extends('adminlte::page')

@section('title', 'GRUPO TIKAL')

@section('content_header')
    <h1>Agregar nuevo usuario</h1>
@stop

@section('content')
    
@livewire('cruds.users.create')

@livewireScripts

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop