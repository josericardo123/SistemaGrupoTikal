<?php

namespace App\Http\Livewire\Cruds\Tipoproductos;

use Livewire\Component;

use App\Models\Cruds\Tipoproducto;
use Illuminate\Support\Facades\DB;

use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '5';
    protected $paginationTheme = 'bootstrap';

    public $tipoproducto;
    public $tipoproducto_id;

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

        $tipoproductos = Tipoproducto::where('nombre', 'like', '%' . $this->search . '%')
                                    ->orderBy($this->sort, $this->direction)
                                    ->paginate($this->cant);

        return view('livewire.cruds.tipoproductos.index', compact('tipoproductos'));
    }

    public function delete(Tipoproducto $tipoproducto){
        $this->tipoproducto = $tipoproducto;
        $this->tipoproducto_id = $tipoproducto->id;

        $consulta = DB::table('productos')->where('tipo_producto_id', '=', $this->tipoproducto_id)->get();
        $contador = count($consulta);

        if($contador > 0){
            session()->flash('alert-warning', 'El tipo de producto esta asociado a un producto, por lo tanto no puede ser eliminado');
        }else{
            $this->tipoproducto->delete($this->tipoproducto->id);

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
