@extends('adminlte::page')

@section('title', 'GRUPO TIKAL')

@section('content_header')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-4">
                        <a href="{{ route('admin.roles.create')}}" class="btn btn-secondary me-2">Crear nuevo rol</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@stop

@section('content')

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
      @endif
    @endforeach
</div>
    <div class='card'>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.roles.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.roles.destroy', $item->id )}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @livewireScripts

@stop

