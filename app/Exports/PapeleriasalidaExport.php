<?php

namespace App\Exports;

use App\Models\Papelerias\Papeleriasalida;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PapeleriasalidaExport implements FromView{
    public function view(): View  {
        $salidas = DB::table(DB::raw('papeleriasalidas s'))
        ->select('s.id','s.fecha','s.hora','p.nombre_producto','s.cantidad_salida','s.precio')
        ->join(DB::raw('papelerias p'),'s.producto_id','=','p.id')
        ->get();

        return view('livewire.papeleria.salidas.papeleriasalidaexcel', compact('salidas'));
    }
}
/*class PapeleriasalidaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    
    public function collection()
    {
        return Papeleriasalida::all();
    }
}*/
