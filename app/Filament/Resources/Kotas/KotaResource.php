<?php

namespace App\Filament\Resources\Kotas;

use App\Filament\Resources\Kotas\Pages\CreateKota;
use App\Filament\Resources\Kotas\Pages\EditKota;
use App\Filament\Resources\Kotas\Pages\ListKotas;
use App\Filament\Resources\Kotas\Pages\ViewKota;
use App\Filament\Resources\Kotas\Schemas\KotaForm;
use App\Filament\Resources\Kotas\Schemas\KotaInfolist;
use App\Filament\Resources\Kotas\Tables\KotasTable;
use App\Models\Kota;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class KotaResource extends Resource
{
    protected static ?string $model = Kota::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Kota';

    public static function form(Schema $schema): Schema
    {
        return KotaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KotaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KotasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKotas::route('/'),
            'create' => CreateKota::route('/create'),
            'view' => ViewKota::route('/{record}'),
            'edit' => EditKota::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Kota';
    }


    protected static string|UnitEnum|null $navigationGroup = 'Daerah';
    protected static ?string $pluralModelLabel = 'kota';
}
