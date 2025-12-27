<?php

namespace App\Filament\Resources\Marketings\Pages;

use App\Filament\Resources\Marketings\MarketingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMarketing extends ViewRecord
{
    protected static string $resource = MarketingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
