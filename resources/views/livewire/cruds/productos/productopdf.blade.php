
<html>
    <head>
        <style>
            /** 
                Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
                puede ser de altura y anchura completas.
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Defina ahora los márgenes reales de cada página en el PDF **/
            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            /** Definir las reglas del encabezado **/
            header {
                position: fixed;
                top: .7cm;
                left: .5cm;
                right: 0cm;
                height: 3cm;
            }

            h4 {
                position: fixed;
                top: .4cm;
                left: 85 px;
            }

            .p {
                position: absolute;
                right: 20px;
                top: .7px
            }

            table{
                border-collapse: collapse;
                text-align: center;
                margin: auto;
            }

            main {
                text-align: center;
                font: 50% sans-serif;
            }

            table, th, td {
                border: 1px solid black;      
            }
            .td-head{
                background-color: #BFC3C4;
                color: #505354;
                font-weight: bold;
            }

            /** Definir las reglas del pie de página **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }
        </style>
    </head>
    <body>
        <!-- Defina bloques de encabezado y pie de página antes de su contenido -->
        <header>
            <img src="{{ public_path("/imagenes/logo.jpeg")}}" width="60px" height="60px"/>
            <h4>GRUPO TIKAL</h4>
            <p class="p">{{ auth()->user()->name }}<?php echo " -- " . $hora_actual . "     " ?>
                <?php echo $año->format('d-m-Y'); ?>
            </p>
        </header>

        <footer>
            {{--<img src="" width="100%" height="100%"/>--}}

            <center><p>Copyright <?php echo $año->format('Y'); ?></p></center>
        </footer>

        <!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
        <main>
            <center><h3 class="tema">Productos Cafetería</h3></center>
            <div>
                <table class="table">
                    <thead class="td-head">
                        <tr>
                            <th>No.</th>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Marca</th>
                            <th>Tipo</th>
                            <th>Total</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->producto_codigo}}</td>
                                <td>{{ $item->nombre_producto }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>{{ $item->marca }}</td>
                                <td>{{ $item->nombre }}</td>
                                @if ($item->total == 0)
                                    <td><b><p style="color: red;">{{ $item->total }}</p></b></td>
                                @else
                                <td><b style="color:green;">{{ $item->total }}</b></td>
                                @endif
                                @if($item->total == 0)
                                    <td><b style="color: red;">AGOTADO</b></td>
                                @elseif($item->total < 10)
                                    <td><b style="color: rgb(153, 0, 255);">POR AGOTARSE</b></td>
                                @elseif($item->total > 0)
                                    @if($item->estatus == 1)
                                    <td><b style="color: green;">ACTIVO</b></td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </body>
</html>


