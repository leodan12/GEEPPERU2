<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Geep Perú',
            'email' => 'admin123_geepperu@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$vZkZ2HK8m6BBXPjntYhDp.4UdUIIX7D6j2qoAAL8J4kbI1MVATexS', // password
            'remember_token' => Str::random(10),
            'rol_id' => 1,
            'estado' => 1,
          ]);
          DB::table('users')->insert([
            'name' => 'LEODAN MACHUCA',
            'email' => 'mleodan9@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$vZkZ2HK8m6BBXPjntYhDp.4UdUIIX7D6j2qoAAL8J4kbI1MVATexS', // password
            'remember_token' => Str::random(10),
            'rol_id' => 2,
            'estado' => 1,
          ]);
        
    }
}
