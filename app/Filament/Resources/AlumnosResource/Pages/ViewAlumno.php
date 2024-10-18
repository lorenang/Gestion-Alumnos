<?php

namespace App\Filament\Resources\AlumnosResource\Pages;

use App\Filament\Resources\AlumnosResource;
use App\Models\Alumnos;
use App\Models\Carreras;
use App\Models\EstadosMaterias;
use App\Models\InscripcionesCarreras;
use App\Models\Materias;
use App\Models\RegistroEstadosMaterias;
use Auth;
use Filament\Forms\Components\Hidden;
use Filament\Pages\Actions\EditAction;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions;
use Illuminate\Support\Facades\DB;

class ViewAlumno extends Page
{
    protected static string $resource = AlumnosResource::class;

    protected static string $view = 'filament.resources.alumnos-resource.pages.view-alumno';

    public $record;
    public function mount($record): void
    {
        $this->record = $record;
    }

    protected function getTitle(): string
    {
        $alumno = Alumnos::find($this->record);
        return $alumno->alumno_nombre . ' ' . $alumno->alumno_apellido;
    }

    public function getViewData(): array{
        $alumno = Alumnos::find($this->record);
        // Devuelve los datos en un array
        return [
            'alumno' => $alumno,
        ];
    }
}
