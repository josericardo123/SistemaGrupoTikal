<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Productos</title>
    {{--<link rel="stylesheet" href="style.css" media="all" />--}}
    <style>
        .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  
  a {
    color: #5D6975;
    text-decoration: underline;
  }
  
  body {
    position: relative;
    width: 16.5cm;  
    height: 29.7cm; 
    margin: 0 auto; 
    color: #001028;
    background: #FFFFFF; 
    font-family: Arial, sans-serif; 
    font-size: 12px; 
    font-family: Arial;
  }
  
  header {
    padding: 10px 0;
    margin-bottom: 30px;
  }
  
  #logo {
    text-align: center;
    margin-bottom: 10px;
  }
  
  #logo img {
    width: 75px;
    height: 75px;
  }
  
  h1 {
    border-top: 1px solid  #5D6975;
    border-bottom: 1px solid  #5D6975;
    color: #5D6975;
    font-size: 2.4em;
    line-height: 1.4em;
    font-weight: normal;
    text-align: center;
    margin: 0 0 20px 0;
    background: url(dimension.png);
  }
  
  #project {
    float: left;
  }
  
  #project span {
    color: #5D6975;
    text-align: right;
    width: 52px;
    margin-right: 10px;
    display: inline-block;
    font-size: 0.8em;
  }
  
  #company {
    float: right;
    text-align: right;
    margin-right: 250px;
  }
  
  #project div,
  #company div {
    white-space: nowrap;        
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
    margin: auto;
    text-align: center;
  }
  
  table tr:nth-child(2n-1) td {
    background: #F5F5F5;
  }
  
  table th,
  table td {
    text-align: center;
  }
  
  table th {
    padding: 5px 20px;
    color: #5D6975;
    border-bottom: 1px solid #C1CED9;
    white-space: nowrap;        
    font-weight: normal;
  }
  
  table .service,
  table .desc {
    text-align: left;
  }
  
  table td {
    padding: 20px;
    text-align: right;
  }
  
  table td.service,
  table td.desc {
    vertical-align: top;
  }
  
  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
  }
  
  table td.grand {
    border-top: 1px solid #5D6975;;
  }
  
  #notices .notice {
    color: #5D6975;
    font-size: 1.2em;
  }
  
  footer {
    color: #5D6975;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #C1CED9;
    padding: 8px 0;
    text-align: center;
  }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ public_path("/imagenes/logo.jpeg")}}" width="60px" height="60px"/>
      </div>
      <h1>REPORTE DE PRODUCTOS</h1>
      <div id="company" class="clearfix">
        {{--<div>GRUPO TIKAL</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>--}}
      </div>
      <div id="project">
        <div><span>INVENTARIO:</span> Papelería</div>
        <div><span>USUARIO:</span> {{ auth()->user()->name }}</div>
        {{--<div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>--}}
        <div><span>EMAIL:</span> <a href="{{ auth()->user()->email }}">{{ auth()->user()->email }}</a></div>
        <div><span>FECHA:</span> <?php echo $año->format('d/m/Y'); ?></div>
        <div><span>HORA:</span> <?php echo $año->format('H:i:s'); ?></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">#</th>
            <th class="desc">CÓDIGO</th>
            <th>PRODUCTO</th>
            <th>MARCA</th>
            <th>TOTAL</th>
            <th>ESTATUS</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($papelerias as $item)
            <tr>
                <td class="service">{{ $loop->iteration }}</td>
                <td class="desc">{{ $item->producto_codigo }}</td>
                <td class="unit">{{ $item->nombre_producto }}</td>
                <td class="total">{{ $item->marca }}</td>
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
      <div id="notices">
        <div>NOTICE:</div>
        {{--<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>--}}
      </div>
    </main>
    <footer>
        <center><p>Copyright <?php echo $año->format('Y'); ?></p></center>
    </footer>
  </body>
</html>