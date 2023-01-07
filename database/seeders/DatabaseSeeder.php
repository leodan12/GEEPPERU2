<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrincipaleSeeder::class);
        $this->call(CategoriaSeeder::class); 
        $this->call(SubcategoriaSeeder::class); 
        $this->call(ProductosTableSeeder::class);
        $this->call(DetalleSubcategoriaProductoSeeder::class);
        $this->call(PreguntasSeeder::class);
        $this->call(RespuestasSeeder::class);
        $this->call(CotizacionesSeeder::class);
        $this->call(CotizacionesDetalleSeeder::class);
    }
}
