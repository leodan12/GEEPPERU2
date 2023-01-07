<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Principale;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class PrincipaleController extends Controller
{
    public function inicio()
    {

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
            ->select('c.id as idcategoria', 'c.nombre as nombre')->distinct('nombre')
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
            ->get();

        //$unique_products = $productos->unique('p.id');


        return view('inicio2')->with(['productos' => $productos, 'categorias' => $categorias, 'principal' => $principal]);
    }

    public function index()
    {

        $principales = DB::table('principales as p')
            ->select('p.id', 'p.nombre', 'p.imagen')
            ->orderBy('id', 'desc')
            ->get();
        //return  $principales;
        return view("principal/index", ['principales' => $principales]);
    }

    public function create()
    {


        return view("principal/create");
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
                $path = public_path('principal/'.$principal->imagen);
    
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
