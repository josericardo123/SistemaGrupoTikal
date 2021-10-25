<?php

namespace App\Http\Controllers\Papeleria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Papelerias\Papeleria;

class PapeleriaProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.papelerias.index')->only('index');
        $this->middleware('can:admin.papelerias.create')->only('create', 'store');
        $this->middleware('can:admin.papelerias.edit')->only('edit', 'update');
        $this->middleware('can:admin.papelerias.destroy')->only('destroy');
        $this->middleware('can:admin.papelerias.inactivo')->only('inactivo');
    }

    public function index()
    {
        return view('papeleria.papelerias.index');
    }


    public function create()
    {
        return view('papeleria.papelerias.create');
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Papeleria $papeleria)
    {
        return view('papeleria.papelerias.show', compact('papeleria'));
    }

    public function edit(Papeleria $papeleria)
    {
        return view('papeleria.papelerias.edit', compact('papeleria'));
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function inactivo(){
        return view('papeleria.papelerias.inactivo');
    }
}
