<?php

namespace App\Filament\Resources\InscripcionesCarrerasResource\Pages;

use App\Filament\Resources\InscripcionesCarrerasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInscripcionesCarreras extends EditRecord
{
    protected static string $resource = InscripcionesCarrerasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
