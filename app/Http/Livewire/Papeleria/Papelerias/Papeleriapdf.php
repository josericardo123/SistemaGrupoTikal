<?php

namespace App\Http\Livewire\Papeleria\Papelerias;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class Papeleriapdf extends Component
{
    public function render()
    {
        return view('livewire.papeleria.papelerias.papeleriapdf');
    }

    public function papeleriaPDF(){

        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $papelerias = DB::table(DB::raw('papelerias p'))
        ->select('p.id','p.producto_codigo','p.nombre_producto','p.descripcion','p.marca','t.nombre','p.entradas','p.salidas','p.total','p.estatus')
        ->join(DB::raw('papeleriatipoproductos t'),function($join) {$join->on('p.tipo_producto_id','=','t.id')
        
        ->where('p.estatus','=',1)
        ; })
        ->get();

        $pdf = PDF::loadView('livewire.papeleria.papelerias.papeleriapdf', compact('papelerias', 'año', 'hora_actual'));
        return $pdf->stream('Productos_Papeleria.pdf');
    }
}
