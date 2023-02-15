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
    const PAGINACION = 5;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        $principales = DB::table('principales as p')
            ->select('p.id', 'p.nombre', 'p.imagen')
            ->orderBy('id', 'desc')
            ->get();
        //return  $principales;
        return view("principal/index", ['principales' => $principales, 'buscarpor' => $buscarpor]);
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
