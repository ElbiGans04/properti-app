<?php

namespace App\Filament\Resources\Provinsis\Pages;

use App\Filament\Resources\Provinsis\ProvinsiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProvinsis extends ListRecords
{
    protected static string $resource = ProvinsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
