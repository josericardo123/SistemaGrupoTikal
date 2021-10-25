<?php

namespace App\Exports;

use App\Models\Papelerias\Papeleriaentrada;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PapeleriaentradaExport implements FromView {
    public function view(): View {
        $entradas = DB::table(DB::raw('papeleriaentradas e'))
        ->select('e.id','e.fecha','e.hora','p.nombre_producto','e.cantidad_entrada','e.precio')
        ->join(DB::raw('papelerias p'),'e.producto_id','=','p.id')
        ->get();

        return view('livewire.papeleria.entradas.papeleriaentradaexcel', compact('entradas'));
    }
}

/*class PapeleriaentradaExport implements FromCollection
{

    
    //@return \Illuminate\Support\Collection
    
    public function collection()
    {
        return Papeleriaentrada::all();
    }
}*/
