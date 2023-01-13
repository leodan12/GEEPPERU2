<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'name' => 'LAPTOP HP PAVILION 15-EC2501LA RYZEN 5- 5600H 4.2GHZ 8GB 256GB-SSD GTX-1650 4GB 15.6″',
            'marca' => 'HP',
            'descripcion' => '15 pulgadas, 1TB HDD, 32GB RAM',
            'price' => 3429.00,
            'oferta' => 1,
            'porcentajedescuento' => 10,
            'stock' => 10,
            'image_path' => 'laptop-hp-pavilon.jpg'
        ]);

        Producto::create([
            'name' => 'Acer Laptop CI5 11400H 2.70 GHz, RAM 12GB DDR4 , 256GB SSD , GTX 1650 4GB GDDR6',
            'marca' => 'Acer',
            'descripcion' => '15 pulgadas, 1TB HDD, 8GB RAM',
            'price' => 3699.00, 
            'porcentajedescuento' => 0,
            'oferta' => 0,
            'stock' => 20,
            'image_path' => 'laptop-acer-ci511400.png'
        ]);
        Producto::create([
            'name' => 'MONITOR SAMSUNG LED CURVO AMD FREESYNC LC27R500FHLXPE 27',
            'marca' => 'SAMSUNG',
            'descripcion' => '27 pulgadas, LED Display, Resolución 1366 x 768',
            'price' => 719.00,
            'oferta' => 1,
            'porcentajedescuento' => 5,
            'stock' => 40,
            'image_path' => 'monitor-27-samsung-lc27r500fhlxpe-fhd-vga-hdmi-curvo.jpg'
        ]);

        Producto::create([
            'name' => 'All-in-One HP 200 G4 22 CORE I3 DECIMA',
            'marca' => 'HP',
            'descripcion' => '22.1 pulgadas, 8GB 4GB RAM',
            'price' => 649.99,
            'oferta' => 0,
            'porcentajedescuento' => 0,
            'stock' => 10,
            'image_path' => 'All-in-One-HP-200.png'
        ]);

        Producto::create([
            'name' => 'AURICULAR MSI IMMERSER GH30-V2',
            'marca' => 'MSI',
            'descripcion' => 'AURICULAR MSI IMMERSER GH30-V2',
            'price' => 179.00,
            'oferta' => 1,
            'porcentajedescuento' => 10,
            'stock' => 0,
            'image_path' => 'IMMERSE-GH30-V2.jpg'
        ]);

        Producto::create([
            'name' => 'MONITOR TEROS CURVO TE-3176N',
            'marca' => 'TEROS',
            'descripcion' => '32 pulgadas, LED Display, Resolución 1366 x 768',
            'price' => 759.00,
            'oferta' => 0,
            'porcentajedescuento' => 0,
            'stock' => 4,
            'image_path' => '5081c5b5c1ec7ac5940e1de7370700c9-product.jpg'
        ]);

        Producto::create([
            'name' => 'CÁMARA TEROS TE-9060, HASTA 720P, MICRÓFONO INCORPORADO, USB 2.0.',
            'marca' => 'TEROS',
            'descripcion' => '16.1MP, 5x Optical Zoom',
            'price' => 65.99,
            'oferta' => 1,
            'porcentajedescuento' => 10,
            'stock' => 4,
            'image_path' => 'CAM-TEROS-720P.png'
        ]);
        Producto::create([
            'name' => 'MONITOR LED TEROS 27″ TE-3178N IPS QHD 75HZ 2MS FLAT FHD',
            'marca' => 'TEROS',
            'descripcion' => '27 pulgadas, LED Display, Resolución 1366 x 768',
            'price' => 419.99,
            'oferta' => 0,
            'porcentajedescuento' => 0,
            'stock' => 3,
            'image_path' => 'mov27te3178n.jpg'
        ]);
        Producto::create([
            'name' => 'COMPUTADORA INTEL CORE I3 DECIMA 4GB DDR4 VIDEO GT710 2GB',
            'marca' => 'HP',
            'descripcion' => '5.5 pulgadas, 32GB 4GB RAM',
            'price' => 2480.00,
            'oferta' => 0,
            'porcentajedescuento' => 0, 
            'stock' => 10,
            'image_path' => 'compu-i3.jpg'
        ]);
        Producto::create([
            'name' => 'PC COMPLETA CORE i5 10th',
            'marca' => 'HP',
            'descripcion' => '24 pulgadas, LED Display, Resolución 1366 x 768',
            'price' => 2099.00,
            'oferta' => 1,
            'porcentajedescuento' => 10,
            'stock' => 5,
            'image_path' => 'POST-nept-computer-PC-CORE-I3-10th-WEB-.png'
        ]);
        Producto::create([
            'name' => 'COMPUTADORA HP 260 G4 CORE I3',
            'marca' => 'HP',
            'descripcion' => '260gb disco duro 4gb RAM',
            'price' => 2099.00,
            'oferta' => 1,
            'porcentajedescuento' => 5,
            'stock' => 2,
            'image_path' => 'MINI-PC-HP-260-G4-CI3.jpg'
        ]);
        Producto::create([
            'name' => 'AURICULAR ONIKUMA K1B',
            'marca' => 'ONIKUMA',
            'descripcion' => 'Material: este auricular está hecho de buen material, que es duradero.',
            'price' => 59.00,
            'oferta' => 1,
            'porcentajedescuento' => 5,
            'stock' => 0,
            'image_path' => 'D_NQ_NP_2X_819698-MLA45269545145_032021-V.webp'
        ]); 
        Producto::create([
            'name' => 'COMBO TEROS GAMING TECLADO + MOUSE + PAD + AURICULAR Modelo 4050 USB',
            'marca' => 'TEROS',
            'descripcion' => 'DISEÑO ESTÁNDAR IDIOMA ESPAÑOL COLOR COLOR NEGRO / AZUL',
            'price' => 80.00,
            'oferta' => 1,
            'porcentajedescuento' => 10,
            'stock' => 10,
            'image_path' => 'combo-teros.fw_.png'
        ]);
        Producto::create([
            'name' => 'AURICULAR ONIKUMA K5 PRO',
            'marca' => 'ONIKUMA',
            'descripcion' => 'Frecuencia de auricular: 20 - 20000 Hz   Tecnología de conectividad: Alámbrico',
            'price' => 69.00,
            'oferta' => 1,
            'porcentajedescuento' => 10,
            'stock' => 10,
            'image_path' => 'HTB1bhGuah_rK1RkHFqDq6yJAFXaa.jpg'
        ]);
        Producto::create([
            'name' => 'MOUSE GAMING TEROS',
            'marca' => 'TEROS',
            'descripcion' => 'Modelo: TE-5164 Puerto: Usb Rango de DPI: 6400',
            'price' => 25.00,
            'oferta' => 1,
            'porcentajedescuento' => 5,
            'stock' => 10,
            'image_path' => 'teros-gamin.jpg'
        ]); 
        Producto::create([
            'name' => 'MOUSE GAMER HALION RANGER HA-M506 RGB 6B',
            'marca' => 'HALION',
            'descripcion' => 'Mouse Óptico Conector USB 2.0 Color: Negro Rubber  6 botones',
            'price' => 39.00,
            'oferta' => 1,
            'porcentajedescuento' => 20,
            'stock' => 10,
            'image_path' => 'K506-RANGER-2.jpg'
        ]); 

    }
}
