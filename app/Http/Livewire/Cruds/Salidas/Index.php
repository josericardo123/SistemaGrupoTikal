<?php

namespace App\Http\Livewire\Cruds\Salidas;

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

    public function render()
    {
        $salidas = DB::table(DB::raw('salidas s'))
            ->select('s.id','s.fecha','s.hora','p.nombre_producto','s.cantidad_salida','s.precio')
            ->join(DB::raw('productos p'),'s.producto_id','=','p.id')
            ->orWhere('fecha', 'LIKE', '%' . $this->search . '%')
            ->orWhere('cantidad_salida', 'LIKE', '%' . $this->search. '%')
            ->orWhere('precio', 'LIKE', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);

        return view('livewire.cruds.salidas.index', compact('salidas'));
    }
}
