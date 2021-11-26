<div>
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="producto_codigo">Código del producto: </label>
                                <input type="text" class="form-control" placeholder="Código" wire:model="producto_codigo" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled>
                                
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
                                <label for="precio_unidad">Precio por unidad (Proveedor):</label>
                                <input type="number" class="form-control" wire:model="precio_unidad" onkeyup="javascript:this.value=this.value.toUpperCase();">
    
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

                        <div class="col-sm-4">
                            <div class="form-group">
                                {{--<label for="">Stock:</label>--}}
                                <input type="hidden" class="form-control" wire:model="total" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-success" wire:click="save({{ $producto->id }})" wire:loading.attr="disabled" wire:target="save()">Actualizar</button>
                        <a href="{{ route('admin.productos.index') }}" class="btn btn-danger">Volver</a>
                    </div><br>

                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))
                          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                          @endif
                        @endforeach
                      </div>

                    @can('admin.productos.operaciones')
                        
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Código del producto: </label>
                                <input type="search" class="form-control" wire:model="producto_codigo"disabled>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Fecha:</label>
                                <input disabled type="date" class="form-control" value="{{ $now->format('Y-m-d') }}">
    
                                @error('fecha')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Producto</label>
                                <input type="text" class="form-control" wire:model="nombre_producto" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Cantidad entrada del producto:</label>
                                <input type="number" class="form-control" wire:model="cantidad_entrada">
    
                                @error('cantidad_entrada')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div  class="col-sm-4">
                            <div class="form-group">
                                <label for="">Cantidad salida del producto:</label>
                                <input type="number" class="form-control" wire:model="cantidad_salida">
    
                                @error('cantidad_salida')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            {{--<div class="form-group">
                                <label for="">Proveedor:</label>
                                <select wire:model="proveedor" class="form-control" style="text-transform:uppercase;">
                                    <option value="">Seleccione...</option>
                                    @foreach($proveedores as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
    
                                @error('proveedor')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>--}}
                            {{--<div class="form-group">
                                <label for="proveedor">Proveedor:</label>
                                    <input type="text" list="datos" class="form-control">
                                    <datalist wire:model="proveedor" id="datos">
                                        <option value="">Seleccione...</option>
                                        @foreach($proveedores as $item)
                                            <option value="{{ $item->nombre }}">
                                        @endforeach
                                    </datalist>
                                @error('proveedor')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>--}}
                        </div>

                    </div>
                    <div class="row">
                        {{--<div  class="col-sm-4">
                            <div class="form-group">
                                <label for="">Cantidad salida del producto:</label>
                                <input type="number" class="form-control" wire:model="cantidad_salida">
    
                                @error('cantidad_salida')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>--}}
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-success" wire:click="entrada({{ $producto->id }})" wire:loading.attr="disabled" wire:target="entrada()">Registrar</button>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>

</div>