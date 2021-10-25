<?php

namespace App\Http\Livewire\Cruds\Tipoproductos;

use App\Models\Cruds\Tipoproducto;
use Livewire\Component;

class Show extends Component
{

    public $nombre;
    //public $estatus;
    public $tipoproducto;
    public $tipoproducto_id;

    public function mount(Tipoproducto $tipoproducto){
        $this->tipoproducto = $tipoproducto;
        $this->producto_id = $tipoproducto->id;
        $this->nombre = $tipoproducto->nombre;
        //$this->estatus = $tipoproducto->estatus;

    }
    public function render()
    {
        return view('livewire.cruds.tipoproductos.show');
    }
}
