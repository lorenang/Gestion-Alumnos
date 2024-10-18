<?php

namespace App\Filament\Resources\RegistroEstadosMateriasResource\Pages;

use App\Filament\Resources\RegistroEstadosMateriasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistroEstadosMaterias extends ListRecords
{
    protected static string $resource = RegistroEstadosMateriasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
