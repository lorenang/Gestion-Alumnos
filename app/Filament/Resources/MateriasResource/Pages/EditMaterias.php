<?php

namespace App\Filament\Resources\MateriasResource\Pages;

use App\Filament\Resources\MateriasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaterias extends EditRecord
{
    protected static string $resource = MateriasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
