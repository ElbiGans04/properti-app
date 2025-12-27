<?php

namespace App\Filament\Resources\Marketings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MarketingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make("nama")->required(true)->maxLength(100)->label('Name')
            ]);
    }
}
