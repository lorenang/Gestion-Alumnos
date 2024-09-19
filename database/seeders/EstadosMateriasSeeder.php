<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosMateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            [
                'estadoMateria_estado' => 'INSCRIPCION',
                'usuario' => 'seeder'
            ],
            [
                'estadoMateria_estado' => 'REINSCRIPCION',
                'usuario' => 'seeder'
            ],
            [
                'estadoMateria_estado' => 'APROBADO',
                'usuario' => 'seeder'
            ],
            [
                'estadoMateria_estado' => 'DESAPROBADO',
                'usuario' => 'seeder'
            ],
            [
                'estadoMateria_estado' => 'REGULAR',
                'usuario' => 'seeder'
            ],
            [
                'estadoMateria_estado' => 'LIBRE',
                'usuario' => 'seeder'
            ],
        ];
    }
}
