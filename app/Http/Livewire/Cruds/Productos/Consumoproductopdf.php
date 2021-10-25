<?php

namespace App\Http\Livewire\Cruds\Productos;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

use App\Models\Cruds\Producto;

class Consumoproductopdf extends Component
{

    public $producto;
    public $producto_id;
    public function render()
    {
        return view('livewire.cruds.productos.consumoproductopdf');
    }

    public function consumoproductosPDF(Producto $producto){
        $this->producto = $producto;
        $this->producto_id = $producto->id;
        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $consumoproductos = DB::table(DB::raw('salidas s'))
        ->select('s.fecha','s.hora','p.nombre_producto','s.cantidad_salida','s.precio')
        ->join(DB::raw('productos p'),function($join) {$join->on('s.producto_id','=','p.id')
        
        ->where('p.id','=',$this->producto_id)
        ; })
        ->get();

        $pdf = PDF::loadView('livewire.cruds.productos.consumoproductopdf', compact('consumoproductos', 'año', 'hora_actual'));
        return $pdf->stream('Consumo_de_producto_cafetería.pdf');
    }
}
