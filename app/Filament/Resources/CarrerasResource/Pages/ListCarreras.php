<?php

namespace App\Filament\Resources\CarrerasResource\Pages;

use App\Filament\Resources\CarrerasResource;
use Filament\Pages\Actions;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCarreras extends ListRecords
{
    protected static string $resource = CarrerasResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()->label('AÑADIR CARRERA')->button()->color('success')->icon('heroicon-o-plus'),
        ];
    }

    //En el método getTitle() se personaliza el título de la página a "Listado de Alumnos".
    protected function getTitle(): string
    {
        return 'Carreras';
    }
}
