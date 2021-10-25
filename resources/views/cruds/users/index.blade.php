@extends('adminlte::page')

@section('title', 'GRUPO TIKAL')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    @livewire('cruds.users.index')

    @livewireScripts
@stop
