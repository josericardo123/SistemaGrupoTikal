<?php

namespace App\Http\Livewire\Cruds\Entradas;

use App\Exports\EntradasExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Entradaexcel extends Component
{
    public function render()
    {
        return view('livewire.cruds.entradas.entradaexcel');
    }

    public function entradasEXCEL(){
        return Excel::download(new EntradasExport, 'Entrada_de_productos.xlsx');
    }
}
