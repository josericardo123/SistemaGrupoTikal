<?php

namespace App\Http\Livewire\Papeleria\Papelerias;

use Livewire\Component;
use App\Models\Papelerias\Papeleria;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class Consumoproductopapeleriapdf extends Component
{
    public $papeleria;
    public $papeleria_id;

    public function render()
    {
        return view('livewire.papeleria.papelerias.consumoproductopapeleriapdf');
    }

    public function consumoproductosPDF(Papeleria $papeleria){
        $this->papeleria = $papeleria;
        $this->papeleria_id = $papeleria->id;

        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $consumoproductos = DB::table(DB::raw('papeleriasalidas s'))
        ->select('s.fecha','s.hora','p.nombre_producto','s.cantidad_salida','s.precio')
        ->join(DB::raw('papelerias p'),function($join) {$join->on('s.producto_id','=','p.id')
        
        ->where('p.id','=',$this->papeleria_id)
        ; })
        ->get();

        $pdf = PDF::loadView('livewire.papeleria.papelerias.consumoproductopapeleriapdf', compact('consumoproductos', 'año', 'hora_actual'));
        return $pdf->stream('Consumo_de_producto_papelería.pdf');
    }
}
