<?php

namespace App\Http\Livewire\Cruds\Entradas;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class Entradapdf extends Component
{
    public function render()
    {
        return view('livewire.cruds.entradas.entradapdf');
    }

    public function entradasPDF(){

        $año = Carbon::now();

        $this->hora = Carbon::now();
        $hora_actual = $this->hora->format('H:i:s');

        $entradas = DB::table(DB::raw('entradas e'))
        ->select('e.id','e.fecha','e.hora','p.nombre_producto','e.cantidad_entrada','e.precio')
        ->join(DB::raw('productos p'),'e.producto_id','=','p.id')
        //->join(DB::raw('proveedors pr'),'e.proveedor_id','=','pr.id')
        ->get();

        $pdf = PDF::loadView('livewire.cruds.entradas.entradapdf', compact('entradas', 'año', 'hora_actual'));
        return $pdf->stream('Entrada_de_productos.pdf');
    }
}
