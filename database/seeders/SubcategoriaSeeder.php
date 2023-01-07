<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subcategoria;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategoria::create([
            'nombre' => 'AUDIFONOS',
            'categoria_id'=>1,
          ]);
          Subcategoria::create([
            'nombre' => 'CAMARA WEB',
            'categoria_id'=>1,
          ]);
          Subcategoria::create([
            'nombre' => 'PARLANTES',
            'categoria_id'=>1,
          ]);
          Subcategoria::create([
            'nombre' => 'ALL IN ONE',
            'categoria_id'=>2,
          ]);
          Subcategoria::create([
            'nombre' => 'PC DE ESCRITORIO',
            'categoria_id'=>2,
          ]);
          Subcategoria::create([
            'nombre' => 'PC GAMER',
            'categoria_id'=>2,
          ]);
          Subcategoria::create([
            'nombre' => 'LAPTOP NOTEBOOK',
            'categoria_id'=>3,
          ]);
          Subcategoria::create([
            'nombre' => 'LAPTOP GAMER',
            'categoria_id'=>3,
          ]);
          Subcategoria::create([
            'nombre' => 'SILLAS',
            'categoria_id'=>4,
          ]);
          Subcategoria::create([
            'nombre' => 'LAPTOP GAMER',
            'categoria_id'=>4,
          ]);
          Subcategoria::create([
            'nombre' => 'COMPONENTES',
            'categoria_id'=>4,
          ]);
          Subcategoria::create([
            'nombre' => 'IMPRESORAS',
            'categoria_id'=>5,
          ]);
          Subcategoria::create([
            'nombre' => 'SUMINISTROS',
            'categoria_id'=>5,
          ]);
          Subcategoria::create([
            'nombre' => 'DESCUENTOS',
            'categoria_id'=>6,
          ]);
          Subcategoria::create([
            'nombre' => 'MONITORES',
            'categoria_id'=>7,
          ]);
          Subcategoria::create([
            'nombre' => 'PROYECTORES',
            'categoria_id'=>7,
          ]);
          Subcategoria::create([
            'nombre' => 'MOUSE',
            'categoria_id'=>1,
          ]);
    }
}
