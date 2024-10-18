<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Alumnos extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'Alumnos';
    protected $primaryKey = 'alumno_id';
    protected $fillable = [
        'alumno_id',
        'alumno_nombre',
        'alumno_apellido',
        'alumno_dni',
        'alumno_telefono',
        'alumno_correo',
        'usuario'
    ];

    // Relación muchos a muchos con la tabla Carreras, a través de InscripcionesCarreras
    public function carreras() {
        return $this->belongsToMany(Carreras::class, 'InscripcionesCarreras', 'alumno_id', 'carrera_id')
                    ->withPivot('inscripcionCarrera_legajo', 'inscripcionCarrera_estado', 'usuario');
    }

    public function inscripcionesCarreras() {
        return $this->hasMany(InscripcionesCarreras::class, 'alumno_id');
    }

    
    // Relación muchos a muchos con la tabla Materias, a través de RegistroEstadosMaterias
    public function materias() {
        return $this->belongsToMany(Materias::class, 'RegistroEstadosMaterias', 'alumno_id', 'materia_id')
                    ->withPivot('materia_nota', 'estadoMateria_id', 'usuario');
    }

    public function inscripcionesMaterias() {
        return $this->hasMany(RegistroEstadosMaterias::class, 'alumno_id');
    }

}
