<?php

namespace Database\Seeders;

use App\Models\Materias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materias = [
            [
                'materia_nombre' => 'Matematica I',
                'materia_horasCursado' => 50,
                'materia_duracion' => 'CUATRIMESTRAL',
                'carrera_id' => 1,
                'usuario' => 'seeder',
            ],
            [
                'materia_nombre' => 'Matematica II',
                'materia_horasCursado' => 50,
                'materia_duracion' => 'CUATRIMESTRAL',
                'carrera_id' => 1,
                'usuario' => 'seeder',
            ],
            [
                'materia_nombre' => 'Logica y Estructura de Datos',
                'materia_horasCursado' => 50,
                'materia_duracion' => 'CUATRIMESTRAL',
                'carrera_id' => 1,
                'usuario' => 'seeder',
            ],
            [
                'materia_nombre' => 'Programacion I',
                'materia_horasCursado' => 80,
                'materia_duracion' => 'CUATRIMESTRAL',
                'carrera_id' => 1,
                'usuario' => 'seeder',
            ],
            [
                'materia_nombre' => 'Algebra I',
                'materia_horasCursado' => 62,
                'materia_duracion' => 'CUATRIMESTRAL',
                'carrera_id' => 2,
                'usuario' => 'seeder',
            ],
            [
                'materia_nombre' => 'Algebra II',
                'materia_horasCursado' => 60,
                'materia_duracion' => 'CUATRIMESTRAL',
                'carrera_id' => 2,
                'usuario' => 'seeder',
            ],
            [
                'materia_nombre' => 'Base de Datos',
                'materia_horasCursado' => 120,
                'materia_duracion' => 'ANUAL',
                'carrera_id' => 2,
                'usuario' => 'seeder',
            ],
        ];

        foreach ($materias as $materia) {
            Materias::create($materia);
        }
    }
}
