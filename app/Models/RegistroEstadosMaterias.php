<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistroEstadosMaterias extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'RegistroEstadosMaterias';
    protected $primaryKey = 'registroEstadoMateria_id';
    protected $fillable = [
        'registroEstadoMateria_id',
        'usuario',
        'alumno_id',
        'materia_id',
        'estadoMateria_id'
    ];

    // Relación con el modelo Alumno (un registro pertenece a un alumno)
    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'alumno_id');
    }

    // Relación con el modelo Materia (un registro pertenece a una materia)
    public function materia()
    {
        return $this->belongsTo(Materias::class, 'materia_id');
    }

    // Relación con el modelo EstadoMateria (un registro tiene un estado de materia)
    public function estadoMateria()
    {
        return $this->belongsTo(EstadosMaterias::class, 'estadoMateria_id');
    }
}
