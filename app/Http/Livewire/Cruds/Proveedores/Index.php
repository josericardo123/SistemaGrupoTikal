<?php

namespace App\Http\Livewire\Cruds\Proveedores;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cruds\Proveedor;

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
        $proveedores = Proveedor::where('nombre', 'LIKE', '%' . $this->search  . '%')
                                ->orWhere('direccion', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('telefono', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                                ->orderBy($this->sort, $this->direction)
                                ->paginate($this->cant);
        return view('livewire.cruds.proveedores.index', compact('proveedores'));
    }

    public function delete(Proveedor $proveedore){
 
        $proveedore->delete();

        session()->flash('alert-success', 'Proveedor eliminado con éxito');
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
