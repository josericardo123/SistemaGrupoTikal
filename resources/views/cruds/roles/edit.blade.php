@extends('adminlte::page')

@section('title', 'GRUPO TIKAL')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif
<div class="card">
    <div class="card-body">

        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
        <div class="mt-4">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-danger">Volver</a>
        </div>

        @include('cruds.roles.partials.form')

            {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
    @livewireScripts
@stop
