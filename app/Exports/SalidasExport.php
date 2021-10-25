<?php

namespace App\Exports;

use App\Models\Cruds\Salida;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

/*class SalidasExport implements FromCollection
{
    public function collection()
    {
        return Salida::all();
    }
}*/

class SalidasExport implements FromView 
{
    public function view(): view
    {
        $salidas = DB::table(DB::raw('entradas e'))
        ->select('e.id','e.fecha','e.hora','p.nombre_producto','e.cantidad_entrada','e.precio')
        ->join(DB::raw('productos p'),'e.producto_id','=','p.id')
        ->get();
        return view('livewire.cruds.salidas.salidaexcel', compact('salidas'));
    }
}
