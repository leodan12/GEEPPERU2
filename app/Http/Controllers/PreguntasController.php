<?php

namespace App\Http\Controllers;

use App\Models\Preguntas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Respuestas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        $preguntas = Preguntas::All();
        $respuestas = Respuestas::All();

        return view('nosotros.preguntasfrecuentes', ['respuestas' => $respuestas,
         'preguntas' => $preguntas,'buscarpor' => $buscarpor
        ]);
    }

    public function lista(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        //$preguntas = pregunta::all();
        $preguntas = $this->listar();

        // return $preguntas;
        return view("nosotros/pregunta/index", ['preguntas' => $preguntas,'buscarpor' => $buscarpor]);
    }

    public function listar()
    {
        //$preguntas = Preguntas::All();
        $preguntas = DB::table('preguntas as p')
        ->select('p.id as idpregunta', 'p.pregunta')->get();

        return $preguntas;
    }

    public function create(Request $request)
    { 
        $buscarpor = $request->get('buscarproducto');
        //return view("nosotros/pregunta/create" );
        return view("nosotros/pregunta/create", ['buscarpor' => $buscarpor]);
    }

    public function store(Request $request)
    {
        //Regla de validación
        $rules = [
            'pregunta' => 'required'

        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //Instancia modelo Gender
        $pregunta = new Preguntas;
        //Llevanos el modelo con los datos del Request
        $pregunta->pregunta = $request->pregunta;
       
        //Guardamos
        if ($pregunta->save()) {

            $respuesta =  1;
            $respuestas = $request->Lrespuestas;
           

            if ($respuestas !== null) {
                for ($i = 0; $i < count($respuestas); $i++) {

                    $respuestas1 = new Respuestas;
                    $respuestas1->respuesta = $respuestas[$i];
                    $respuestas1->pregunta_id = $pregunta->id;
                    $respuestas1->save();
                    
                }
            }

            return redirect('pregunta/index')->with('respuesta', $respuesta);
        } else {

            $respuesta = -1;
            return redirect('pregunta/index')->with('respuesta', $respuesta);
        }
    }


   

    public function edit($id ,Request $request)
    {
        $pregunta = Preguntas::find($id);
        $buscarpor = $request->get('buscarproducto');
        $respuestas = DB::table('preguntas as p')
        ->join('respuestas as r', 'r.pregunta_id', '=', 'p.id')
            ->select('p.id as idpregunta','r.id as idrespuesta', 'r.respuesta as respuesta')
            ->where('r.pregunta_id', '=', $id)->get();
      
        return view('nosotros/pregunta/edit', ['pregunta' => $pregunta,  'respuestas' => $respuestas,
        'buscarpor' => $buscarpor]);
    }

    public function update(Request $request, $id)
    {
        //Regla de validación
        $rules = [
            'pregunta' => 'required'
        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //buscamos el género con el id enviado por la URL
        $pregunta = Preguntas::find($id);

        if ($pregunta) {
           
            //Cambiamos el nombre del registro con el valor enviado por Request
            $pregunta->pregunta = $request->pregunta;
          
            //Actualizamos y retornamos el registro con el nuevo valor
            if ($pregunta->update()) {

                $respuesta =  2;
                $respuestas = $request->Lrespuestas;
                

                if ($respuestas !== null) {
                    for ($i = 0; $i < count($respuestas); $i++) {

                        $respuesta1 = new Respuestas;
                        $respuesta1->respuesta = $respuestas[$i];
                        $respuesta1->pregunta_id = $pregunta->id;
                        $respuesta1->save();
                    }
                }

               
                return redirect('pregunta/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -2;
                return redirect('pregunta/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('pregunta/index')->with('respuesta', $respuesta);
        }
    }


    public function destroy($id)
    {
        //buscamos el registro con el id enviado por la URL
        $pregunta = Preguntas::find($id);
        if ($pregunta) {

            
            if ($pregunta->delete()) {

                $respuesta =  3;
                return redirect('pregunta/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -3;
                return redirect('pregunta/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('pregunta/index')->with('respuesta', $respuesta);
        }
    }

    public function destroydetallepregunta($id)
    {
        //buscamos el registro con el id enviado por la URL
        $respuestas = Respuestas::find($id);
         $dato = 0;
       
        if ($respuestas) {
            if($respuestas->delete()){
                $dato =1;
              return $dato;  
            }   
            
        }
        

    }
}
