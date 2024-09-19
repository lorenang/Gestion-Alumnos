<?php

namespace Database\Seeders;

use App\Models\Carreras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carreras = [
            [
                'carrera_nombre' => 'Tecnicatura Superior en Programacion',
                'carrera_duracion' => 2,
                'usuario' => 'seeder'
            ],
            [
                'carrera_nombre' => 'Licenciatura en Sistemas de Informacion',
                'carrera_duracion' => 5,
                'usuario' => 'seeder'
            ],
            [
                'carrera_nombre' => 'Tecnicatura en Gestion Ambiental',
                'carrera_duracion' => 2,
                'usuario' => 'seeder'
            ],
            [
                'carrera_nombre' => 'Tecnicatura en Inteligencia Artificial',
                'carrera_duracion' => 2,
                'usuario' => 'seeder'
            ]
        ];

        foreach ($carreras as $carrera) {
            Carreras::create($carrera);
        }
    }
}
