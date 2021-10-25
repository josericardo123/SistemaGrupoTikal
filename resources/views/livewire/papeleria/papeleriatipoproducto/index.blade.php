
<div>
    <div class="container">
        <div class="card">
            <div class="card-body">
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
                        @can('admin.papeleriatipoproductos.create')
                        <a href="{{ route('admin.papeleriatipoproductos.create') }}" class="btn btn-primary">
                            Agregar Tipo  Producto
                            <i class="fas fa-plus"></i>
                        </a>
                        @endcan
                        
                    </div> 
                    <div class="col-4">
                        <input class="form-control me-2" type="search" placeholder="Buscar" type="text"
                            aria-label="Search" wire:model="search">
                    </div>
                </div>
                @if ($tipoproductos->count())

                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr class="table-primary">
                                <th wire:click="order('id')" class="col-1">
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

                                </th> 
                                <th wire:click="order('nombre')" class="col-3">
                                    Tipo producto
                                    {{-- Sort --}}
                                    @if ($sort == 'nombre')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif

                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                {{--<th wire:click="order('estatus')" class="col-3">
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
                                </th>--}}

                                <th><i class="fas fa-eye"></i></th>
                                <th><i class="fas fa-edit"></i></th>
                                <th><i class="fas fa-trash-alt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipoproductos as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    {{--@if ($item->estatus == 2)
                                    <td><b><p style="color: red;">INACTIVO</p></b></td>
                                    @elseif($item->estatus == 1)
                                    <td><b><p style="color: green;">ACTIVO</p></b></td>
                                    @endif--}}
                                    
                                    <td>
                                        @can('admin.papeleriatipoproductos.show')
                                        <a href="{{ route('admin.papeleriatipoproductos.show', $item->id ) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i></a> 
                                        @endcan
                                    </td>
                                    <td>
                                    @can('admin.papeleriatipoproductos.edit')
                                    <a href="{{ route('admin.papeleriatipoproductos.edit', $item->id ) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    </td> 
                                    <td>
                                        @can('admin.papeleriatipoproductos.destroy')
                                        <button class="btn btn-danger btn-sm"
                                        wire:click="delete({{ $item->id }})">
                                        <i class="fas fa-trash-alt"></i>
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
                            {{ $tipoproductos->links() }}
                        </li>
                    </ul>
                </nav>
                <div class="mt-3">
                    <p> Mostrando {{ $tipoproductos->firstItem() }} a {{ $tipoproductos->lastItem() }} de {{ $tipoproductos->total() }} Entradas</p>
                </div>
            </div>
        </div>

    </div>

</div>

