<?php

namespace App\Filament\Resources\Provinsis\Pages;

use App\Filament\Resources\Provinsis\ProvinsiResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProvinsi extends ViewRecord
{
    protected static string $resource = ProvinsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
