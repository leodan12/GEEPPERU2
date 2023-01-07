<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Respuestas;

class RespuestasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Respuestas::create([
            'pregunta_id' => 1,
            'respuesta' => 'Al Contado',

        ]);
        Respuestas::create([
            'pregunta_id' => 1,
            'respuesta' => 'Al Credito',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 1,
            'respuesta' => 'Al Financiamiento',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 2,
            'respuesta' => 'Implementacion de Redes',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 2,
            'respuesta' => 'Implementacion de Sistemas de Energia',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 2,
            'respuesta' => 'Implementacion de Data Center',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 2,
            'respuesta' => 'Implementacion de Soluciones de Virtualizacion',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 3,
            'respuesta' => 'Computadoras de Escritorio',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 3,
            'respuesta' => 'Computadoras Portatiles',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 3,
            'respuesta' => 'Impresoras',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 3,
            'respuesta' => 'Proyectores',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 3,
            'respuesta' => 'Repuestos y Accesorios de Computo',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 3,
            'respuesta' => 'Equipo de Control de Asistencia',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 3,
            'respuesta' => 'Camaras de vigilancia',
           
        ]);
        Respuestas::create([
            'pregunta_id' => 4,
            'respuesta' => 'Todos nuestros productos cuentan con una garantia de tienda de un año',
           
        ]);
    }
}
