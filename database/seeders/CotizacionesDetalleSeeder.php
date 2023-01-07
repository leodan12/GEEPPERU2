<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CotizacionesDetalle;


class CotizacionesDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CotizacionesDetalle::create([
            'cantidad' => 2,
            'producto_id' => 1,
            'preciototal' => 4999.98,
            'cotizacion_id' => 1, 
        ]);
        CotizacionesDetalle::create([
            'cantidad' => 3,
            'producto_id' => 2,
            'preciototal' => 4499.97,
            'cotizacion_id' => 1, 
        ]);
        CotizacionesDetalle::create([
            'cantidad' => 2,
            'producto_id' => 3,
            'preciototal' => 1299.98,
            'cotizacion_id' => 2, 
        ]);
        CotizacionesDetalle::create([
            'cantidad' => 10,
            'producto_id' => 4,
            'preciototal' => 89.9,
            'cotizacion_id' => 2, 
        ]);

    }
}
