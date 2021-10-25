<div>
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <div class="col-12">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Tipo producto</th>
                            {{--<th>Estatus</th>--}}
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $papeleriatipoproducto->nombre }}</td>
                                {{--@if ($papeleriatipoproducto->estatus == 2)
                                <td>INACTIVO</td>
                                @elseif($papeleriatipoproducto->estatus == 1)
                                <td>ACTIVO</td>
                                @endif--}}
                            </tr>
                        
                    </tbody>
                </table>


                    <div class="mt-4">
                        <a href="{{ route('admin.papeleriatipoproductos.index') }}" class="btn btn-danger">Volver</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

