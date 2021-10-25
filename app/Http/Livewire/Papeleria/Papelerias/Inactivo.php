<?php

namespace App\Http\Livewire\Papeleria\Papelerias;

use App\Models\Papelerias\Papeleria;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Inactivo extends Component
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
        ->where('p.estatus', '=', 2)
        ; })
        ->orWhere('producto_codigo', 'LIKE', '%' . $this->search . '%')
        ->orWhere('nombre_producto', 'LIKE', '%' . $this->search. '%')
        ->orWhere('descripcion', 'LIKE', '%' . $this->search . '%')
        ->orWhere('marca', 'LIKE', '%'. $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->cant);
        return view('livewire.papeleria.papelerias.inactivo', compact('papeleria_productos'));
    }

    public function activar(Papeleria $papeleria){
        $this->papeleria = $papeleria;
        $estatus = 1;
       
        DB::table(DB::raw('papelerias p'))
                ->where('p.id','=', $papeleria->id)
                ->update(['p.estatus'=> $estatus]);

         session()->flash('alert-success', 'El producto se dió de alta');
        
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
