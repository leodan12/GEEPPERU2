<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function micuenta(Request $request){
        $buscarpor = $request->get('buscarproducto');
        $user = Auth::user()->id;
        $usuario = User::find($user);
        return view("micuenta/detalle", [   'usuario' => $usuario,  'buscarpor' => $buscarpor  ]);
    }

    public function index()
    {
        $usuarios = $this->listar();
        // return $consulta;
        return view("usuario/index", ['usuarios' => $usuarios]);
    }

    public function listar()
    {
        $usuarios = DB::table('users as u')
            ->join('roles as r', 'u.rol_id', '=', 'r.id')
            ->select('u.id as idusuario', 'u.name as name', 'u.email', 'u.password', 'r.rol as rol',)
            ->where('u.estado', '=', '1')
            ->get();

        return $usuarios;
    }

    public function create()
    {
        $roles = Role::all();
        return view("usuario/create", ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        //Regla de validación
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string',
            'rol_id' => 'required',
            'password' => 'required|string'
        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //Instancia modelo Gender
        $usuario = new User;
        //Llevanos el modelo con los datos del Request
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->rol_id = $request->rol_id;
        $usuario->password = Hash::make($request->password);
        $usuario->estado = 1;
        //Guardamos
        $users = User::all();
        foreach ($users as $user) {
            if ($user->email == $request->email) {
                $respuesta = 'email_duplicado';
                return redirect('usuario/create')->with('respuesta', $respuesta);
            } else {
                if ($usuario->save()) {

                    $respuesta =  1;
                    return redirect('usuario/index')->with('respuesta', $respuesta);
                } else {

                    $respuesta = -1;
                    return redirect('usuario/index')->with('respuesta', $respuesta);
                }
            }
        }
    }


    public function show($id)
    {
        $usuario = DB::table('users as u')
            ->join('roles as r', 'u.rol_id', '=', 'r.id')
            ->select('u.id as idusuario', 'u.name as name', 'u.email', 'u.password', 'r.rol as rol',)
            ->where('u.estado', '=', '1')
            ->where('u.id', '=', $id)
            ->first();

        return  $usuario;
    }

    public function edit($id)
    {
        $roles = Role::all();
        $usuario = User::find($id);
        return view('usuario/edit', ['usuario' => $usuario, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        //Regla de validación
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string',
            'rol_id' => 'required',
            'password' => 'required|string'
        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }

        $users = User::all();
        foreach ($users as $user) {
            if ($user->email == $request->email) {
                $respuesta = 'email_duplicado';
                return redirect("usuario/$id/edit")->with('respuesta', $respuesta);
            } else {

                //buscamos el género con el id enviado por la URL
                $usuario = User::find($id);

                if ($usuario) {
                    //Cambiamos el nombre del registro con el valor enviado por Request

                    $usuario->name = $request->name;
                    $usuario->email = $request->email;
                    $usuario->rol_id = $request->rol_id;
                    $usuario->password = Hash::make($request->password);



                    //Actualizamos y retornamos el registro con el nuevo valor


                    if ($usuario->update()) {

                        $respuesta =  2;
                        return redirect('usuario/index')->with('respuesta', $respuesta);
                    } else {

                        $respuesta =  -2;
                        return redirect('usuario/index')->with('respuesta', $respuesta);
                    }
                } else {

                    $respuesta =  -5;
                    return redirect('usuario/index')->with('respuesta', $respuesta);
                }
            }
        }
    }


    public function destroy($id)
    {
        //buscamos el registro con el id enviado por la URL
        $usuario = User::find($id);
        if ($usuario) {

            $usuario->estado = 0;
            if ($usuario->update()) {

                $respuesta =  3;
                return redirect('usuario/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -3;
                return redirect('usuario/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('usuario/index')->with('respuesta', $respuesta);
        }
    }
}
