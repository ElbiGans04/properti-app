<?php

namespace App\Filament\Resources\Kotas\Pages;

use App\Filament\Resources\Kotas\KotaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditKota extends EditRecord
{
    protected static string $resource = KotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
