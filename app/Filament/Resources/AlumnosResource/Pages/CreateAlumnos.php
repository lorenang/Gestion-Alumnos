<?php

namespace App\Filament\Resources\AlumnosResource\Pages;

use App\Filament\Resources\AlumnosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAlumnos extends CreateRecord
{
    protected static string $resource = AlumnosResource::class;

    protected function getTitle(): string
    {
        return 'NUEVO ALUMNO';
    }
}
