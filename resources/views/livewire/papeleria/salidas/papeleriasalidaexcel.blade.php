<html>

    <body>

    <div>
        <h1>SALIDA DE PRODUCTOS PAPELERÍA</h1>
    </div>


    <div>
        <table>
        <thead>
            <tr>
                <th>No.</th>
                <th >Fecha</th>
                <th>Hora</th>
                <th >Producto</th>
                <th >Cantidad (Entrada)</th>
                <th >Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salidas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>{{ $item->hora }}</td>
                    <td>{{ $item->nombre_producto }}</td>
                    <td>{{ $item->cantidad_salida }}</td>
                    <td>${{ $item->precio }}</td>
                </tr>
            @endforeach
        </tbody>

        </table>
    </div>
        
        
    </body>

</html>

