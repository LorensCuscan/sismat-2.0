<?php

namespace App\Filament\Resources\MaintenanceTypeResource\Pages;

use App\Filament\Resources\MaintenanceTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaintenanceType extends EditRecord
{
    protected static string $resource = MaintenanceTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
