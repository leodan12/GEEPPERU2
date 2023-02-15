<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\PrincipaleController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DescripcionController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/', [HomeController::class, 'inicio'])->name('inicio');
Route::get('/buscarprod/{nombre}', [HomeController::class, 'busquedaprod'])->name('busquedaprod');
Route::get('/listacategorias', [HomeController::class, 'categorias'])->name('categorias');
Route::get('/listasubcategorias', [HomeController::class, 'subcategorias'])->name('subcategorias');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');


 
Route::get('/preguntasfrecuentes', [HomeController::class, 'index'])->name('preguntas.index');
 
Route::get('/contactanos', [HomeController::class, 'contactanos']);//Registrar
Route::get('/nosotros', [HomeController::class, 'nosotros']);//Registrar
Route::get('/trayectoria', [HomeController::class, 'trayectoria']);//Registrar
Route::get('/principios', [HomeController::class, 'principios']);//Registrar


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
Route::post('/contactanos/store', [HomeController::class, 'store']);//Registrar
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
Route::get('/deletedetallecotizacion/{id}', [CotizacionesController::class, 'destroydetallecotizacion']); //eliminar detalle pregunta


Route::get('/generarcotizacionpdf/{id}', [PdfController::class, 'cotizacion']);//ver

//mostrar los productos por categorias
Route::get('/categoria-producto/{name}',[HomeController::class,'categoriaproducto']);
Route::get('/subcategoria-producto/{name}',[HomeController::class,'subcategoriaproducto']);
//Route::get('/busqueda/{name}',[PrincipaleController::class,'indexbusqueda']);


//gestionar el banner principal
Route::get('/principal/index', [PrincipaleController::class, 'index']);//Registrar
Route::get('/principal/show/{id}', [PrincipaleController::class, 'show']);//ver
Route::get('/principal/create',[PrincipaleController::class,'create']);
Route::post('/principal/store', [PrincipaleController::class, 'store']);//Registrar
Route::get('/principal/{id}/delete', [PrincipaleController::class, 'destroy']);//Actualizar

//mostrar el detalle de los productos 
Route::get('/producto/{name}', [HomeController::class, 'detalleproducto']);//Actualizar

//gestionar los categorias
Route::get('/categoria/create',[CategoriaController::class,'create']);
Route::post('/categoria/store', [CategoriaController::class, 'store']);//Registrar
Route::get('/categoria/index',[CategoriaController::class,'index']);
//Route::get('/categoria/show/{id}', [CategoriasController::class, 'show']);//ver
Route::get('/categoria/{id}/edit', [CategoriaController::class, 'edit']);//Actualizar
Route::post('/categoria/update/{id}', [CategoriaController::class, 'update']);//Registrar
Route::get('/categoria/{id}/delete', [CategoriaController::class, 'destroy']);//Actualizar

Route::get('/deletedetallecategoria/{id}', [CategoriaController::class, 'destroydetallecategoria']); //eliminar detalle pregunta



//gestionar los roles
Route::get('/rol/create',[RoleController::class,'create']);
Route::post('/rol/store', [RoleController::class, 'store']);//Registrar
Route::get('/rol/index',[RoleController::class,'index']);
Route::get('/rol/show/{id}', [RoleController::class, 'show']);//ver
Route::get('/rol/{id}/edit', [RoleController::class, 'edit']);//Actualizar
Route::post('/rol/update/{id}', [RoleController::class, 'update']);//Registrar
Route::get('/rol/{id}/delete', [RoleController::class, 'destroy']);//Actualizar

//gestionar los USUARIOS
Route::get('/usuario/create',[UserController::class,'create']);
Route::post('/usuario/store', [UserController::class, 'store']);//Registrar
Route::get('/usuario/index',[UserController::class,'index']);
Route::get('/usuario/show/{id}', [UserController::class, 'show']);//ver
Route::get('/usuario/{id}/edit', [UserController::class, 'edit']);//Actualizar
Route::post('/usuario/update/{id}', [UserController::class, 'update']);//Registrar
Route::get('/usuario/{id}/delete', [UserController::class, 'destroy']);//Actualizar


// gestionar las descripciones
Route::get('/descripcion/create',[DescripcionController::class,'create']);
Route::post('/descripcion/store', [DescripcionController::class, 'store']);//Registrar
Route::get('/descripcion/index',[DescripcionController::class,'index']);
Route::get('/descripcion/show/{id}', [DescripcionController::class, 'show']);//ver
Route::get('/descripcion/{id}/edit', [DescripcionController::class, 'edit']);//Actualizar
Route::post('/descripcion/update/{id}', [DescripcionController::class, 'update']);//Registrar
Route::get('/descripcion/{id}/delete', [DescripcionController::class, 'destroy']);//Actualizar

Route::get('/deletedetalledescripcion/{id}', [DescripcionController::class, 'destroydetalledescripcion']); //eliminar detalle pregunta



// gestionar los productos
Route::get('/productos/create',[ProductoController::class,'create']);
Route::post('/productos/store', [ProductoController::class, 'store']);//Registrar
Route::get('/productos/index',[ProductoController::class,'index']);
Route::get('/productos/show/{id}', [ProductoController::class, 'show']);//ver
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit']);//Actualizar
Route::post('/productos/update/{id}', [ProductoController::class, 'update']);//Registrar
Route::get('/productos/{id}/delete', [ProductoController::class, 'destroy']);//Actualizar

Route::get('/deletedetallesubcategoria/{id}', [ProductoController::class, 'deletedetallesubcategoria']); //eliminar detalle pregunta
Route::get('/deletedetalleespecificacion/{id}', [ProductoController::class, 'deletedetalleespecificacion']); //eliminar detalle pregunta

// gestionar los imagenes
Route::get('/imagenes/create',[ImagenController::class,'create']);
Route::post('/imagenes/store', [ImagenController::class, 'store']);//Registrar
Route::get('/imagenes/index',[ImagenController::class,'index']);
Route::get('/imagenes/show/{id}', [ImagenController::class, 'show']);//ver 
Route::get('/imagenes/{id}/delete', [ImagenController::class, 'destroy']);//Actualizar
 

//----------------------------RUTAS DE LEANDRO ------------------------------



Auth::routes();

Route::get('/micuenta', [UserController::class, 'micuenta'])->name('micuenta');

Route::get('/welcome', function () {
    return view('welcome');
});
 