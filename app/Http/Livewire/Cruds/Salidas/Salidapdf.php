<?php

namespace App\Http\Livewire\Cruds\Salidas;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class Salidapdf extends Component
{
    public function render()
    {
        return view('livewire.cruds.salidas.salidapdf');
    }

    public function salidasPDF(){
        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $salidas = DB::table(DB::raw('salidas s'))
        ->select('s.id','s.fecha','s.hora','p.nombre_producto','s.cantidad_salida','s.precio')
        ->join(DB::raw('productos p'),'s.producto_id','=','p.id')
        ->get();

        $pdf = PDF::loadView('livewire.cruds.salidas.salidapdf', compact('salidas', 'año', 'hora_actual'));
        return $pdf->stream('Salidas_de_productos.pdf');
    }
}
