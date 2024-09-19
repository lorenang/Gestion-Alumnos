<?php

namespace Database\Seeders;

use App\Models\Alumnos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumnos = [
            [
                'alumno_nombre' => 'Lorena', 
                'alumno_apellido' => 'Gomez', 
                'alumno_dni' => '42020000', 
                'alumno_telefono' => '12345678', 
                'alumno_correo' => 'lorenag@example.com',
                'usuario' => 'seeder'
            ],
            [
                'alumno_nombre' => 'Carlos', 
                'alumno_apellido' => 'Perez', 
                'alumno_dni' => '12345678', 
                'alumno_telefono' => '87654321', 
                'alumno_correo' => 'carlosp@example.com',
                'usuario' => 'seeder'
            ],
            
        ];

        foreach ($alumnos as $alumno) {
           Alumnos::create($alumno);
        }
    }
}
