<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cotizaciones;

class CotizacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cotizaciones::create([
            'fecha' => '2022-12-10',
            'nombre' => 'Leandro Villarroel',
            'documento' => '12345678',
            'descuento' => 99.9,
            'costototal' => 9500.05,
            'estado' => 'COTIZADO',
            'state' => 1,
        ]);
        Cotizaciones::create([
            'fecha' => '2022-09-05',
            'nombre' => 'Leodan Machuca',
            'documento' => '98653274',
            'descuento' => 89.8,
            'costototal' => 1300.08,
            'estado' => 'COTIZADO',
            'state' => 1,
        ]);
    }
}
