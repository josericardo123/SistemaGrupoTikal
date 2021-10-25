<?php

namespace App\Http\Livewire\Papeleria\Entradas;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
class Papeleriaentradapdf extends Component
{
    public function render()
    {
        return view('livewire.papeleria.entradas.papeleriaentradapdf');
    }

    public function papeleriaentradasPDF(){
        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $entradas = DB::table(DB::raw('papeleriaentradas e'))
        ->select('e.id','e.fecha','e.hora','p.nombre_producto','e.cantidad_entrada','e.precio')
        ->join(DB::raw('papelerias p'),'e.producto_id','=','p.id')
        ->get();

        $pdf = PDF::loadView('livewire.papeleria.entradas.papeleriaentradapdf', compact('entradas', 'año', 'hora_actual'));
        return $pdf->stream('Entrada_de_productos_papelería.pdf');
    }
}
