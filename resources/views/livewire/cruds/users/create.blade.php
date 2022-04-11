
<div class="card">
    <div class="card-body">
        {{--<div class="mt-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Volver</a>
        </div>--}}
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
              @endif
            @endforeach
          </div>
        
            <div class="row">
                <div class="col-6">
                    <label for="">Nombre completo:</label>
                    <input type="text" placeholder="Nombre" class="form-control" wire:model="name">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="">Email:</label>
                    <input type="text" placeholder="Email" class="form-control" wire:model="email">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="">Contraseña:</label>
                    <input type="password" placeholder="" class="form-control" wire:model="password">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!--div class="col-6">
                    <label for="">Repetir contraseña:</label>
                    <input type="password" placeholder="" class="form-control">
                </div-->
            </div>
            <div class="mt-4">
                <button type="button" class="btn btn-success" wire:click="save()">Guardar</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Volver</a>
            </div>
    </div>
</div>

