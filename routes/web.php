<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\PrincipaleController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PrincipaleController::class, 'inicio'])->name('inicio');
Route::get('/listacategorias', [CategoriaController::class, 'categorias'])->name('categorias');
Route::get('/listasubcategorias', [CategoriaController::class, 'subcategorias'])->name('subcategorias');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');


//Route::view('/nosotros', 'nosotros.sobrenosotros');
//Route::view('/trayectoria', 'nosotros.nuestratrayectoria');
//Route::view('/principios', 'nosotros.principios');
//Route::view('/preguntasfrecuentes', 'nosotros.preguntasfrecuentes');

Route::get('/preguntasfrecuentes', [PreguntasController::class, 'index'])->name('preguntas.index');
//Route::view('/contactanos', 'nosotros.contacto.contactanos');

Route::get('/contactanos', [ContactanosController::class, 'contactanos']);//Registrar
Route::get('/nosotros', [ContactanosController::class, 'nosotros']);//Registrar
Route::get('/trayectoria', [ContactanosController::class, 'trayectoria']);//Registrar
Route::get('/principios', [ContactanosController::class, 'principios']);//Registrar
Route::get('/preguntasfrecuentes', [ContactanosController::class, 'preguntasfrecuentes']);//Registrar


//gestionar los preguntas
Route::get('/pregunta/create',[PreguntasController::class,'create']);
Route::post('/pregunta/store', [PreguntasController::class, 'store']);//Registrar
Route::get('/pregunta/index',[PreguntasController::class,'lista']);
//Route::get('/pregunta/show/{id}', [PreguntasController::class, 'show']);//ver
Route::get('/pregunta/{id}/edit', [PreguntasController::class, 'edit']);//Actualizar
Route::post('/pregunta/update/{id}', [PreguntasController::class, 'update']);//Registrar
Route::get('/pregunta/{id}/delete', [PreguntasController::class, 'destroy']);//Actualizar

Route::get('/deletedetallepregunta/{id}', [PreguntasController::class, 'destroydetallepregunta']); //eliminar detalle pregunta

//gestionar los preguntas
Route::post('/contactanos/store', [ContactanosController::class, 'store']);//Registrar
Route::get('/contactanos/index', [ContactanosController::class, 'index']);//Registrar
Route::get('/contactanos/{id}/edit', [ContactanosController::class, 'edit']);//Actualizar
Route::post('/contactanos/update/{id}', [ContactanosController::class, 'update']);//Registrar
Route::get('/contactanos/{id}/delete', [ContactanosController::class, 'destroy']);//Actualizar

//gestionar las cotizaciones
Route::get('/cotizacion/create',[CotizacionesController::class,'create']);
Route::post('/cotizacion/store', [CotizacionesController::class, 'store']);//Registrar
Route::get('/cotizacion/index', [CotizacionesController::class, 'index']);//Registrar
Route::get('/cotizacion/{id}/edit', [CotizacionesController::class, 'edit']);//Actualizar
Route::post('/cotizacion/update/{id}', [CotizacionesController::class, 'update']);//Registrar
Route::get('/cotizacion/{id}/delete', [CotizacionesController::class, 'destroy']);//Actualizar
Route::get('/cotizacion/show/{id}', [CotizacionesController::class, 'show']);//ver

Route::get('/generarcotizacionpdf/{id}', [PdfController::class, 'cotizacion']);//ver

//mostrar los productos por categorias
Route::get('/categoria-producto/{name}',[CategoriaController::class,'categoriaproducto']);
Route::get('/subcategoria-producto/{name}',[CategoriaController::class,'subcategoriaproducto']);
//Route::get('/busqueda/{name}',[PrincipaleController::class,'indexbusqueda']);


//mostrar los productos por categorias
Route::get('/principal/index', [PrincipaleController::class, 'index']);//Registrar
Route::get('/principal/show/{id}', [PrincipaleController::class, 'show']);//ver
Route::get('/principal/create',[PrincipaleController::class,'create']);
Route::post('/principal/store', [PrincipaleController::class, 'store']);//Registrar
Route::get('/principal/{id}/delete', [PrincipaleController::class, 'destroy']);//Actualizar

//mostrar el detalle de los productos 
Route::get('/producto/{name}', [PrincipaleController::class, 'detalleproducto']);//Actualizar

//----------------------------RUTAS DE LEANDRO ------------------------------



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/welcome', function () {
    return view('welcome');
});
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);
    
    // Category Routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
    });
    
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create','create');
        Route::post('/products','store');
    });
    
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);
});