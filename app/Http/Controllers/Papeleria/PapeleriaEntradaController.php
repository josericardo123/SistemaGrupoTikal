<?php

namespace App\Http\Controllers\Papeleria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PapeleriaEntradaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.papeleriaentradas.index')->only('index');
        $this->middleware('can:admin.papeleriaentradas.create')->only('create', 'store');
        $this->middleware('can:admin.papeleriaentradas.edit')->only('edit', 'update');
        $this->middleware('can:admin.papeleriaentradas.destroy')->only('destroy');
    }

    public function index()
    {
        return view('papeleria.entradas.index');
    }


    public function create()
    {
        //
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
