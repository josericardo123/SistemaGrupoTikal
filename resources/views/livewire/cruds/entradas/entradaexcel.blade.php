<html>

    <body>

    <div>
        <h1>ENTRADA DE PRODUCTOS CAFETERÍA</h1>
    </div>


    <div>
        <table>
        <thead>
            <tr>
                <th>No.</th>
                <th >Fecha</th>
                <th>Hora</th>
                <th >Producto</th>
                <th>Proveedor</th>
                <th >Cantidad (Entrada)</th>
                <th >Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entradas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>{{ $item->hora }}</td>
                    <td>{{ $item->nombre_producto }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->cantidad_entrada }}</td>
                    <td>${{ $item->precio }}</td>
                </tr>
            @endforeach
        </tbody>

        </table>
    </div>
        
        
    </body>

</html>

