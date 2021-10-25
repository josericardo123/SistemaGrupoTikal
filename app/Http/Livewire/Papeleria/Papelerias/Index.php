<?php

namespace App\Http\Livewire\Papeleria\Papelerias;

use Livewire\Component;

use App\Models\Papelerias\Papeleria;

use Livewire\WithPagination;

use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;

    public $tipoproducto_id;

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
        $papeleria_productos = DB::table(DB::raw('papelerias p'))
        ->select('p.id','p.producto_codigo','p.nombre_producto','p.descripcion','p.marca','t.nombre','p.entradas','p.salidas','p.total','p.precio_unidad', 'p.estatus')
        ->join(DB::raw('papeleriatipoproductos t'),function($join) {$join->on('p.tipo_producto_id','=','t.id')
        ->where('p.estatus', '=', 1)
        ; })
        ->orWhere('producto_codigo', 'LIKE', '%' . $this->search . '%')
        ->orWhere('nombre_producto', 'LIKE', '%' . $this->search. '%')
        ->orWhere('descripcion', 'LIKE', '%' . $this->search . '%')
        ->orWhere('marca', 'LIKE', '%'. $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->cant);
        return view('livewire.papeleria.papelerias.index', compact('papeleria_productos'));
    }

    public function delete(Papeleria $papeleria){
        $this->papeleria  = $papeleria;
        $this->papeleria_id = $papeleria->id;

        $this->papeleria->delete($this->papeleria_id);

        session()->flash('alert-success', 'Producto eliminado con éxito');
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
