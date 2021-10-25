<?php

namespace App\Http\Livewire\Papeleria\Entradas;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PapeleriaentradaExport;

class Papeleriaentradaexcel extends Component
{
    public function render()
    {
        return view('livewire.papeleria.entradas.papeleriaentradaexcel');
    }

    public function papeleriaentradasEXCEL(){
        return Excel::download(new PapeleriaentradaExport, 'Entrada_de_productos_papeleria.xlsx');
    }
}
