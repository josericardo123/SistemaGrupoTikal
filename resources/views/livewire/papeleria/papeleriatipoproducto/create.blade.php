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
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Tipo de producto: </label>
                            <input type="text" class="form-control" placeholder="Nombre" wire:model="nombre" onkeyup="javascript:this.value=this.value.toUpperCase();">
                            
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                    {{--<div class="col-ms-6">
                        <div class="form-group">
                            <label for="estatus">Estatus:</label>
                            <select wire:model="estatus" class="form-control" style="text-transform:uppercase;">
                                <option value="">Selecciona...</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>

                            @error('estatus')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>--}}
                </div>

  
                <div class="mt-4">
                    <button class="btn btn-success" wire:click="save()">Guardar</button>
                    <a href="{{ route('admin.papeleriatipoproductos.index') }}" class="btn btn-danger">Volver</a>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>