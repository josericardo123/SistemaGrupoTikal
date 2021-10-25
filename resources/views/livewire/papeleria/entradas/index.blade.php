<div>
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

        </div>
        <div class="col-4">
            <input class="form-control me-2" type="search" placeholder="Buscar" type="text"
                aria-label="Search" wire:model="search">
        </div>

    </div>
 
         @if($entradas->count())
         <div class="card-body">
             <table class="table table-bordered mt-4">
                 <thead>
                     <tr class="table-primary">
                        <th wire:click="order('fecha')" class="col-3">
                            Fecha
                            {{-- Sort --}}
                            @if ($sort == 'fecha')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif

                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th wire:click="order('hora')" class="col-3">
                            Hora
                            {{-- Sort --}}
                            @if ($sort == 'hora')
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
                        <th wire:click="order('cantidad_entrada')" class="col-3">
                            Cantidad entrada
                            {{-- Sort --}}
                            @if ($sort == 'cantidad_entrada')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif

                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th wire:click="order('precio')" class="col-3">
                            Precio total
                            {{-- Sort --}}
                            @if ($sort == 'precio')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif

                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                         {{--<th><i class="fas fa-edit"></i></th>--}}
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($entradas as $item)
                         <tr>
                             <td>{{ $item->fecha  }}</td>
                             <td>{{ $item->hora }}</td>
                             <td>{{ $item->nombre_producto }}</td>
                             <td>{{ $item->cantidad_entrada }}</td>
                             <td>${{ $item->precio }}</td>
                             {{--<td>
                                 <a href="{{ route('admin.entradas.edit', $item->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                             </td>--}}
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
 
         <nav aria-label="Page navigation example" class="float-right">
            <ul class="pagination">
                <li class="page-item">
                    {{ $entradas->links() }}
                </li>
            </ul>
        </nav>
        <div class="mt-3">
            <p> Mostrando {{ $entradas->firstItem() }} a {{ $entradas->lastItem() }} de {{ $entradas->total() }} Entradas</p>
        </div>
         @else
             <div class="card-body">
                 <strong>No existe ningún registro de entradas</strong>
             </div>
         @endif
    </div>
 </div>
 