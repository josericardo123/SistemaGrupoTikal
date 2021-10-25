
<div>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
          @endif
        @endforeach
      </div>
    <div class="card">
        <div class="card-body">

            <div class="col-12">
                <form action="{{ route('update-perfil')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm--4">
                            <div class="form-group">
                                <img class="img-thumbnail img-fluid" src="{{ asset('storage'). '/' . auth()->user()->imagen }}" width="200">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Imagen: </label>
                                <input type="file" class="form-control" name="imagen"> 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class=form-group>
                                <input type="hidden" class="form-control" name="id" value="{{ auth()->user()->id }}">
                            </div>
                        </div>
                    </div>


                    <div class="mt-4">
                        <button type="submit" class="btn btn-secondary">Actualizar foto</button>
                        {{--<a href="{{ route('admin.home') }}" class="btn btn-danger">Volver</a>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
