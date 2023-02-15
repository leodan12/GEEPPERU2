<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cotizaciones;
use App\Models\CotizacionesDetalle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class CotizacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        //$ventas = venta::all();
        $cotizaciones = $this->listar();

        $buscarpor = $request->get('buscarproducto');

        // return $cotizaciones;
        return view("cotizacion/index", [
            'cotizaciones' => $cotizaciones,
            'buscarpor' => $buscarpor,
        ]);
    }
    public function listar()
    {
        $cotizaciones = DB::table('cotizaciones as c')
            //->join('cotizaciones_detalles as cd','cd.cotizacion_id','=','c.id') 
            //->join('productos as p','cd.producto_id','=','p.id')
            ->select(
                'c.id as idcotizacion',
                'c.fecha',
                'c.nombre',
                'c.documento',
                'c.descuento',
                'c.costototal',
                'c.estado'
                //,'cd.cantidad','cd.preciototal','p.name','p.price'
            )
            ->where('c.state', '=', 1)
            ->orderBy('id', 'desc')->get();

        return $cotizaciones;
    }
    public function create(Request $request)
    {
        $buscarpor = $request->get('buscarproducto');
        $productos = Producto::all();

        return view("cotizacion/create", ['productos' => $productos, 'buscarpor' => $buscarpor]);
    }

    public function store(Request $request)
    {
        //Regla de validación
        $rules = [
            'fecha' => 'required|string',
            'nombre' => 'required',
            'documento' => 'required|string',
            'descuento' => 'required',
            'descripcion' => 'required',
            'costototal' => 'required'

        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //Instancia modelo Gender
        $cotizacion = new Cotizaciones;
        //Llevanos el modelo con los datos del Request
        $cotizacion->fecha = $request->fecha;
        $cotizacion->nombre = $request->nombre;
        $cotizacion->documento = $request->documento;
        $cotizacion->descuento = $request->descuento;
        $cotizacion->descripcion = $request->descripcion;
        $cotizacion->costototal = $request->costototal;
        $cotizacion->estado = "COTIZADO";
        $cotizacion->state = 1;
        //Guardamos
        if ($cotizacion->save()) {

            $respuesta =  1;
            $cantidad = $request->Lcantidad;
            $producto = $request->Lproducto;
            $preciototal = $request->Lpreciototal;

            if ($cantidad !== null) {
                for ($i = 0; $i < count($cantidad); $i++) {

                    $DetalleCotizacion = new CotizacionesDetalle;
                    $DetalleCotizacion->cantidad = $cantidad[$i];
                    $DetalleCotizacion->producto_id = $producto[$i];
                    $DetalleCotizacion->preciototal = $preciototal[$i];
                    $DetalleCotizacion->cotizacion_id = $cotizacion->id;
                    $DetalleCotizacion->save();
                }
            }

            return redirect('cotizacion/index')->with('respuesta', $respuesta);
        } else {

            $respuesta = -1;
            return redirect('cotizacion/index')->with('respuesta', $respuesta);
        }
    }

    public function show($id)
    {
        $cotizaciones = DB::table('cotizaciones as c')
            ->join('cotizaciones_detalles as cd', 'cd.cotizacion_id', '=', 'c.id')
            ->join('productos as p', 'cd.producto_id', '=', 'p.id')
            ->select(
                'c.id as idcotizacion',
                'c.fecha as fecha',
                'c.nombre',
                'c.documento',
                'c.descuento',
                'c.costototal',
                'c.estado',
                'cd.cantidad',
                'cd.preciototal',
                'p.name',
                'p.price'
            )
            ->where('c.id', '=', $id)->get();
        return $cotizaciones;
    }

    public function edit($id)
    {
        $cotizacion = Cotizaciones::find($id);

        $productos = DB::table('productos as p')->get();

        $detallescotizaciones = DB::table('cotizaciones_detalles as cd')
            ->join('cotizaciones as c', 'cd.cotizacion_id', '=', 'c.id')
            ->join('productos as p', 'cd.producto_id', '=', 'p.id')
            ->select('c.id as idcotizacion', 'cd.id as iddetallecotizacion', 'cd.producto_id as idproducto', 'p.name', 'p.price', 'cd.cantidad', 'cd.preciototal')
            ->where('c.id', '=', $id)->get();

        //$clientes = Cliente::all();

        return view('cotizacion/edit', ['detallescotizaciones' => $detallescotizaciones, 'productos' => $productos, 'cotizacion' => $cotizacion]);
    }

    public function update(Request $request, $id)
    {
        //Regla de validación
        $rules = [
            'fecha' => 'required|string',
            'nombre' => 'required',
            'documento' => 'required|string',
            'descuento' => 'required',
            'costototal' => 'required',
            'descripcion' => 'required',
            'estado' => 'required'

        ];
        //Usamos el Facade Validator para validar nuestra regla respecto a los datos recibidos en Request
        $validator = Validator::make($request->all(), $rules);
        //Si falla la validacion retornamos los errores
        if ($validator->fails()) {
            return $validator->errors();
        }
        //Instancia modelo Gender
        $cotizacion = Cotizaciones::find($id);
        //Llevanos el modelo con los datos del Request
        $cotizacion->fecha = $request->fecha;
        $cotizacion->nombre = $request->nombre;
        $cotizacion->descripcion = $request->descripcion;
        $cotizacion->documento = $request->documento;
        $cotizacion->descuento = $request->descuento;
        $cotizacion->costototal = $request->costototal;
        $cotizacion->estado = $request->estado;
        $cotizacion->state = 1;
        //Guardamos
        if ($cotizacion->update()) {

            $respuesta =  2;
            $cantidad = $request->Lcantidad;
            $producto = $request->Lproducto;
            $preciototal = $request->Lpreciototal;

            if ($cantidad !== null) {
                for ($i = 0; $i < count($cantidad); $i++) {

                    $DetalleCotizacion = new CotizacionesDetalle;
                    $DetalleCotizacion->cantidad = $cantidad[$i];
                    $DetalleCotizacion->producto_id = $producto[$i];
                    $DetalleCotizacion->preciototal = $preciototal[$i];
                    $DetalleCotizacion->cotizacion_id = $cotizacion->id;
                    $DetalleCotizacion->save();
                }
            }

            return redirect('cotizacion/index')->with('respuesta', $respuesta);
        } else {

            $respuesta = -2;
            return redirect('cotizacion/index')->with('respuesta', $respuesta);
        }
    }

    public function destroy($id)
    {
        //buscamos el registro con el id enviado por la URL
        $cotizacion = Cotizaciones::find($id);
        if ($cotizacion) {

            $cotizacion->state = 0;
            if ($cotizacion->update()) {

                $respuesta =  3;
                return redirect('cotizacion/index')->with('respuesta', $respuesta);
            } else {

                $respuesta =  -3;
                return redirect('cotizacion/index')->with('respuesta', $respuesta);
            }
        } else {

            $respuesta =  -5;
            return redirect('cotizacion/index')->with('respuesta', $respuesta);
        }
    }
    public function destroydetallecotizacion($id)
    {
        //buscamos el registro con el id enviado por la URL
        $detallecotizacion = CotizacionesDetalle::find($id);
        $dato = 0;

        if ($detallecotizacion) {
            if ($detallecotizacion->delete()) {
                $dato = 1;
                return $dato;
            }
        }
    }
}
