<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function cotizacion($id)
    {
        $cotizacion = DB::table('cotizaciones as c')
            ->join('cotizaciones_detalles as cd', 'cd.cotizacion_id', '=', 'c.id')
            ->join('productos as p', 'cd.producto_id', '=', 'p.id')
            ->select(
                'c.id as idcotizacion',
                'c.fecha',
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

        $pdf = PDF::loadView('pdf/cotizacion', ["cotizacion" => $cotizacion]);
        return $pdf->stream('Cotizacion.pdf');
    }
}
