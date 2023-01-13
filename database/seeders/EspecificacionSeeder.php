<?php

namespace Database\Seeders;

use App\Models\Especificacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 


class EspecificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especificacion::create([
            'especificacion' => 'TIPO',
            'descripcion_id' => 1,
          ]);
          Especificacion::create([
            'especificacion' => 'MARCA',
            'descripcion_id' => 2,
          ]);
          Especificacion::create([
            'especificacion' => 'MODELO',
            'descripcion_id' => 2,
          ]);
          Especificacion::create([
            'especificacion' => 'PART NUMBER',
            'descripcion_id' => 2,
          ]);
          Especificacion::create([
            'especificacion' => 'TIPO',
            'descripcion_id' => 3,
          ]);
          Especificacion::create([
            'especificacion' => 'CAPACIDAD',
            'descripcion_id' => 4,
          ]);
          Especificacion::create([
            'especificacion' => 'TIPO',
            'descripcion_id' => 4,
          ]);
          Especificacion::create([
            'especificacion' => 'BUS',
            'descripcion_id' => 4,
          ]);
          Especificacion::create([
            'especificacion' => 'CAPACIDAD',
            'descripcion_id' => 5,
          ]);
          Especificacion::create([
            'especificacion' => 'TIPO',
            'descripcion_id' => 5,
          ]);
          Especificacion::create([
            'especificacion' => 'RESOLUCION',
            'descripcion_id' => 6,
          ]);
          Especificacion::create([
            'especificacion' => 'TAMAÑO',
            'descripcion_id' => 6,
          ]);
          Especificacion::create([
            'especificacion' => 'ESPECIFICACIONES',
            'descripcion_id' => 6,
          ]);
          Especificacion::create([
            'especificacion' => 'MARCA',
            'descripcion_id' => 7,
          ]);
          Especificacion::create([
            'especificacion' => 'CHIPSET',
            'descripcion_id' => 7,
          ]);
          Especificacion::create([
            'especificacion' => 'COMBINACION DE REALTEK',
            'descripcion_id' => 8,
          ]);
          Especificacion::create([
            'especificacion' => 'BLUETOOTH',
            'descripcion_id' => 8,
          ]);
          Especificacion::create([
            'especificacion' => 'PARLANTES',
            'descripcion_id' => 9,
          ]);
          Especificacion::create([
            'especificacion' => 'PUERTOS',
            'descripcion_id' => 9,
          ]);
          Especificacion::create([
            'especificacion' => 'WEBCAM',
            'descripcion_id' => 10,
          ]);
          Especificacion::create([
            'especificacion' => 'TOUCHPAD',
            'descripcion_id' => 10,
          ]);
          Especificacion::create([
            'especificacion' => 'USB TYPE-C',
            'descripcion_id' => 11,
          ]);
          Especificacion::create([
            'especificacion' => 'USB TYPE-A',
            'descripcion_id' => 11,
          ]);
          Especificacion::create([
            'especificacion' => 'HDMI',
            'descripcion_id' => 11,
          ]);
          Especificacion::create([
            'especificacion' => 'RJ-45',
            'descripcion_id' => 11,
          ]);
          Especificacion::create([
            'especificacion' => 'CONECTOR INTELIGENTE CA',
            'descripcion_id' => 11,
          ]);
          Especificacion::create([
            'especificacion' => 'LECTOR DE TARJETAS SD MULTIFORMATO',
            'descripcion_id' => 11,
          ]);
    }
}
