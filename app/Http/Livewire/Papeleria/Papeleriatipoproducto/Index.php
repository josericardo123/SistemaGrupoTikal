<?php

namespace App\Http\Livewire\Papeleria\Papeleriatipoproducto;

use App\Models\Papelerias\Papeleriatipoproducto;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $papeleriatipoproducto;
    public $papeleriatipoproducto_id;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '5';
    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'cant' => ['except' => '5']
    ];

    protected $listeners = ['delete'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
     
        $tipoproductos = Papeleriatipoproducto::where('nombre', 'like', '%' . $this->search . '%')
                                    ->orderBy($this->sort, $this->direction)
                                    ->paginate($this->cant);   
        return view('livewire.papeleria.papeleriatipoproducto.index', compact('tipoproductos'));
    }

    public function delete(Papeleriatipoproducto $papeleriatipoproducto){
        $this->papeleriatipoproducto = $papeleriatipoproducto;
        $this->papeleriatipoproducto_id = $papeleriatipoproducto->id;

        $consulta = DB::table('papelerias')->where('tipo_producto_id', '=', $this->papeleriatipoproducto_id)->get();
        $contador = count($consulta);

        if($contador > 0){
            session()->flash('alert-warning', 'El tipo de producto esta asociado a un producto, por lo tanto no puede ser eliminado');
        }else{
            $this->papeleriatipoproducto->delete($this->papeleriatipoproducto_id);

            session()->flash('alert-success', '¡Tipo producto eliminado con exito!');
        }
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
