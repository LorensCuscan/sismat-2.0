<?php

namespace App\Filament\Resources\ServiceOrderResource\Pages;

use App\Filament\Resources\ServiceOrderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceOrders extends ListRecords
{
    protected static string $resource = ServiceOrderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
