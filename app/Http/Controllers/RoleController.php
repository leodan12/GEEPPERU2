<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    
   public function index() 
    { 
     $roles = $this->listar();
     // return $consulta;
      return view("rol/index",['roles'=>$roles]) ;
    
   }
  
   public function listar()
   {
    $roles=DB::table('roles as r')
         ->select('r.id as idrol','r.rol as rol','r.descripcion as descripcion')
         ->where('r.estado','=','1')->get() ;
      
    return $roles;
   }
   
   public function create(){
     return view("rol/create");
   }
  
   public function store(Request $request)
   { 
     //Regla de validación
       $rules = [
            
            'rol' => 'required|string',
            'descripcion' => 'required|string|max:100'
            
          
       ];
       //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
       $validator = Validator::make($request->all(), $rules);
       //Si falla la validacion retornamos los errores
       if ($validator->fails()) {
           return $validator->errors();
       }
       //Instancia modelo Gender
       $rol = new Role;
       //Llevanos el modelo con los datos del Request
       $rol->rol = $request->rol;
       $rol->descripcion = $request->descripcion;
       $rol->estado = 1;
       //Guardamos
       if ($rol->save()) {
        
            $respuesta =  1;
            return redirect('rol/index')->with('respuesta', $respuesta);    
       } else {
        
        $respuesta = -1;
        return redirect('rol/index')->with('respuesta', $respuesta);    
           
       }
   }

    
    public function show($id)
    {
        $rol=DB::table('roles as r')
        
        ->select('r.rol','r.descripcion')
        ->where('r.id','=',$id)->first() ;
        
            return  $rol ;
        

    }

    public function edit($id){
        $rol = Role::find($id); 
        return view('rol/edit',['rol'=>$rol]);
    }
    
    public function update(Request $request, $id)
    {
        //Regla de validación
        $rules = [
            'rol' => 'required|string',
            'descripcion' => 'required|string|max:100'
        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //buscamos el género con el id enviado por la URL
        $rol = Role::find($id);

        if ($rol) {
            //Cambiamos el nombre del registro con el valor enviado por Request
             
            $rol->rol = $request->rol;
            $rol->descripcion = $request->descripcion;
            
            //Actualizamos y retornamos el registro con el nuevo valor
            if ($rol->update()) {
                
                $respuesta =  2;
                return redirect('rol/index')->with('respuesta', $respuesta);    
            } else {
                
                $respuesta =  -2;
                return redirect('rol/index')->with('respuesta', $respuesta);    
            }
        } else {
            
            $respuesta =  -5;
            return redirect('rol/index')->with('respuesta', $respuesta);    
        }
    }

    
    public function destroy($id)
    {
        //buscamos el registro con el id enviado por la URL
        $rol = Role::find($id);
        if ($rol) {
          
            $rol->estado = 0;
                if ($rol->update()) {
                   
                $respuesta =  3;
                return redirect('rol/index')->with('respuesta', $respuesta);    
                } else {
                  
                $respuesta =  -3;
                return redirect('rol/index')->with('respuesta', $respuesta);    
                }
            
        } else {
            
            $respuesta =  -5;
            return redirect('rol/index')->with('respuesta', $respuesta);    
        }
    }
}
