<?php

namespace App\Http\Livewire\Cruds\Salidas;

use Livewire\Component;
use App\Exports\SalidasExport;
use Maatwebsite\Excel\Facades\Excel;

class Salidaexcel extends Component
{
    public function render()
    {
        return view('livewire.cruds.salidas.salidaexcel');
    }

    public function salidasEXCEL(){
        return EXCEL::download(new SalidasExport, 'Salida_de_productos.xlsx');
    }
}
