<?php

namespace App\Http\Livewire\Papeleria\Salidas;

use Livewire\Component;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PapeleriasalidaExport;

class Papeleriasalidaexcel extends Component
{
    public function render()
    {
        return view('livewire.papeleria.salidas.papeleriasalidaexcel');
    }

    public function papeleriasalidasEXCEL(){
        return Excel::download(new PapeleriasalidaExport, 'Salida_de_productos_papelería.xlsx');
    }
}
