<?php

namespace App\Exports;

use App\Models\Cruds\Entrada;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EntradasExport implements FromView
{

    public function view(): View 
    {
        $entradas = DB::table(DB::raw('entradas e'))
        ->select('e.id','e.fecha','e.hora','p.nombre_producto','pr.nombre','e.cantidad_entrada','e.precio')
        ->join(DB::raw('productos p'),'e.producto_id','=','p.id')
        ->join(DB::raw('proveedors pr'),'e.proveedor_id','=','pr.id')
        ->get();
        
        return view('livewire.cruds.entradas.entradaexcel', compact('entradas'));
    }
}
/*class EntradasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    
    public function collection()
    {
        return DB::table(DB::raw('entradas e'))
        ->select('e.id','e.fecha','p.nombre_producto','e.cantidad_entrada','e.precio')
        ->join(DB::raw('productos p'),'e.producto_id','=','p.id')
        ->get();
    }
}*/
