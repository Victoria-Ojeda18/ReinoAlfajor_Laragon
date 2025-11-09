<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Alfajor de Chocolate Blanco',
                'descripcion' => 'Clásico alfajor con dulce de leche artesanal',
                'precio' => 150,
                'imagen' => 'media/alfajorblanco2.jpg',
            ],
            [
                'nombre' => 'Alfajor de Chocolate Negro',
                'descripcion' => 'Cubierto con chocolate belga premium, relleno de dulce de leche',
                'precio' => 180,
                'imagen' => 'media/alfajornegro1.jpg',
            ],
            [
                'nombre' => 'Alfajor de Maicena',
                'descripcion' => 'Suave y delicado, tradición argentina',
                'precio' => 140,
                'imagen' => 'media/alfajoresMaicena3.jpg',
            ],
        ]);
    }
}
