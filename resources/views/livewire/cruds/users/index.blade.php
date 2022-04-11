<div>
   <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.users.create')}}" class="btn btn-secondary me-2">Agregar nuevo usuario</a>
        </div>
    <div class="card-header">
        <input class="form-control" type="search" placeholder="Buscar por nombre del usuario ó email"
            aria-label="Search" wire:model="search">
    </div>

        @if($users->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th><i class="fas fa-edit"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name  }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $item->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $users->links() }}
        </div>
        @else
            <div class="card-body">
                <strong>No existe ningún registro</strong>
            </div>
        @endif
   </div>
</div>
