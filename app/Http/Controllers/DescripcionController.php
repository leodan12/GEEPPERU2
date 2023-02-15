<?php

namespace App\Http\Controllers;

use App\Models\Descripcion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Especificacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class DescripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index( )
    {
        //$buscarpor = $request->get('buscarproducto');
        //$preguntas = pregunta::all();
        $descripciones = $this->listar();

        // return $preguntas;
        return view("descripcion/index", ['descripciones' => $descripciones//,'buscarpor' => $buscarpor
    ]);
    }

    public function listar()
    {
        //$preguntas = Preguntas::All();
        $descripciones = DB::table('descripcions as d')
        ->select('d.id as iddescripcion', 'd.descripcion')->get();

        return $descripciones;
    }

    public function create()
    { 
        //$buscarpor = $request->get('buscarproducto');
        //return view("nosotros/pregunta/create" );
        return view("descripcion/create");
    }

    public function store(Request $request)
    {
        //Regla de validación
        $rules = [
            'descripcion' => 'required'

        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //Instancia modelo Gender
        $descripcion = new Descripcion;
        //Llevanos el modelo con los datos del Request
        $descripcion->descripcion = $request->descripcion;
       
        //Guardamos
        if ($descripcion->save()) {

            $respuesta =  1;
            $especificaciones = $request->Lespecificaciones;
           

            if ($especificaciones !== null) {
                for ($i = 0; $i < count($especificaciones); $i++) {

                    $especificacion = new Especificacion;
                    $especificacion->especificacion = $especificaciones[$i];
                    $especificacion->descripcion_id = $descripcion->id;
                    $especificacion->save(); 
                }
            }

            return redirect('descripcion/index')->with('respuesta', $respuesta);
        } else {

            $respuesta = -1;
            return redirect('descripcion/index')->with('respuesta', $respuesta);
        }
    }


   

    public function edit($id  )
    {
        $descripcion = Descripcion::find($id);
        //$buscarpor = $request->get('buscarproducto');
        $especificaciones = DB::table('descripcions as d')
        ->join('especificacions as e', 'e.descripcion_id', '=', 'd.id')
            ->select('d.id as iddescripcion','e.id as idespecificacion', 'e.especificacion')
            ->where('e.descripcion_id', '=', $id)->get();
      
        return view('descripcion/edit', ['descripcion' => $descripcion,  'especificaciones' => $especificaciones,
        //'buscarpor' => $buscarpor
    ]);
    }

    public function update(Request $request, $id)
    {
        //Regla de validación
        $rules = [
            'descripcion' => 'required'
        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //buscamos el género con el id enviado por la URL
        $descripcion = Descripcion::find($id);

        if ($descripcion) {
           
            //Cambiamos el nombre del registro con el valor enviado por Request
            $descripcion->descripcion = $request->descripcion;
          
            //Actualizamos y retornamos el registro con el nuevo valor
            if ($descripcion->update()) {

                $respuesta =  2;
                $especificaciones = $request->Lespecificaciones;
                

                if ($especificaciones !== null) {
                    for ($i = 0; $i < count($especificaciones); $i++) {

                        $especificacion = new Especificacion;
                        $especificacion->especificacion = $especificaciones[$i];
                        $especificacion->descripcion_id = $descripcion->id;
                        $especificacion->save();
                    }
                }

               
                return redirect('descripcion/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -2;
                return redirect('descripcion/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('descripcion/index')->with('respuesta', $respuesta);
        }
    }


    public function destroy($id)
    {
        //buscamos el registro con el id enviado por la URL
        $descripcion = Descripcion::find($id);
        if ($descripcion) {

            
            if ($descripcion->delete()) {

                $respuesta =  3;
                return redirect('descripcion/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -3;
                return redirect('descripcion/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('descripcion/index')->with('respuesta', $respuesta);
        }
    }

    public function destroydetalledescripcion($id)
    {
        //buscamos el registro con el id enviado por la URL
        $especificacion = Especificacion::find($id);
         $dato = 0;
       
        if ($especificacion) {
            if($especificacion->delete()){
                $dato =1;
              return $dato;  
            }   
            
        }
        

    }
}
