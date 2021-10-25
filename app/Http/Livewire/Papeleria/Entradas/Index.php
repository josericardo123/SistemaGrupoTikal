<?php

namespace App\Http\Livewire\Papeleria\Entradas;

use Livewire\Component;
use Livewire\WithPagination;


use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;

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

        $entradas = DB::table(DB::raw('papeleriaentradas e'))
        ->select('e.id','e.fecha','e.hora','p.nombre_producto','e.cantidad_entrada','e.precio')
        ->join(DB::raw('papelerias p'),'e.producto_id','=','p.id')
        ->orWhere('fecha', 'LIKE', '%' . $this->search . '%')
        ->orWhere('cantidad_entrada', 'LIKE', '%' . $this->search. '%')
        ->orWhere('precio', 'LIKE', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->cant);
        return view('livewire.papeleria.entradas.index', compact('entradas'));
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
