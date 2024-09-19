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

    // Relación con la tabla InscripcionesCarreras (un alumno puede tener muchas inscripciones)
    public function inscripcionesCarreras()
    {
        return $this->hasMany(InscripcionesCarreras::class, 'alumno_id');
    }

    // Relación con la tabla RegistroEstadosMaterias (un alumno puede estar inscrito en varias materias)
    public function registroEstadosMaterias()
    {
        return $this->hasMany(RegistroEstadosMaterias::class, 'alumno_id');
    }

}
