<div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-12">

                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Código del producto: </label>
                            <input type="search" class="form-control" placeholder="Código" wire:model="codigo">
                        </div>
                    </div>
                    @foreach ($consultas as $item)
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Fecha:</label>
                            <input type="date" class="form-control" wire:model="fecha">

                            @error('fecha')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="{{ $item->id }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Producto</label>
                            <input type="text" class="form-control" value="{{ $item->nombre_producto }}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Cantidad de salidas:</label>
                            <input type="number" class="form-control" wire:model="cantidad_salida">

                            @error('cantidad_salida')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Precio por unidad (Venta):</label>
                            <input type="number" class="form-control" value="{{ $item->precio_unidad_venta }}" disabled>
                        </div>
                    </div>
                </div>

                <div  class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Stock:</label>
                            <input type="number" class="form-control" value="{{ $item->total }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-success" wire:click="save({{ $item->id }})">Guardar</button>
                    <a href="{{ route('admin.salidas.index') }}" class="btn btn-danger">Volver</a>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>