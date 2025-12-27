<?php

namespace App\Filament\Resources\Kotas\Pages;

use App\Filament\Resources\Kotas\KotaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKotas extends ListRecords
{
    protected static string $resource = KotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
