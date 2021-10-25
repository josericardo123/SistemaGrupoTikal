<div>
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-12">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Marca</th>
                            <th>Tipo producto</th>
                            {{--<th>Entradas</th>
                            <th>Salidas</th>--}}
                            <th>Total</th>
                            <th>Precio unidad (Proveedor)</th>
                            {{--<th>Precio unidad (Venta)</th>--}}
                            <th>estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($papelerias as $item)
                            <tr>
                                <td>{{ $item->producto_codigo }}</td>
                                <td>{{ $item->nombre_producto }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>{{ $item->marca }}</td>
                                <td>{{ $item->nombre }}</td>
                                {{--<td>{{ $item->entradas }}</td>
                                <td>{{ $item->salidas }}</td>--}}
                                <td>{{ $item->total }}</td>
                                <td>${{ $item->precio_unidad }}</td>
                                {{--<td>${{ $item->precio_unidad_venta }}</td>--}}
                                @if ($item->estatus == 2)
                                <td>INACTIVO</td>
                                @elseif($item->estatus == 1)
                                <td>ACTIVO</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                    <div class="mt-4">
                        <a href="{{ route('admin.papelerias.index') }}" class="btn btn-danger">Volver</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @can('admin.papelerias.operaciones')
    <div class="container">
        <div  class="card">
            <div class="card-body">
                <center><h4>Mostrar producto por fechas...</h4></center>
                    <form action="{{ route('reportefechaspapeleria.pdf', $papeleria->id )}}">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Fecha inicio: </label>
                                    <input type="date" class="form-control" name="fecha_inicio">
                                @error('fecha_inicio')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Fecha fin: </label>
                                    <input type="date" class="form-control" name="fecha_fin">
                                @error('fecha_fin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                            </div>
                        </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-success">Formato PDF</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
    @endcan
</div>

