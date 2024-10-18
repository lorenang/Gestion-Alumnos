<?php

namespace App\Filament\Resources\MateriasResource\Pages;

use App\Filament\Resources\MateriasResource;
use Filament\Pages\Actions;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMaterias extends ListRecords
{
    protected static string $resource = MateriasResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make()->label('AÑADIR MATERIA')->button()->color('success')->icon('heroicon-o-plus'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Materias';
    }
}
