<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadosMaterias extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'EstadosMaterias';
    protected $primaryKey = 'estadoMateria_id';
    protected $fillable = [
        'estadoMateria_id',
        'estadoMateria_estado',
        'usuario'
    ];

    // Relación con los registros de estado
    public function registros()
    {
        return $this->hasMany(RegistroEstadosMaterias::class, 'estadoMateria_id');
    }

    // Relación con el historial de estado
    public function historiales()
    {
        return $this->hasMany(HistorialEstadosMaterias::class, 'estadoMateria_id');
    }
}
