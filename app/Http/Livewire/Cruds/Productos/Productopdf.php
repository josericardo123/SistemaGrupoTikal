<?php

namespace App\Http\Livewire\Cruds\Productos;

use Livewire\Component;

use App\Models\Cruds\Producto;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

use Carbon\Carbon;
//use PDF;

class Productopdf extends Component
{
    public function render()
    {
        return view('livewire.cruds.productos.productopdf');
    }

    public function productoPDF(){

        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $productos = DB::table(DB::raw('productos p'))
        ->select('p.id','p.producto_codigo','p.nombre_producto','p.descripcion','p.marca','t.nombre','p.entradas','p.salidas','p.total','p.estatus')
        ->join(DB::raw('tipoproductos t'),function($join) {$join->on('p.tipo_producto_id','=','t.id')
        
        ->where('p.estatus','=',1)
        ; })
        ->get();

        $pdf = PDF::loadView('livewire.cruds.productos.ejemplo', compact('productos', 'año', 'hora_actual'));
        return $pdf->stream('Productos_Cafetería.pdf');
    }

}
