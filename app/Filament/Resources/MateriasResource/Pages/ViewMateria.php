<?php

namespace App\Filament\Resources\MateriasResource\Pages;

use App\Filament\Resources\MateriasResource;
use App\Models\Materias;
use Filament\Resources\Pages\Page;

class ViewMateria extends Page
{
    protected static string $resource = MateriasResource::class;

    protected static string $view = 'filament.resources.materias-resource.pages.view-materia';

    public $record;
    public function mount($record): void
    {
        $this->record = $record;
    }
    protected function getTitle(): string
    {
        // $materia = Materias::find($this->record);
        // return $materia->materia_nombre . ' - ' . $materia->carrera->carrera_nombre;
        return 'Detalle';
    }

    public function getViewData(): array{
        $materia = Materias::find($this->record);

        // Filtra los registros de estados de materia para encontrar los que tienen estado 'INSCRIPCION'
        $alumnosInscritos = $materia->registroEstadosMaterias->filter(function ($registro) {
            return $registro->estadoMateria->estadoMateria_estado === 'INSCRIPCION';
        });

        // Devuelve los datos en un array
        return [
            'materia' => $materia,
            'cantidadAlumnos' => $alumnosInscritos->count(),
        ];
    }
}
