<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Resources\Units\UnitResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUnit extends CreateRecord
{
    protected static string $resource = UnitResource::class;

    protected function afterCreate(): void
    {
        $paths = $this->data['images'] ?? [];

        foreach ($paths as $path) {
            $this->record->images()->create([
                'nama' => $path,
            ]);
        }
    }
}
