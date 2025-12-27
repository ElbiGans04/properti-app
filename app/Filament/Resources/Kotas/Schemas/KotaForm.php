<?php

namespace App\Filament\Resources\Kotas\Schemas;

use App\Models\Provinsi;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make("nama")->required(true),
                Select::make("provinsi_id")->relationship(name: 'provinsi', titleAttribute: 'nama')->searchable()
                    ->preload()->required(true)
            ]);
    }
}
