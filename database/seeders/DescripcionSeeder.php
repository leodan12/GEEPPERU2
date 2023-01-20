<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Descripcion;

class DescripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Descripcion::create([
            'descripcion' => 'FORMATO',
          ]);
          Descripcion::create([
            'descripcion' => 'DESCRIPCION',
          ]);
          Descripcion::create([
            'descripcion' => 'PROCESADOR',
          ]);
          Descripcion::create([
            'descripcion' => 'MEMORIA',
          ]);
          Descripcion::create([
            'descripcion' => 'ALMACENAMIENTO',
          ]);
          Descripcion::create([
            'descripcion' => 'PANTALLA',
          ]);
          Descripcion::create([
            'descripcion' => 'TARJETA DE VIDEO',
          ]);
          Descripcion::create([
            'descripcion' => 'CONECTIVIDAD',
          ]);
          Descripcion::create([
            'descripcion' => 'SONIDO',
          ]);
          Descripcion::create([
            'descripcion' => 'INCORPORA',
          ]);
          Descripcion::create([
            'descripcion' => 'PUERTOS',
          ]);
          Descripcion::create([
            'descripcion' => 'BATERIA',
          ]);

    }
}
