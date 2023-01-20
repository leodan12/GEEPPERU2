<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Imagen;

class ImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Imagen::create([ 
            'imagen' => 'D_NQ_NP_659030-MPE40743416637_022020-Otercera.jpg',
            'producto_id' => 3,
        ]);
        Imagen::create([ 
            'imagen' => 'monitor-samsung-lc27r500fhlxpe-27-curvosegunda.jpg',
            'producto_id' => 3,
        ]); 
        Imagen::create([ 
            'imagen' => '7035_15795969196-100x100segunda.jpg',
            'producto_id' => 1,
        ]);
    }
}
