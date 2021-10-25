<?php

namespace App\Http\Livewire\Papeleria\Papeleriatipoproducto;

use Livewire\Component;
use App\Models\Papelerias\Papeleriatipoproducto;

class Show extends Component
{
    public $nombre;
    //public $estatus;
    public $papeleriatipoproducto;
    public $papeleriatipoproducto_id;

    public function mount(Papeleriatipoproducto $papeleriatipoproducto){
        $this->papeleriatipoproducto = $papeleriatipoproducto;
        $this->pepeleriatipoproducto_id = $papeleriatipoproducto->id;
        $this->nombre = $papeleriatipoproducto->nombre;
        //$this->estatus = $papeleriatipoproducto->estatus;

    }
    public function render()
    {
        return view('livewire.papeleria.papeleriatipoproducto.show');
    }
}
