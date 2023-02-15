<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Principale;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Imagen;
use App\Models\Preguntas;
use App\Models\Respuestas;
use App\Models\Contactanos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function inicio(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        // $principal = Principale::orderBy('id', 'desc')->get();
        $principal = DB::table('principales as p')
            ->select('p.id', 'p.nombre', 'p.imagen')
            ->where('p.estado', '=', 1)
            ->orderBy('id', 'desc')
            ->get();

        $categorias = DB::table('categorias as c')
            ->join('subcategorias as sc', 'sc.categoria_id', '=', 'c.id')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('productos as p', 'dsp.producto_id', '=', 'p.id')
            ->select('c.id as idcategoria', 'c.nombre as nombre', DB::raw('count(p.id) as producto'))
            ->groupBy('idcategoria', 'nombre')
            ->orderBy('producto', 'desc')
            //->where('p.name','like',"%$buscarpor%")
            ->distinct('nombre')
            ->get();

        $productos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select(
                'p.id',
                'sc.id as idsubcategoria ',
                'sc.categoria_id as idcategoria',
                'p.oferta',
                'p.marca',
                'p.price',
                'p.porcentajedescuento',
                'p.descripcion',
                'dsp.subcategoria_id',
                'p.stock',
                'p.image_path',
                'p.name'
            )
            //->orderBy('p.stock','desc')
            ->where('p.stock', '>', 0)
            ->where('p.name', 'like', "%$buscarpor%")
            ->get();

        $productosbusqueda = DB::table('productos as p')
            ->where('p.stock', '>', 0)
            ->where('p.name', 'like', "%$buscarpor%")
            ->distinct('p.name')
            ->get();

        //$unique_products = $productos->unique('p.id');

        //return $productosbusqueda;

        return view('inicio2')->with([
            'productos' => $productos, 'categorias' => $categorias,
            'principal' => $principal, 'buscarpor' => $buscarpor,
            'productosbusqueda' => $productosbusqueda
        ]);
    }

    public function busquedaprod($nombre)
    {
        $productos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select(
                'p.id',
                'sc.id as idsubcategoria ',
                'sc.categoria_id as idcategoria',
                'p.oferta',
                'p.marca',
                'p.price',
                'p.porcentajedescuento',
                'p.descripcion',
                'dsp.subcategoria_id',
                'p.stock',
                'p.image_path',
                'p.name'
            )
            //->orderBy('p.stock','desc')
            ->where('p.stock', '>', 0)
            ->take(3)
            ->where('p.name', 'like', "%$nombre%")
            ->distinct('p.name')
            ->get();

        $productosbusqueda = DB::table('productos as p')
            ->where('p.stock', '>', 0)
            ->where('p.name', 'like', "%$nombre%")
            ->distinct('p.name')
            ->take(3)
            ->get();

        //$unique_products = $productos->unique('p.id');

        //return $productosbusqueda;

        return $productosbusqueda;
    }


    public function detalleproducto($name, Request $request)
    {
        $buscarpor = $request->get('buscarproducto');

        $product = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select('p.id', 'p.image_path', 'p.name', 'c.nombre as categoria', 'sc.nombre as subcategoria')
            ->where('p.name', '=', $name)->first();

        $relacionados = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select(
                'p.id as idproducto',
                'p.name',
                'p.price',
                'p.image_path',
                'p.marca',
                'p.oferta',
                'p.porcentajedescuento',
                'p.descripcion',
                'p.stock'
            )
            ->distinct('p.id')
            ->where('p.stock', '>', 0)
            ->where('sc.nombre', '=', $product->subcategoria)
            ->where('p.id', '!=', $product->id)
            ->orderby('p.porcentajedescuento', 'desc')
            ->take(5)
            ->get();

        $producto = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select(
                'p.id',
                'c.nombre as categoria',
                'p.oferta',
                'p.marca',
                'p.price',
                'p.porcentajedescuento',
                'p.descripcion',
                'sc.nombre as subcategoria',
                'p.stock',
                'p.image_path',
                'p.name as producto'
            )
            ->where('p.name', '=', $name)
            ->get();

        $descripcion = DB::table('productos as p')
            ->join('detalle_especificacions as de', 'de.producto_id', '=', 'p.id')
            ->join('especificacions as e', 'de.especificacion_id', '=', 'e.id')
            ->join('descripcions as d', 'e.descripcion_id', '=', 'd.id')
            ->select('d.descripcion')
            ->where('p.id', '=', $product->id)
            ->distinct('d.descripcion')
            ->get();
        $especificacion = DB::table('productos as p')
            ->join('detalle_especificacions as de', 'de.producto_id', '=', 'p.id')
            ->join('especificacions as e', 'de.especificacion_id', '=', 'e.id')
            ->join('descripcions as d', 'e.descripcion_id', '=', 'd.id')
            ->select('d.descripcion', 'e.especificacion', 'de.dato')
            ->where('p.id', '=', $product->id)
            ->get();

        $productosbusqueda = DB::table('productos as p')
            ->where('p.stock', '>', 0)
            ->where('p.name', 'like', "%$buscarpor%")
            ->distinct('p.name')
            ->get();

        $imagenes = DB::table('imagens as i')
            ->select('i.id', 'i.imagen', 'i.producto_id')
            ->where('i.producto_id', '=', $product->id)
            ->get();

        $num_imagenes = $imagenes->count();

        $imagen = new Imagen;
        $imagen->id = $num_imagenes + 1;
        $imagen->producto_id = $product->id;
        $imagen->imagen =  $product->image_path;
        $imagenes->add($imagen);


        // return $imagenes;


        //return $descripcion;
        return view('pagina/detalleproducto')->with([
            'producto' => $producto, 'relacionados' => $relacionados,
            'descripcion' => $descripcion, 'especificacion' => $especificacion,
            'buscarpor' => $buscarpor,
            'productosbusqueda' => $productosbusqueda,
            'imagenes' => $imagenes
        ]);
    }

    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        $preguntas = Preguntas::All();
        $respuestas = Respuestas::All();

        return view('nosotros.preguntasfrecuentes', [
            'respuestas' => $respuestas,
            'preguntas' => $preguntas, 'buscarpor' => $buscarpor
        ]);
    }

    public function contactanos(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        return view("nosotros/contacto/contactanos", ['buscarpor' => $buscarpor]);
    }

    public function nosotros(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        return view("nosotros/sobrenosotros", ['buscarpor' => $buscarpor]);
    }
    public function trayectoria(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        return view("nosotros/nuestratrayectoria", ['buscarpor' => $buscarpor]);
    }
    public function principios(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        return view("nosotros/principios", ['buscarpor' => $buscarpor]);
    }

    public function store(Request $request)
    {
        //Regla de validación
        $rules = [
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'servicio' => 'required',
            'asunto' => 'required',
            'celular' => 'required',
            'comentario' => 'required'

        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //Instancia modelo Gender
        $consulta = new Contactanos;
        //Llevanos el modelo con los datos del Request
        $consulta->nombres = $request->nombres;
        $consulta->apellidos = $request->apellidos;
        $consulta->email = $request->email;
        $consulta->servicio = $request->servicio;
        $consulta->asunto = $request->asunto;
        $consulta->comentario = $request->comentario;
        $consulta->telefono = $request->celular;
        $consulta->estado = "POR RESOLVER";
        //Guardamos
        if ($consulta->save()) {

            $respuesta =  6;



            return redirect('contactanos')->with('respuesta', $respuesta);
        } else {

            $respuesta = -6;
            return redirect('contactanos')->with('respuesta', $respuesta);
        }
    }
    public function categoriaproducto($namec, Request $request)
    {

        $buscarpor = $request->get('buscarproducto');

        $productos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select(
                'p.id as idproducto',
                'p.name',
                'p.price',
                'p.image_path',
                'c.nombre as categoria',
                'sc.nombre as subcategoria',
                'p.marca',
                'p.oferta',
                'p.porcentajedescuento',
                'p.descripcion',
                'p.stock'
            )
            ->distinct('p.id')
            ->orderBy('p.stock', 'desc')
            ->where('c.nombre', '=', $namec)
            ->get();

        $masvendidos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select(
                'p.id as idproducto',
                'p.name',
                'p.price',
                'p.image_path',
                'c.nombre as categoria',
                'sc.nombre as subcategoria',
                'p.marca',
                'p.oferta',
                'p.porcentajedescuento',
                'p.descripcion',
                'p.stock'
            )
            ->distinct('p.id')
            ->orderBy('p.stock', 'desc')
            ->where('c.nombre', '=', $namec)
            ->where('p.stock', '>', 0)
            ->take(5)
            ->get();

        $unique_productos = $productos->unique('idproducto');

        $productosbusqueda = DB::table('productos as p')
            ->where('p.stock', '>', 0)
            ->where('p.name', 'like', "%$buscarpor%")
            ->distinct('p.name')
            ->get();


        //return  $masvendidos ;
        return view("pagina/categoriaproducto", [
            'productos' => $unique_productos,
            'masvendidos' => $masvendidos,  'buscarpor' => $buscarpor, 'productosbusqueda' => $productosbusqueda,

        ]);
    }

    public function subcategoriaproducto($name, Request $request)
    {

        $buscarpor = $request->get('buscarproducto');

        $productos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select(
                'p.id as idproducto',
                'p.name',
                'p.price',
                'p.image_path',
                'c.nombre as categoria',
                'sc.nombre as subcategoria',
                'p.marca',
                'p.oferta',
                'p.porcentajedescuento',
                'p.descripcion',
                'p.stock'
            )
            ->where('sc.nombre', '=', $name)->distinct('name')
            ->orderBy('p.stock', 'desc')
            ->get();

        $masvendidos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select(
                'p.id as idproducto',
                'p.name',
                'p.price',
                'p.image_path',
                'c.nombre as categoria',
                'sc.nombre as subcategoria',
                'p.marca',
                'p.oferta',
                'p.porcentajedescuento',
                'p.descripcion',
                'p.stock'
            )
            ->distinct('p.id')
            ->orderBy('p.stock', 'desc')
            ->where('sc.nombre', '=', $name)
            ->where('p.stock', '>', 0)
            ->take(5)
            ->get();

        $productosbusqueda = DB::table('productos as p')
            ->where('p.stock', '>', 0)
            ->where('p.name', 'like', "%$buscarpor%")
            ->distinct('p.name')
            ->get();


        //return  $productos ;
        return view("pagina/subcategoriaproducto", [
            'productos' => $productos, 'masvendidos' => $masvendidos,
            'buscarpor' => $buscarpor, 'productosbusqueda' => $productosbusqueda
        ]);
    }
    public function categorias()
    {
        //$categorias = Categoria::all();


        $categorias = DB::table('categorias as c')
            ->join('subcategorias as sc', 'sc.categoria_id', '=', 'c.id')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('productos as p', 'dsp.producto_id', '=', 'p.id')
            ->select('c.id as idcategoria', 'c.nombre as nombre')
            ->distinct('nombre')
            ->orderBy('p.stock', 'desc')
            ->get();

        return  $categorias;
    }
    public function subcategorias()
    {
        //$subcategorias = Subcategoria::all();
        $subcategorias = DB::table('categorias as c')
            ->join('subcategorias as sc', 'sc.categoria_id', '=', 'c.id')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('productos as p', 'dsp.producto_id', '=', 'p.id')
            ->select('sc.id as idcategoria', 'sc.nombre as nombre', 'sc.categoria_id')
            ->distinct('nombre')
            ->orderBy('p.stock', 'desc')
            ->get();

        return  $subcategorias;
    }

   
}
