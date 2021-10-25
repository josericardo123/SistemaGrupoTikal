<?php

namespace App\Http\Livewire\Cruds\Productos;

use Livewire\Component;

use App\Models\Cruds\Producto;

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
        /*$productos = Producto::where('producto_codigo', 'like', '%' . $this->search . '%')
                            ->orWhere('nombre_producto', 'like', '%' . $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate($this->cant);*/

        $productos = DB::table(DB::raw('productos p'))
        ->select('p.id','p.producto_codigo','p.nombre_producto','p.descripcion','p.marca','t.nombre','p.entradas','p.salidas','p.total','p.precio_unidad', 'p.estatus')
        ->join(DB::raw('tipoproductos t'),function($join) {$join->on('p.tipo_producto_id','=','t.id')
        ->where('p.estatus', '=', 1)
        ; })
        ->orWhere('producto_codigo', 'LIKE', '%' . $this->search . '%')
        ->orWhere('nombre_producto', 'LIKE', '%' . $this->search. '%')
        ->orWhere('descripcion', 'LIKE', '%' . $this->search . '%')
        ->orWhere('marca', 'LIKE', '%'. $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->cant);

        return view('livewire.cruds.productos.index', compact('productos'));
    }

    public function delete(Producto $producto){


        $this->producto = $producto;
        $this->producto_id = $producto->id;
        //$this->tipoproducto_id = $producto->tipo_producto_id;

        $this->producto->delete($this->producto->id);

        //$this->emit('alert', '¡Producto eliminado con éxito!');

        session()->flash('alert-success', '¡Producto eliminado con exito!');

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
