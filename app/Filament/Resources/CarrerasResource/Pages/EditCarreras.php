<?php

namespace App\Filament\Resources\CarrerasResource\Pages;

use App\Filament\Resources\CarrerasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarreras extends EditRecord
{
    protected static string $resource = CarrerasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('Eliminar'),
        ];
    }
}
