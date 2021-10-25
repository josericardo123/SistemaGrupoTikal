<div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))
                          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                          @endif
                        @endforeach
                      </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nombre proveedor: </label>
                            <input type="text" class="form-control" placeholder="Nombre" wire:model="nombre" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Dirección: </label>
                            <input type="text" class="form-control" placeholder="Dirección" wire:model="direccion" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        @error('direccion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Teléfono: </label>
                            <input type="number" class="form-control" placeholder="Dirección" wire:model="telefono">
                        @error('telefono')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="email" class="form-control" placeholder="Email" wire:model="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                </div>


                <div class="mt-4">
                    <button class="btn btn-success" wire:click="save({{ $proveedore->id }})">Actualizar</button>
                    <a href="{{ route('admin.proveedores.index') }}" class="btn btn-danger">Volver</a>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>