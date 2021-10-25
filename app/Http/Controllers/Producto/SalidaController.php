<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalidaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.salidas.index')->only('index');
        $this->middleware('can:admin.salidas.create')->only('create', 'store');
        $this->middleware('can:admin.salidas.edit')->only('edit', 'update');
        $this->middleware('can:admin.salidas.destroy')->only('destroy');
    }
    public function index()
    {
        return view('cruds.salidas.index');
    }

    public function create()
    {
        return view('cruds.salidas.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
