<?php

namespace App\Filament\Resources\AlumnosResource\Pages;

use App\Filament\Resources\AlumnosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumnos extends EditRecord
{
    protected static string $resource = AlumnosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make()->label('Ver'),
            Actions\DeleteAction::make()->label('Eliminar'),
        ];
    }
}
