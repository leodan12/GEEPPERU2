<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'ACCESORIOS DE COMPUTACION',
          ]);
          Categoria::create([
            'nombre' => 'COMPUTADORAS',
          ]);
          Categoria::create([
            'nombre' => 'LAPTOPS',
          ]); 
          Categoria::create([
            'nombre' => 'GAMER',
          ]);
          Categoria::create([
            'nombre' => 'IMPRESIONES',
          ]);
          Categoria::create([
            'nombre' => 'OFERTAS',
          ]);
          Categoria::create([
            'nombre' => 'MONITORES Y PROYECTORES',
          ]);
    }
}
