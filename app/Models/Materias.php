<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Materias extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'Materias';
    protected $primaryKey = 'materia_id';
    protected $fillable = [
        'materia_id',
        'materia_nombre',
        'materia_horasCursado',
        'materia_duracion',
        'carrera_id',
        'usuario'
    ];
    
    // Relación con el modelo Carrera (una materia pertenece a una carrera)
    public function carrera()
    {
        return $this->belongsTo(Carreras::class, 'carrera_id');
    }

    // Relación con el modelo RegistroEstadosMaterias (una materia puede tener muchos alumnos inscritos)
    public function registroEstadosMaterias()
    {
        return $this->hasMany(RegistroEstadosMaterias::class, 'materia_id');
    }
}
