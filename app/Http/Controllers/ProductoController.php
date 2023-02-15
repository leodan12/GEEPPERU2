<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\DetalleSubcategoriaProducto;
use App\Models\DetalleEspecificacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$productos = Producto::all();
        $productos = $this->listar();

        // return $consulta;
        return view("producto/index", ['productos' => $productos]);
    }

    public function listar()
    {
        $productos = DB::table('productos as p')

            ->select('p.id as idproducto', 'p.name', 'p.marca', 'p.price', 'p.descripcion', 'p.stock', 'p.oferta', 'p.porcentajedescuento', 'p.image_path')
            ->where('p.estado', '=', 1)
            ->distinct('p.id')
            ->get();

        return $productos;
    }

    public function create()
    {
        $subcategorias  = DB::table('subcategorias as sc')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select('sc.id', 'sc.nombre as subcategoria', 'c.nombre as categoria')
            ->get();
        $especificaciones  = DB::table('especificacions as e')
            ->join('descripcions as d', 'e.descripcion_id', '=', 'd.id')
            ->select('e.id', 'e.especificacion', 'd.descripcion')
            ->get();
        return view("producto/create", ['subcategorias' => $subcategorias, 'especificaciones' => $especificaciones]);
    }

    public function store(Request $request)
    {
        //Regla de validación
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'marca' => 'required',
            'stock' => 'required',
            'oferta' => 'required',
            'porcetajedescuento' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|file ',

        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            $respuesta = -99;
            return redirect('productos/index')->with('respuesta', $respuesta);
        }
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $imagen = $request->file('imagen');
            $image_name = $imagen->getClientOriginalName();

            $imagen->move(public_path('images'), $image_name);

            //Instancia modelo Gender
            $producto = new Producto;
            //Llevanos el modelo con los datos del Request
            $producto->name = $request->name;
            $producto->price = $request->price;
            $producto->descripcion = $request->descripcion;
            $producto->marca = $request->marca;
            $producto->stock = $request->stock;
            $producto->image_path =  $image_name;
            $producto->oferta = $request->oferta;
            $producto->estado = 1;
            $producto->porcentajedescuento = $request->porcetajedescuento;

            if ($producto->save()) {
                $respuesta =  1;
                $subcategorias = $request->Lsubcategorias;
                $especificaciones = $request->Lespecificaciones;
                $datos = $request->Ldatos;

                if ($subcategorias !== null) {
                    for ($i = 0; $i < count($subcategorias); $i++) {

                        $detallesubcategoria = new DetalleSubcategoriaProducto;
                        $detallesubcategoria->producto_id = $producto->id;
                        $detallesubcategoria->subcategoria_id = $subcategorias[$i];
                        $detallesubcategoria->save();
                    }
                }
                if ($especificaciones !== null) {
                    for ($i = 0; $i < count($especificaciones); $i++) {

                        $detalleespecificacion = new DetalleEspecificacion;
                        $detalleespecificacion->producto_id = $producto->id;
                        $detalleespecificacion->dato = $datos[$i];
                        $detalleespecificacion->especificacion_id = $especificaciones[$i];
                        $detalleespecificacion->save();
                    }
                }

                return redirect('productos/index')->with('respuesta', $respuesta);
            } else {

                $respuesta = -1;
                return redirect('productos/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta = -100;
            return redirect('productos/index')->with('respuesta', $respuesta);
        }
    }


    public function show($id)
    {
        $producto = DB::table('productos as p')
            ->select(
                'p.id',
                'p.name',
                'p.price',
                'p.stock',
                'p.marca',
                'p.descripcion',
                'p.oferta',
                'p.porcentajedescuento',
                'p.image_path'
            )
            ->where('p.id', '=', $id)->get();

        $subcategorias = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dscp', 'dscp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dscp.subcategoria_id', '=', 'sc.id')
            ->select('sc.id', 'sc.nombre')
            ->where('p.id', '=', $id)->get();

        $especificaciones = DB::table('productos as p')
            ->join('detalle_especificacions as de', 'de.producto_id', '=', 'p.id')
            ->join('especificacions as e', 'de.especificacion_id', '=', 'e.id')
            ->select('de.id', 'e.especificacion', 'de.dato')
            ->where('p.id', '=', $id)->get();

        return [
            'producto' => $producto, 'subcategorias' => $subcategorias, 'especificaciones' => $especificaciones
        ];
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $subcategorias  = DB::table('subcategorias as sc')
            ->join('categorias as c', 'sc.categoria_id', '=', 'c.id')
            ->select('sc.id', 'sc.nombre as subcategoria', 'c.nombre as categoria')
            ->get();
        $especificaciones  = DB::table('especificacions as e')
            ->join('descripcions as d', 'e.descripcion_id', '=', 'd.id')
            ->select('e.id', 'e.especificacion', 'd.descripcion')
            ->get();

        $DetalleSubCategorias = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dscp', 'dscp.producto_id', '=', 'p.id')
            ->join('subcategorias as sc', 'dscp.subcategoria_id', '=', 'sc.id')
            //->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('dscp.id', 'sc.nombre as subcategoria')
            ->where('p.id', '=', $id)
            ->get();

        $DetalleEspecificaciones = DB::table('productos as p')
            ->join('detalle_especificacions as de', 'de.producto_id', '=', 'p.id')
            ->join('especificacions as e', 'de.especificacion_id', '=', 'e.id')
            //->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('de.id', 'e.especificacion', 'de.dato')
            ->where('p.id', '=', $id)
            ->get();

        return view('producto/edit', [
            'producto' => $producto, 'subcategorias' => $subcategorias, 'especificaciones' => $especificaciones, 'DetalleSubCategorias' => $DetalleSubCategorias,
            'DetalleEspecificaciones' => $DetalleEspecificaciones
        ]);
    }

    public function update(Request $request, $id)
    {
        //Regla de validación
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'marca' => 'required',
            'stock' => 'required',
            'oferta' => 'required',
            'porcetajedescuento' => 'required',
            'descripcion' => 'required',
            // 'imagen' => 'required|image|file ',
        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //buscamos el género con el id enviado por la URL
        $producto = Producto::find($id);

        if ($producto) {
            //Cambiamos el nombre del registro con el valor enviado por Request
            //Instancia modelo Gender 
            $producto->name = $request->name;
            $producto->price = $request->price;
            $producto->descripcion = $request->descripcion;
            $producto->marca = $request->marca;
            $producto->stock = $request->stock;
            $producto->estado = 1;
            $producto->oferta = $request->oferta;
            $producto->porcentajedescuento = $request->porcetajedescuento;

            if ($request->imagen != null) {
                if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
                    $imagen = $request->file('imagen');
                    $image_name = $imagen->getClientOriginalName();

                    $imagen->move(public_path('images'), $image_name);
                    $producto->image_path =  $image_name;
                } else {
                    $respuesta =  -100;
                    return redirect('productos/index')->with('respuesta', $respuesta);
                }
            }


            if ($producto->save()) {
                $respuesta =  2;
                $subcategorias = $request->Lsubcategorias;
                $especificaciones = $request->Lespecificaciones;
                $datos = $request->Ldatos;

                if ($subcategorias !== null) {
                    for ($i = 0; $i < count($subcategorias); $i++) {

                        $detallesubcategoria = new DetalleSubcategoriaProducto;
                        $detallesubcategoria->producto_id = $producto->id;
                        $detallesubcategoria->subcategoria_id = $subcategorias[$i];
                        $detallesubcategoria->save();
                    }
                }
                if ($especificaciones !== null) {
                    for ($i = 0; $i < count($especificaciones); $i++) {

                        $detalleespecificacion = new DetalleEspecificacion;
                        $detalleespecificacion->producto_id = $producto->id;
                        $detalleespecificacion->dato = $datos[$i];
                        $detalleespecificacion->especificacion_id = $especificaciones[$i];
                        $detalleespecificacion->save();
                    }
                }

                return redirect('productos/index')->with('respuesta', $respuesta);
            } else {
                $respuesta =  -2;
                return redirect('productos/index')->with('respuesta', $respuesta);
            }
        } else {
            $respuesta =  -5;
            return redirect('productos/index')->with('respuesta', $respuesta);
        }
    }


    public function destroy($id)
    {
        //buscamos el registro con el id enviado por la URL
        $producto = Producto::find($id);
        if ($producto) {

            $producto->estado = 0;
            if ($producto->update()) {
                $respuesta =  3;
                return redirect('productos/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -3;
                return redirect('productos/index')->with('respuesta', $respuesta);
            }
        } else {
            $respuesta =  -5;
            return redirect('productos/index')->with('respuesta', $respuesta);
        }
    }
    public function deletedetallesubcategoria($id)
    {
        //buscamos el registro con el id enviado por la URL
        $detallesubcategoria = DetalleSubcategoriaProducto::find($id);
        $dato = 0;

        if ($detallesubcategoria) {
            if ($detallesubcategoria->delete()) {
                $dato = 1;
                return $dato;
            }
        }
    }
    public function deletedetalleespecificacion($id)
    {
        //buscamos el registro con el id enviado por la URL
        $detalleespecificacion = DetalleEspecificacion::find($id);
        $dato = 0;

        if ($detalleespecificacion) {
            if ($detalleespecificacion->delete()) {
                $dato = 1;
                return $dato;
            }
        }
    }
}
