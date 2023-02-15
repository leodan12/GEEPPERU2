<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria; 
use App\Models\Subcategoria;
use Illuminate\Support\Facades\Validator;
 

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        //$buscarpor = $request->get('buscarproducto');
       // $categoria = Categoria::All();
        $categoria =  DB::table('categorias as c')
        ->select('c.id as idcategoria', 'c.nombre')->get();

       // $subcategorias = Subcategoria::All();
        $subcategorias =  DB::table('subcategorias as sc')
        ->select('sc.id as idcategoria', 'sc.nombre')->get();

        return view('categoria/index', ['categorias' => $categoria,
         'subcategorias' => $subcategorias //,'buscarpor' => $buscarpor
        ]);
    }
    public function create(Request $request)
    { 
        //$buscarpor = $request->get('buscarproducto');
        //return view("nosotros/pregunta/create" );

        return view("categoria/create"//, ['buscarpor' => $buscarpor]
    );
    }
    public function store(Request $request)
    {
        //Regla de validación
        $rules = [
            'categoria' => 'required'

        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //Instancia modelo Gender
        $categoria = new Categoria;
        //Llevanos el modelo con los datos del Request
        $categoria->nombre = $request->categoria;
       
        //Guardamos
        if ($categoria->save()) {

            $respuesta =  1;
            $subcategorias = $request->Lsubcategorias;
           

            if ($subcategorias !== null) {
                for ($i = 0; $i < count($subcategorias); $i++) {

                    $subcategoria = new Subcategoria;
                    $subcategoria->nombre = $subcategorias[$i];
                    $subcategoria->categoria_id = $categoria->id;
                    $subcategoria->save();
                    
                }
            }

            return redirect('categoria/index')->with('respuesta', $respuesta);
        } else {

            $respuesta = -1;
            return redirect('categoria/index')->with('respuesta', $respuesta);
        }
    }

    public function edit($id  )
    {
        $categoria = Categoria::find($id);
        //$buscarpor = $request->get('buscarproducto');
        $subcategorias = DB::table('categorias as c')
        ->join('subcategorias as sc', 'sc.categoria_id', '=', 'c.id')
            ->select('c.id as idcategoria','sc.id as idsubcategoria', 'sc.nombre as subcategoria')
            ->where('sc.categoria_id', '=', $id)->get();
      
        return view('categoria/edit', ['categoria' => $categoria,  'subcategorias' => $subcategorias
        //, 'buscarpor' => $buscarpor
    ]);
    }

    public function update(Request $request, $id)
    {
        //Regla de validación
        $rules = [
            'categoria' => 'required'
        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //buscamos el género con el id enviado por la URL
        $categoria = Categoria::find($id);

        if ($categoria) {
           
            //Cambiamos el nombre del registro con el valor enviado por Request
            $categoria->nombre = $request->categoria;
          
            //Actualizamos y retornamos el registro con el nuevo valor
            if ($categoria->update()) {

                $respuesta =  2;
                $subcategorias = $request->Lsubcategorias;
                

                if ($subcategorias !== null) {
                    for ($i = 0; $i < count($subcategorias); $i++) {

                        $subcategoria = new Subcategoria;
                        $subcategoria->nombre = $subcategorias[$i];
                        $subcategoria->categoria_id = $categoria->id;
                        $subcategoria->save();
                    }
                }

               
                return redirect('categoria/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -2;
                return redirect('categoria/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('categoria/index')->with('respuesta', $respuesta);
        }
    }


    public function destroy($id)
    {
        //buscamos el registro con el id enviado por la URL
        $categoria = Categoria::find($id);
        if ($categoria) { 
            
            if ($categoria->delete()) {

                $respuesta =  3;
                return redirect('categoria/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -3;
                return redirect('categoria/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('categoria/index')->with('respuesta', $respuesta);
        }
    }

    public function destroydetallecategoria($id)
    {
        //buscamos el registro con el id enviado por la URL
        $subcategoria = Subcategoria::find($id);
         $dato = 0;
       
        if ($subcategoria) {
            if($subcategoria->delete()){
                $dato =1;
              return $dato;  
            }   
            
        }
        

    }




    public function categoriaproducto($namec, Request $request){

        $buscarpor = $request->get('buscarproducto');

        $productos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp','dsp.producto_id','=','p.id')
            ->join('subcategorias as sc','dsp.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.id as idproducto', 'p.name','p.price','p.image_path',
            'c.nombre as categoria','sc.nombre as subcategoria',
            'p.marca','p.oferta','p.porcentajedescuento','p.descripcion','p.stock' )
            ->distinct('p.id')
            ->orderBy('p.stock','desc')
            ->where('c.nombre','=',$namec)    
            ->get();

            $masvendidos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp','dsp.producto_id','=','p.id')
            ->join('subcategorias as sc','dsp.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.id as idproducto', 'p.name','p.price','p.image_path',
            'c.nombre as categoria','sc.nombre as subcategoria',
            'p.marca','p.oferta','p.porcentajedescuento','p.descripcion','p.stock' )
            ->distinct('p.id')
            ->orderBy('p.stock','desc')
            ->where('c.nombre','=',$namec)
            ->where('p.stock','>',0)
            ->take(5) 
            ->get();

    $unique_productos = $productos->unique('idproducto');

    $productosbusqueda = DB::table('productos as p')
        ->where('p.stock', '>', 0)
        ->where('p.name','like',"%$buscarpor%")
        ->distinct('p.name')
        ->get();


                //return  $masvendidos ;
    return view("pagina/categoriaproducto",['productos' => $unique_productos,
    'masvendidos' => $masvendidos,  'buscarpor' => $buscarpor, 'productosbusqueda' => $productosbusqueda, 
 
]);
        
}

public function subcategoriaproducto($name, Request $request){

    $buscarpor = $request->get('buscarproducto');

    $productos = DB::table('productos as p')
        ->join('detalle_subcategoria_productos as dsp','dsp.producto_id','=','p.id')
        ->join('subcategorias as sc','dsp.subcategoria_id','=','sc.id')
        ->join('categorias as c','sc.categoria_id','=','c.id')
        ->select('p.id as idproducto', 'p.name','p.price','p.image_path',
        'c.nombre as categoria','sc.nombre as subcategoria',
        'p.marca','p.oferta','p.porcentajedescuento','p.descripcion','p.stock' )
        ->where('sc.nombre','=',$name)->distinct('name')
        ->orderBy('p.stock','desc') 
        ->get();
        
        $masvendidos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp','dsp.producto_id','=','p.id')
            ->join('subcategorias as sc','dsp.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.id as idproducto', 'p.name','p.price','p.image_path',
            'c.nombre as categoria','sc.nombre as subcategoria',
            'p.marca','p.oferta','p.porcentajedescuento','p.descripcion','p.stock' )
            ->distinct('p.id')
            ->orderBy('p.stock','desc') 
            ->where('sc.nombre','=',$name)  
            ->where('p.stock','>',0)
            ->take(5) 
            ->get();

            $productosbusqueda = DB::table('productos as p')
            ->where('p.stock', '>', 0)
            ->where('p.name','like',"%$buscarpor%")
            ->distinct('p.name')
            ->get();

            
        //return  $productos ;
        return view("pagina/subcategoriaproducto",[
            'productos' => $productos ,'masvendidos' => $masvendidos,
            'buscarpor' => $buscarpor, 'productosbusqueda' => $productosbusqueda
        ]);
        
}
public function categorias()
    {
        //$categorias = Categoria::all();
       
        
        $categorias =DB::table('categorias as c')
        ->join('subcategorias as sc','sc.categoria_id','=','c.id')
        ->join('detalle_subcategoria_productos as dsp','dsp.subcategoria_id','=','sc.id')
        ->join('productos as p','dsp.producto_id','=','p.id')
        ->select('c.id as idcategoria','c.nombre as nombre')
        ->distinct('nombre')
        ->orderBy('p.stock','desc')
        ->get();
       
        return  $categorias;
    }
    public function subcategorias()
    {
        //$subcategorias = Subcategoria::all();
        $subcategorias =DB::table('categorias as c')
        ->join('subcategorias as sc','sc.categoria_id','=','c.id')
        ->join('detalle_subcategoria_productos as dsp','dsp.subcategoria_id','=','sc.id')
        ->join('productos as p','dsp.producto_id','=','p.id')
        ->select('sc.id as idcategoria','sc.nombre as nombre','sc.categoria_id')
        ->distinct('nombre')
        ->orderBy('p.stock','desc')
        ->get();

        return  $subcategorias;
    }

}