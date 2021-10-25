<?php

namespace App\Http\Livewire\Papeleria\Salidas;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class Papeleriasalidapdf extends Component
{
    public function render()
    {
        return view('livewire.papeleria.salidas.papeleriasalidapdf');
    }

    public function papeleriasalidasPDF(){
        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $salidas = DB::table(DB::raw('papeleriasalidas s'))
        ->select('s.id','s.fecha','s.hora','p.nombre_producto','s.cantidad_salida','s.precio')
        ->join(DB::raw('papelerias p'),'s.producto_id','=','p.id')
        ->get();

        $pdf = PDF::loadView('livewire.papeleria.salidas.papeleriasalidapdf', compact('salidas', 'año', 'hora_actual'));
        return $pdf->stream('Salida_de_productos_papelería.pdf');
    }
}
