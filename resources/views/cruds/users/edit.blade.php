@extends('adminlte::page')

@section('title', 'GRUPO TIKAL')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="mt-4">
                <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Volver</a>
            </div>

            <center><p class="h5"><b>Nombre de usuario:</b></p></center>

            <p class="form-control">{{ $user->name }}</p>

            <h2  class="h5">Listado de roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
 
                    {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!} 
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop