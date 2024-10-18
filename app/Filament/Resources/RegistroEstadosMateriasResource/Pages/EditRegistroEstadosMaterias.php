<?php

namespace App\Filament\Resources\RegistroEstadosMateriasResource\Pages;

use App\Filament\Resources\RegistroEstadosMateriasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistroEstadosMaterias extends EditRecord
{
    protected static string $resource = RegistroEstadosMateriasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
