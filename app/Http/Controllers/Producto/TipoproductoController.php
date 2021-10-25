<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Models\Cruds\Tipoproducto;
use Illuminate\Http\Request;

class TipoproductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.tipoproductos.index')->only('index');
        $this->middleware('can:admin.tipoproductos.create')->only('create', 'store');
        $this->middleware('can:admin.tipoproductos.edit')->only('edit', 'update');
        $this->middleware('can:admin.tipoproductos.destroy')->only('destroy');
        //$this->middleware('can:admin.tipoproductos.inactivos')->only('inactivos');
    }

    public function index()
    {
        return view('cruds.tipoproductos.index');
    }

    public function create()
    {
        return view('cruds.tipoproductos.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Tipoproducto $tipoproducto)
    {
        return view('cruds.tipoproductos.show', compact('tipoproducto'));
    }

    public function edit(Tipoproducto $tipoproducto)
    {
        return view('cruds.tipoproductos.edit', compact('tipoproducto'));
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
