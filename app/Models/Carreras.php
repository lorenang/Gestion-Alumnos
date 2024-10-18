<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carreras extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'Carreras';
    protected $primaryKey = 'carrera_id';
    protected $fillable = [
        'carrera_id',
        'carrera_nombre',
        'carrera_duracion',
        'usuario'
    ];

    // Relación con la tabla Materias (una carrera tiene muchas materias)
    public function materias()
    {
        return $this->hasMany(Materias::class, 'carrera_id');
    }
 
    // Relación con la tabla InscripcionesCarreras (una carrera puede tener muchas inscripciones de alumnos)
    public function inscripcionesCarrerasAlumnos()
    {
        return $this->belongsToMany(Alumnos::class, 'InscripcionesCarreras', 'carrera_id', 'alumno_id');
    }

    
}
