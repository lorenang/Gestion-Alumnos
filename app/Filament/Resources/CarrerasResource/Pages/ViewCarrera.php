<?php

namespace App\Filament\Resources\CarrerasResource\Pages;

use App\Filament\Resources\CarrerasResource;
use App\Models\Carreras;
use Filament\Resources\Pages\Page;

class ViewCarrera extends Page
{
    protected static string $resource = CarrerasResource::class;

    protected static string $view = 'filament.resources.carreras-resource.pages.view-carrera';
    public $record;
    public function mount($record): void
    {
        $this->record = $record;
    }

    protected function getTitle(): string
    {
        return 'Detalle';
    }

    public function getViewData(): array{
        $carrera = Carreras::find($this->record);
        // Devuelve los datos en un array
        return [
            'carrera' => $carrera,
            'carreras' => $carrera->alumnos,
            // 'materias' => $materias,
            // 'registrosEstados' => $registrosEstados,
        ];
    }
}
