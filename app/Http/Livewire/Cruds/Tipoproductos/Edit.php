<?php

namespace App\Http\Livewire\Cruds\Tipoproductos;

use App\Models\Cruds\Tipoproducto;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    public $nombre;
    //public $estatus;

    public $tipoproducto;
    public $tipoproducto_id;

    public function mount(Tipoproducto $tipoproducto){
        $this->tipoproducto = $tipoproducto;
        $this->tipoproducto_id = $tipoproducto->id;
        $this->nombre = $tipoproducto->nombre;
        //$this->estatus = $tipoproducto->estatus;

    }

    public function save(){
        $this->validate([
            'nombre' => 'required',
            //'estatus' => 'required'
        ],
        [
            'nombre.required' => 'El campo nombre del tipo producto es requerido',
            //'estatus.required' => 'El campo estatus es requerido'
        ]);

        $this->tipoproducto->update([
            'nombre' => $this->nombre,
            //'estatus' => $this->estatus,
        ]);

        session()->flash('alert-success', '¡El tipo de producto se actualizo con exito!');

    }
    public function render()
    {
        return view('livewire.cruds.tipoproductos.edit');
    }
}
