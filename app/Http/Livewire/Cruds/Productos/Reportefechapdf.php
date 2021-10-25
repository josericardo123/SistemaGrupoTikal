<?php

namespace App\Http\Livewire\Cruds\Productos;

use Livewire\Component;
use App\Models\Cruds\Producto;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class Reportefechapdf extends Component
{
    public $poducto;
    public $producto_id;
    public function render()
    {
        return view('livewire.cruds.productos.reportefechapdf');
    }
    
    public function reportefechasPDF(Request $request, Producto $producto){
        $this->producto = $producto;
        $this->producto_id = $producto->id;

        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $fecha_inicio = date("d-m-Y", strtotime($request->fecha_inicio));
        $fecha_fin = date("d-m-Y", strtotime($request->fecha_fin));

        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ],
    [
        'fecha_inicio.required' => "Es necesario ingresar fecha de inicio",
        'fecha_fin.required' => "Es necesario ingresar la fecha fin, para evaluar el rango de fechas"
    ]);

        $reportefechas = DB::table(DB::raw('salidas s'))
        ->select('s.fecha','s.hora','p.nombre_producto','s.cantidad_salida','s.precio')
        ->join(DB::raw('productos p'),'s.producto_id','=','p.id')
        ->whereBetween('s.fecha',[$fecha_inicio,$fecha_fin])
        ->where(function ($query) { $query->where('p.id','=',$this->producto_id);})
        ->get();

        $pdf = PDF::loadView('livewire.cruds.productos.reportefechapdf', compact('reportefechas', 'año', 'hora_actual'));

        return $pdf->stream('Reporte_producto_por_fechas.pdf');
    }
}
