<?php

namespace App\Http\Controllers\Papeleria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Papelerias\Papeleriatipoproducto;

class PapeleriaTipoProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.papeleriatipoproductos.index')->only('index');
        $this->middleware('can:admin.papeleriatipoproductos.create')->only('create', 'store');
        $this->middleware('can:admin.papeleriatipoproductos.edit')->only('edit', 'update');
        $this->middleware('can:admin.papeleriatipoproductos.destroy')->only('destroy');
    }
    public function index()
    {
        return view('papeleria.papeleriatipoproductos.index');
    }

    public function create()
    {
        return view('papeleria.papeleriatipoproductos.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Papeleriatipoproducto $papeleriatipoproducto)
    {
        return view('papeleria.papeleriatipoproductos.show', compact('papeleriatipoproducto'));
    }


    public function edit(Papeleriatipoproducto $papeleriatipoproducto)
    {
        return view('papeleria.papeleriatipoproductos.edit', compact('papeleriatipoproducto'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
