
<div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                {{--<div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>--}}
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                      @endif
                    @endforeach
                  </div>
                <div class="row mt-2">
                    <div class="col-4">
                        <span>Mostrar</span>
                        <select wire:model="cant" class="form-select" aria-label="Default select example">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                        <span>Entradas</span>
                    </div>
                    <div class="col-4">
                            {{--<a href="{{ route('admin.papelerias.create') }}" class="btn btn-primary">
                                Agregar Producto Papelería
                                <i class="fas fa-plus"></i>
                            </a>  --}} 

                    </div>
                    <div class="col-4">
                        <input class="form-control me-2" type="search" placeholder="Buscar" type="text"
                            aria-label="Search" wire:model="search">
                    </div>

                </div>
                @if ($papeleria_productos->count())

                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr class="table-primary">
                                {{-- <th wire:click="order('id')" class="col-1">
                                    No
                                   
                                    @if ($sort == 'id')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif

                                </th> --}}
                                <th wire:click="order('producto_codigo')" class="col-3">
                                    Código
                                    {{-- Sort --}}
                                    @if ($sort == 'producto_codigo')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th wire:click="order('nombre_producto')" class="col-3">
                                    Producto
                                    {{-- Sort --}}
                                    @if ($sort == 'nombre_producto')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th wire:click="order('descripcion')" class="col-3">
                                    Descripción
                                    {{-- Sort --}}
                                    @if ($sort == 'descripcion')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th wire:click="order('marca')" class="col-3">
                                    Marca
                                    {{-- Sort --}}
                                    @if ($sort == 'marca')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th wire:click="order('tipo_producto_id')" class="col-3">
                                    Tipo producto
                                    {{-- Sort --}}
                                    @if ($sort == 'tipo_producto_id')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                {{--<th wire:click="order('entradas')" class="col-3">
                                    Entradas
                                    
                                    @if ($sort == 'entradas')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>--}}
                                {{--<th wire:click="order('salidas')" class="col-3">
                                    Salidas
                                   
                                    @if ($sort == 'salidas')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>--}}
                                <th wire:click="order('total')" class="col-3">
                                    Total
                                    {{-- Sort --}}
                                    @if ($sort == 'total')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th wire:click="order('estatus')" class="col-3">
                                    Estatus
                                    @if ($sort == 'estatus')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>

                                <th colspan="5"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($papeleria_productos as $item)

                                <tr>
                                    {{--<td>{{ $item->id }}</td>--}}
                                    <td>{{ $item->producto_codigo }}</td>
                                    <td>{{ $item->nombre_producto }}</td>
                                    <td>{{ $item->descripcion }}</td>
                                    <td>{{ $item->marca }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    {{--<td>{{ $item->entradas }}</td>
                                    <td>{{ $item->salidas }}</td>--}}
                                    @if ($item->total == 0)
                                        <td><b><p style="color: red;">{{ $item->total }}</p></b></td>
                                    @else
                                    <td><b style="color:green;">{{ $item->total }}</b></td>
                                    @endif
                                    @if($item->total == 0)
                                        <td><b style="color: red;">AGOTADO</b></td>
                                    @elseif($item->total > 0)
                                        @if($item->estatus == 1)
                                        <td><b style="color: green;">ACTIVO</b></td>
                                        @endif
                                    @endif
                                    {{--<td>${{ $item->precio_unidad }}</td>--}}
                                    {{--<td width="10px">
                                        
                                        <a href="{{ route('admin.papelerias.show', $item->id ) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i></a>
                                       
                                    </td>--}}
                                    {{--<td width="10px">
                                       
                                        <a href="{{ route('admin.papelerias.edit', $item->id ) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a> 
                                       
                                    </td>--}}
                                    {{--<td width="10px">
                                       
                                        <button class="btn btn-danger btn-sm"
                                        wire:click="delete({{ $item->id }})">
                                        <i class="fas fa-trash-alt"></i>
                                        </button>  
                                 
                                    </td>--}}
                                    <td width="10px">
                                        @can('admin.papelerias.edit')
                                        <button class="btn btn-primary btn-sm"
                                        wire:click="activar({{ $item->id }})">
                                        <i class="fas fa-edit"></i>
                                        </button>  
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @else
                    <div class="card-body">
                        <strong>No existe ningún registro</strong>
                    </div>
                @endif
                <br>
                <nav aria-label="Page navigation example" class="float-right">
                    <ul class="pagination">
                        <li class="page-item">
                            {{ $papeleria_productos->links() }}
                        </li>
                    </ul>
                </nav>
                <div class="mt-3">
                    <p> Mostrando {{ $papeleria_productos->firstItem() }} a {{ $papeleria_productos->lastItem() }} de {{ $papeleria_productos->total() }} Entradas</p>
                </div>
            </div>
        </div>

    </div>

</div>

