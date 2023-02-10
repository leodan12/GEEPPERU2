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

class PrincipaleController extends Controller
{
    const PAGINACION=5;
    
    //public function indexbusqueda(Request $request)
    //{

    //    $buscarpor = $request->get('buscarpor');

    //    $productos = Producto::where('name','like',"%$buscarpor%");
        
        
    //    return view('pagina/busqueda')->with([
    //        'productos' => $productos, 'buscarpor' => $buscarpor 
    //    ]);
    //}

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
            ->select('c.id as idcategoria', 'c.nombre as nombre',DB::raw('count(p.id) as producto'))
            ->groupBy('idcategoria','nombre')
            ->orderBy('producto','desc')
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
            ->where('p.name','like',"%$buscarpor%") 
            ->get();

            $productosbusqueda = DB::table('productos as p')
                ->where('p.stock', '>', 0)
                ->where('p.name','like',"%$buscarpor%")
                ->distinct('p.name')
                ->get();

        //$unique_products = $productos->unique('p.id');

        //return $productosbusqueda;

        return view('inicio2')->with([
            'productos' => $productos, 'categorias' => $categorias, 
            'principal' => $principal ,'buscarpor' => $buscarpor,
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
            ->where('p.name','like',"%$nombre%") 
            ->distinct('p.name')
            ->get();

            $productosbusqueda = DB::table('productos as p')
                ->where('p.stock', '>', 0)
                ->where('p.name','like',"%$nombre%")
                ->distinct('p.name')
                ->take(3)
                ->get();

        //$unique_products = $productos->unique('p.id');

        //return $productosbusqueda;

        return $productosbusqueda;
    
    }


    public function detalleproducto($name,Request $request)
    {
        $buscarpor = $request->get('buscarproducto');

        $product = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp', 'dsp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dsp.subcategoria_id', '=', 'sc.id')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select('p.id','p.image_path', 'p.name', 'c.nombre as categoria', 'sc.nombre as subcategoria')
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
            ->orderby('p.porcentajedescuento','desc')
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
            //->orderBy('p.stock','desc')
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
            ->where('p.name','like',"%$buscarpor%")
            ->distinct('p.name')
            ->get();

        $imagenes = DB::table('imagens as i') 
            ->select('i.id','i.imagen','i.producto_id') 
            ->where('i.producto_id','=',$product->id ) 
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
            'descripcion' => $descripcion, 'especificacion' => $especificacion, 'buscarpor' => $buscarpor,
            'productosbusqueda' => $productosbusqueda, 'imagenes' => $imagenes
        ]);
    }


    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        $principales = DB::table('principales as p')
            ->select('p.id', 'p.nombre', 'p.imagen')
            ->orderBy('id', 'desc')
            ->get();
        //return  $principales;
        return view("principal/index", ['principales' => $principales,'buscarpor' => $buscarpor]);
    }

    public function create(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');

        return view("principal/create", ['buscarpor' => $buscarpor]);
   
       
    }

    public function show($id)
    {
        $principal = DB::table('principales as p')
            ->select('p.id', 'p.imagen', 'p.nombre')
            ->where('p.id', '=', $id)
            ->get();

        return $principal;
    }

    public function store(Request $request)
    {

        $rules = [
            'imagen' => 'required|image|file ',
            'nombre' => 'required ',

        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $imagen = $request->file('imagen');
            $image_name = $imagen->getClientOriginalName();

            $imagen->move(public_path('principal'), $image_name);

            $principal = new Principale;
            $principal->imagen = $image_name;
            $principal->nombre = $request->nombre;
            $principal->estado = 1;

            if ($principal->save()) {
                $respuesta =  1;
                return redirect('principal/index')->with('respuesta', $respuesta);
            } else {

                $respuesta = -1;
                return redirect('principal/index')->with('respuesta', $respuesta);
            }
        } else {


            $respuesta = -1;
            return redirect('principal/index')->with('respuesta', $respuesta);
        }
    }

    public function destroy($id)
    {
        //buscamos el registro con el id enviado por la URL
        $principal = Principale::find($id);
        if ($principal) {

            if ($principal->delete()) {

                $respuesta =  3;
                $path = public_path('principal/' . $principal->imagen);

                if (File::exists($path)) {
                    File::delete($path);
                }
                return redirect('principal/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -3;
                return redirect('principal/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('principal/index')->with('respuesta', $respuesta);
        }
    }
}
