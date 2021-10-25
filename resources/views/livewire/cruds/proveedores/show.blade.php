<div>
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-12">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $proveedore->nombre }}</td>
                                <td>{{ $proveedore->direccion }}</td>
                                <td>{{ $proveedore->telefono }}</td>
                                <td>{{ $proveedore->email }}</td>
                            </tr>
                    </tbody>
                </table>
                    <div class="mt-4">
                        <a href="{{ route('admin.proveedores.index') }}" class="btn btn-danger">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

