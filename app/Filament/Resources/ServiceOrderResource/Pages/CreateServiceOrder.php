<?php

namespace App\Filament\Resources\ServiceOrderResource\Pages;

use App\Filament\Resources\ServiceOrderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceOrder extends CreateRecord
{
    protected static string $resource = ServiceOrderResource::class;
}
