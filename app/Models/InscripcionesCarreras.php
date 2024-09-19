<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InscripcionesCarreras extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'InscripcionesCarreras';
    protected $primaryKey = 'inscripcionCarrera_id';
    protected $fillable = [
        'inscrcipcionCarrera_id',
        'inscripcionCarrera_legajo',
        'inscripcionCarrera_estado',
        'carrera_id',
        'alumno_id',
        'usuario'
    ];
    // Relación con el modelo Alumno (una inscripción pertenece a un alumno)
    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'alumno_id');
    }

    // Relación con el modelo Carrera (una inscripción pertenece a una carrera)
    public function carrera()
    {
        return $this->belongsTo(Carreras::class, 'carrera_id');
    }
}
