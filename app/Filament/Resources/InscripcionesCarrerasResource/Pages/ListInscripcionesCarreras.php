<?php

namespace App\Filament\Resources\InscripcionesCarrerasResource\Pages;

use App\Filament\Resources\InscripcionesCarrerasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInscripcionesCarreras extends ListRecords
{
    protected static string $resource = InscripcionesCarrerasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
