<?php

namespace App\Filament\Resources\Kotas\Pages;

use App\Filament\Resources\Kotas\KotaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKota extends ViewRecord
{
    protected static string $resource = KotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
