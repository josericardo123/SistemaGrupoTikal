<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

//Inventarío cafetería
use App\Http\Controllers\Producto\ProductoController;
use App\Http\Controllers\Producto\TipoproductoController;
use App\Http\Controllers\Producto\ProveedorController;
use App\Http\Controllers\Producto\EntradaController;
use App\Http\Controllers\Producto\SalidaController;

use App\Http\Livewire\Cruds\Productos\Productopdf;
use App\Http\Livewire\Cruds\Entradas\Entradapdf;
use App\Http\Livewire\Cruds\Salidas\Salidapdf;
use App\Http\Livewire\Cruds\Productos\Consumoproductopdf;
use App\Http\Livewire\Cruds\Productos\Reportefechapdf;

use App\Http\Livewire\Cruds\Entradas\Entradaexcel;
use App\Http\Livewire\Cruds\Salidas\Salidaexcel;

//Inventarío papelería
use App\Http\Controllers\Papeleria\PapeleriaProductoController;
use App\Http\Controllers\Papeleria\PapeleriaTipoProductoController;
use App\Http\Controllers\Papeleria\PapeleriaEntradaController;
use App\Http\Controllers\Papeleria\PapeleriaSalidaController;

use App\Http\Livewire\Papeleria\Papelerias\Papeleriapdf;
use App\Http\Livewire\Papeleria\Entradas\Papeleriaentradapdf;
use App\Http\Livewire\Papeleria\Salidas\Papeleriasalidapdf;
use App\Http\Livewire\Papeleria\Papelerias\Consumoproductopapeleriapdf;
use App\Http\Livewire\Papeleria\Papelerias\Reportefechapapeleria;

use App\Http\Livewire\Papeleria\Entradas\Papeleriaentradaexcel;
use App\Http\Livewire\Papeleria\Salidas\Papeleriasalidaexcel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::group(['middleware' => ['auth']], function(){
    Route::get('profile/username', [UserController::class, 'perfil'])->name('perfil-user');
    Route::post('update/profile', [UserController::class, 'updatePerfil'])->name('update-perfil');
    Route::resource('users', UserController::class)->only('index', 'edit', 'update', 'create')->names('admin.users');
    Route::resource('roles', RoleController::class)->names('admin.roles');

    //Inventario Cafetería
    Route::resource('productos', ProductoController::class)->names('admin.productos');
    Route::resource('tipoproductos', TipoproductoController::class)->names('admin.tipoproductos');
    Route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');
    Route::resource('entradas/', EntradaController::class)->names('admin.entradas');
    Route::resource('salidas', SalidaController::class)->names('admin.salidas');
    Route::get('productos-inactivos', [ProductoController::class, 'inactivo'])->name('productos-inactivos');


    //PDF´s inventario cafetería
    Route::get('download-productos-pdf', [Productopdf::class, 'productoPDF'])->name('reporte-producto.pdf');
    Route::get('download-entradas-pdf', [Entradapdf::class, 'entradasPDF'])->name('reporte-entradas.pdf');
    Route::get('download-salidas-pdf', [Salidapdf::class, 'salidasPDF'])->name('reporte-salidas.pdf');

    Route::get('download-consumoproducto-pdf/{producto}', [Consumoproductopdf::class, 'consumoproductosPDF'])->name('reporte-consumoproducto.pdf');
    Route::get('download-reporte-fechas-pdf/{producto}', [Reportefechapdf::class, 'reportefechasPDF'])->name('reportefechas.pdf');
    
    //EXCELL´s inventario cafetería
    Route::get('download-entradas-excel', [Entradaexcel::class, 'entradasEXCEL'])->name('reporte-entradas.excel');
    Route::get('download-salidas-excel', [Salidaexcel::class, 'salidasEXCEL'])->name('reporte-salidas.excel');

    //Inventario Papelería
    Route::resource('papelerias', PapeleriaProductoController::class)->names('admin.papelerias');
    Route::resource('papeleriatipoproductos', PapeleriaTipoProductoController::class)->names('admin.papeleriatipoproductos');
    Route::resource('papeleriaentradas', PapeleriaEntradaController::class)->names('admin.papeleriaentradas');
    Route::resource('papeleriasalidas', PapeleriaSalidaController::class)->names('admin.papeleriasalidas');
    Route::get('papeleria-productos-inactivo', [PapeleriaProductoController::class, 'inactivo'])->name('papeleria-productos-inactivos');

    //PDF´s inventario pepelería
    Route::get('download-papelerias-pdf', [Papeleriapdf::class, 'papeleriaPDF'])->name('reporte-papeleria.pdf');
    Route::get('download-papeleria-entradas-pdf', [Papeleriaentradapdf::class, 'papeleriaentradasPDF'])->name('reporte-papeleriaentradas.pdf');
    Route::get('download-papeleria-salidas-pdf', [Papeleriasalidapdf::class, 'papeleriasalidasPDF'])->name('reporte-papeleriasalidas.pdf');

    Route::get('download-consumoproducto-papeleria-pdf/{papeleria}', [Consumoproductopapeleriapdf::class, 'consumoproductosPDF'])->name('reporte-consumoproducto-papeleria.pdf');
    Route::get('download-reporte-fechas-papeleria/{papeleria}', [Reportefechapapeleria::class, 'reportefechasPDF'])->name('reportefechaspapeleria.pdf');

    //EXCELL´s inventario pepelería
    Route::get('dounload-papeleria-entradas-excel', [Papeleriaentradaexcel::class, 'papeleriaentradasEXCEL'])->name('reporte-papeleriaentradas.excel');
    Route::get('download-papeleria-salidas-excel', [Papeleriasalidaexcel::class, 'papeleriasalidasEXCEL'])->name('reporte-papeleriasalidas.excel');


});
