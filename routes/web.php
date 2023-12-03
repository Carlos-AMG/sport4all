<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\UserController;
use App\Models\Factura;
use Illuminate\Support\Facades\Route;
use App\Models\Producto;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Solicitar que el usuario inicie sesion para las rutas
// Route::middleware('auth')->group(function(){
//     Route::resource('producto', ProductoController::class);
//     Route::resource('departamento',Departamento::class);
// });
// Route::resource('producto', ProductoController::class)->middleware('auth');
// Route::resource('departamento',Departamento::class)->middleware('auth');

Route::resource('producto', ProductoController::class);

// Route::get('/api/products/all', [ProductoController::class, 'getAllProductsApi']);
Route::get('/api/products/all', [ProductoController::class, 'getAllProductsApi'])->name('api.products.all');

Route::get('/allProducts', [ProductoController::class,'allProducts']);
Route::get('/deletedProducts', [ProductoController::class,'eliminados']);

Route::resource('departamento',DepartamentoController::class)->middleware('auth.admin');
Route::resource('empleado',EmpleadoController::class)->middleware('auth.admin');
Route::resource('factura',FacturaController::class);
Route::resource('/informacion',InformacionController::class);

Route::get('/', [InformacionController::class,'index']);
Route::get('/contactUs',[InformacionController::class,'contactUs']);
Route::get('/aboutUs',[InformacionController::class,'aboutUs']);


Route::get('/cart', [CartController::class, 'viewCart']);
Route::get('/factura',[UserController::class,'facturas'])->name('factura');
Route::get('/pay',[CartController::class, 'pay'])->name('pay');
// Route::get('/descargarFactura', [UserController::class, 'descargar_factura'])->name('descargarFactura');
Route::get('descargarFactura/{factura}', [UserController::class, 'descargar_factura'])->name('descargarFactura');
Route::get('profile',[UserController::class, 'profile'])->name('showProfile');


Route::get('prueba',function(){
    return view('prueba');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::get('/admin',[AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/informacion', [InformacionController::class,'index']);
});
