<?php

namespace App\Filament\Resources\MaintenanceTypeResource\Pages;

use App\Filament\Resources\MaintenanceTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaintenanceTypes extends ListRecords
{
    protected static string $resource = MaintenanceTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
