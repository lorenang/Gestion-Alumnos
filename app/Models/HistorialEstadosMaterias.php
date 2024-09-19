<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistorialEstadosMaterias extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'HistorialEstadosMaterias';
    protected $primaryKey = 'historialEstadoMateria_id';
    protected $fillable = [
        'historialEstadoMateria_id',
        'registroEstadoMateria_id',
        'estadoMateria_id'
    ];

    // Relación con el modelo RegistroEstadoMateria (un historial pertenece a un registro)
    public function registroEstadoMateria()
    {
        return $this->belongsTo(RegistroEstadosMaterias::class, 'registroEstadoMateria_id');
    }

    // Relación con el modelo EstadoMateria (un historial tiene un estado de materia)
    public function estadoMateria()
    {
        return $this->belongsTo(EstadosMaterias::class, 'estadoMateria_id');
    }
}
