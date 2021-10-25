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
                            <label for="producto_codigo">Código del producto: </label>
                            <input type="text" class="form-control" placeholder="Código" wire:model="producto_codigo" onkeyup="javascript:this.value=this.value.toUpperCase();">
                            
                        @error('producto_codigo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nombre_producto">Nombre del producto: </label>
                            <input type="text" class="form-control" placeholder="Nombre" wire:model="nombre_producto" onkeyup="javascript:this.value=this.value.toUpperCase();">
                            
                        @error('nombre_producto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="descripcion">Descripción del producto: </label>
                            <textarea type="text" class="form-control" placeholder="Descripción" wire:model="descripcion" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                            
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="marca">Marca del producto:</label>
                            <input type="text" class="form-control" placeholder="Marca" wire:model="marca" onkeyup="javascript:this.value=this.value.toUpperCase();">

                            @error('marca')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tipo_produto_id">Tipo del producto:</label>
                            <select wire:model="tipo_producto_id" class="form-control" style="text-transform:uppercase;">
                                <option value="">Seleccione...</option>
                                @foreach($tipoproductos as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>

                            @error('tipo_producto_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="precio_unidad">Precio unidad (Proveedor):</label>
                            <input type="number" class="form-control" wire:model="precio_unidad">
    
                            @error('precio_unidad')
                                <small class="text-danger">{{ $message }}</small>
                             @enderror
                        </div>
                    </div>  
                </div>

                <div class="row">
                    {{--<div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Precio unidad (Venta):</label>
                            <input type="number" class="form-control" wire:model="precio_unidad_venta">

                            @error('precio_unidad_venta')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>--}}
                    <div class="col-ms-6">
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
                    </div>
                </div>
  
                <div class="mt-4">
                    <button class="btn btn-success" wire:click="save()">Guardar</button>
                    <a href="{{ route('admin.productos.index') }}" class="btn btn-danger">Volver</a>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>