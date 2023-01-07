<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Preguntas;

class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Preguntas::create([
            'pregunta' => '¿TIPOS DE PAGO ACEPTADOS?',
           
        ]);
        Preguntas::create([
            'pregunta' => '¿QUE SOLUCIONES BRINDAN?',
           
        ]);
        Preguntas::create([
            'pregunta' => '¿QUE PRODUCTOS COMERCIALIZAN?',
           
        ]);
        Preguntas::create([
            'pregunta' => '¿CUANTO TIEMPO DE GARANTIA TIENE SUS PRODUCTOS?',
           
        ]);
       

    }
}
