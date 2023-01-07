<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function categoriaproducto($namec){
        $productos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp','dsp.producto_id','=','p.id')
            ->join('subcategorias as sc','dsp.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.id as idproducto', 'p.name','p.price','p.image_path',
            'c.nombre as categoria','sc.nombre as subcategoria',
            'p.marca','p.oferta','p.porcentajedescuento','p.descripcion','p.stock' )
            ->distinct('p.id')
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
            ->take(5)
            ->where('c.nombre','=',$namec)  
            ->get();

    $unique_productos = $productos->unique('idproducto');


                //return  $masvendidos ;
    return view("pagina/categoriaproducto",['productos' => $unique_productos,'masvendidos' => $masvendidos]);
        
}

public function subcategoriaproducto($name){
    $productos = DB::table('productos as p')
        ->join('detalle_subcategoria_productos as dsp','dsp.producto_id','=','p.id')
        ->join('subcategorias as sc','dsp.subcategoria_id','=','sc.id')
        ->join('categorias as c','sc.categoria_id','=','c.id')
        ->select('p.id as idproducto', 'p.name','p.price','p.image_path',
        'c.nombre as categoria','sc.nombre as subcategoria',
        'p.marca','p.oferta','p.porcentajedescuento','p.descripcion','p.stock' )
        ->where('sc.nombre','=',$name)->distinct('name') 
        ->get();
        
        $masvendidos = DB::table('productos as p')
            ->join('detalle_subcategoria_productos as dsp','dsp.producto_id','=','p.id')
            ->join('subcategorias as sc','dsp.subcategoria_id','=','sc.id')
            ->join('categorias as c','sc.categoria_id','=','c.id')
            ->select('p.id as idproducto', 'p.name','p.price','p.image_path',
            'c.nombre as categoria','sc.nombre as subcategoria',
            'p.marca','p.oferta','p.porcentajedescuento','p.descripcion','p.stock' )
            ->distinct('p.id')
            ->take(5)
            ->where('sc.nombre','=',$name)  
            ->get();
        //return  $productos ;
        return view("pagina/subcategoriaproducto",['productos' => $productos ,'masvendidos' => $masvendidos]);
        
}
public function categorias()
    {
        //$categorias = Categoria::all();
        $categorias =DB::table('categorias as c')
        ->join('subcategorias as sc','sc.categoria_id','=','c.id')
        ->join('detalle_subcategoria_productos as dsp','dsp.subcategoria_id','=','sc.id')
        ->join('productos as p','dsp.producto_id','=','p.id')
        ->select('c.id as idcategoria','c.nombre as nombre')->distinct('nombre')
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
        ->select('sc.id as idcategoria','sc.nombre as nombre','sc.categoria_id')->distinct('nombre')
        ->get();

        return  $subcategorias;
    }

}