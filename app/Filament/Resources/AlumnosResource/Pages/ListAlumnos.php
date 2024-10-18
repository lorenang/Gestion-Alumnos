<?php

namespace App\Filament\Resources\AlumnosResource\Pages;

use App\Filament\Resources\AlumnosResource;
use Filament\Pages\Actions;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAlumnos extends ListRecords
{
    protected static string $resource = AlumnosResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()->label('ALTA ALUMNO')->button()->color('success')->icon('heroicon-o-plus'),
        ];
    }
    //En el método getTitle() se personaliza el título de la página a "Listado de Alumnos".
    protected function getTitle(): string
    {
        return 'Alumnos';
    }
}
