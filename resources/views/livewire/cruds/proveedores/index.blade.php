<div>
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
            @can('admin.proveedores.create')
                <a href="{{ route('admin.proveedores.create') }}" class="btn btn-primary">
                    Agregar Nuevo Proveedor
                    <i class="fas fa-plus"></i>
                </a>   
            @endcan
        </div>
        <div class="col-4">
            <input class="form-control me-2" type="search" placeholder="Buscar" type="text"
                aria-label="Search" wire:model="search">
        </div>

    </div>
 
         @if($proveedores->count())
         <div class="card-body">
             <table class="table table-bordered mt-4">
                 <thead>
                     <tr class="table-primary">
                        <th wire:click="order('nombre')" class="col-3">
                            Nombre
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
                        <th wire:click="order('direccion')" class="col-3">
                            dirección
                            {{-- Sort --}}
                            @if ($sort == 'direccion')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif

                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th wire:click="order('telefono')" class="col-3">
                            Telefono
                            {{-- Sort --}}
                            @if ($sort == 'telefono')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif

                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th wire:click="order('email')" class="col-3">
                            Email
                            {{-- Sort --}}
                            @if ($sort == 'email')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif

                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th colspan="3"></th>

                         {{--<th><i class="fas fa-edit"></i></th>--}}
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($proveedores as $item)
                         <tr>
                             <td>{{ $item->nombre  }}</td>
                             <td>{{ $item->direccion }}</td>
                             <td>{{ $item->telefono }}</td>
                             <td>{{ $item->email }}</td>
                             <td width="10px">
                                @can('admin.proveedores.show')
                                 <a href="{{ route('admin.proveedores.show', $item->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></a>
                                @endcan
                            </td>
                             <td width="10px">
                                @can('admin.proveedores.edit')
                                <a href="{{ route('admin.proveedores.edit', $item->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                @endcan                            
                            </td>
                            <td width="10px">
                                @can('admin.proveedores.destroy')
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
         </div>
 
         <nav aria-label="Page navigation example" class="float-right">
            <ul class="pagination">
                <li class="page-item">
                    {{ $proveedores->links() }}
                </li>
            </ul>
        </nav>
        <div class="mt-3">
            <p> Mostrando {{ $proveedores->firstItem() }} a {{ $proveedores->lastItem() }} de {{ $proveedores->total() }} Entradas</p>
        </div>
         @else
             <div class="card-body">
                 <strong>No existe ningún registro de proveedores</strong>
             </div>
         @endif
    </div>
 </div>
 