<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
   /* public function shop()
    {
        $productos = Producto::all();
       //dd($products);
        return view('inicio')->with(['productos' => $productos]);
    }*/
   /* public function inicio()
    {
        //$productos = Producto::all();
        //dd($products);
        //$categorias =Categoria::all();
        $categorias =DB::table('categorias as c')
        ->join('subcategorias as sc','sc.categoria_id','=','c.id')
        ->join('productos as p','p.subcategoria_id','=','sc.id')
        ->select('c.id as idcategoria','c.nombre as nombre')->distinct('nombre')
        ->get();

        $productos=DB::table('productos as p')
        ->join('subcategorias as sc','p.subcategoria_id','=','sc.id')  
        ->select(  'p.id','sc.id as idsubcategoria ','sc.categoria_id as idcategoria',
        'p.slug','p.details','p.price','p.shipping_cost','p.description','p.subcategoria_id',
        'p.brand_id','p.image_path','p.name' )->get() ;
        return view('inicio2')->with(['productos' => $productos,'categorias' => $categorias]);
    }*/
    
    public function cart(Request $request)  {

        $cartCollection = \Cart::getContent();

        $buscarpor = $request->get('buscarproducto');
         
        return view('cart')->with(['cartCollection' => $cartCollection,
        'buscarpor' => $buscarpor]);;
    }



    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }



    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img 
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

 

}

