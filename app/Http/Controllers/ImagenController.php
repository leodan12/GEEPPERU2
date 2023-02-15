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

use Illuminate\Http\UploadedFile;

class ImagenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $imagenes = DB::table('imagens as i')
            ->join('productos as p', 'i.producto_id', '=', 'p.id')
            ->select('i.id', 'p.name', 'i.imagen')
            ->orderBy('id', 'desc')
            ->get();
        return view("imagenes/index", ['imagenes' => $imagenes]);
    }

    public function create()
    {
        $productos = Producto::all();

        return view("imagenes/create", ['productos' => $productos]);
    }

    public function show($id)
    {
        $imagen = DB::table('imagens as i')
            ->join('productos as p', 'i.producto_id', '=', 'p.id')
            ->select('i.id', 'i.imagen', 'p.name')
            ->where('i.id', '=', $id)
            ->get();

        return $imagen;
    }

    public function store(Request $request)
    {

        $rules = [
            'imagenes' => 'required ',
            'producto_id' => 'required ',

        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $respuesta =  -99;
            return redirect('imagenes/create')->with('respuesta', $respuesta);
        }


        $imagenes = $request->file('imagenes');

        $cont = 0;
        foreach ($imagenes as $imagen) {

            $nombre = $imagen->getClientOriginalName();
            //$imagen->move($ruta, $nombre);
            $imagen->move(public_path('images'), $nombre);
            $imagentable = new Imagen;
            $imagentable->imagen = $nombre;
            $imagentable->producto_id = $request->producto_id;
            $imagentable->save();

            $cont++;
        }

        $numImagenes = count($imagenes);
        if ($cont == $numImagenes) {
            $respuesta =  1;
            return redirect('imagenes/index')->with('respuesta', $respuesta);
        } else {

            $respuesta = -1;
            return redirect('imagenes/index')->with('respuesta', $respuesta);
        }
    }

    public function destroy($id)
    {
        //buscamos el registro con el id enviado por la URL
        $imagen = Imagen::find($id);
        if ($imagen) {

            if ($imagen->delete()) {

                $respuesta =  3;
                $path = public_path('images/' . $imagen->imagen);

                if (File::exists($path)) {
                    File::delete($path);
                }
                return redirect('imagenes/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -3;
                return redirect('imagenes/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('imagenes/index')->with('respuesta', $respuesta);
        }
    }
}
