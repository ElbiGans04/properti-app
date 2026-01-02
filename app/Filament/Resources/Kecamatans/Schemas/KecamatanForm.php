<?php

namespace App\Filament\Resources\Kecamatans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KecamatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make("nama")->required()->placeholder('Legok')->maxLength(100),
                Select::make("kota_id")->relationship(name: 'kota', titleAttribute: 'nama')->searchable()
                    ->preload()->required(true)
            ]);
    }
}
