@extends('adminlte::page')

@section('title', 'GRUPO TIKAL')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))
                  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                  @endif
                @endforeach
              </div>
            <div class="mt-4">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-danger">Volver</a>
            </div>

            {!! Form::open(['route' => 'admin.roles.store']) !!}
           
                @include('cruds.roles.partials.form')
                
                {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    @livewireScripts
@stop
