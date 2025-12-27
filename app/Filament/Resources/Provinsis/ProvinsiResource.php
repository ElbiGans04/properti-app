<?php

namespace App\Filament\Resources\Provinsis;

use App\Filament\Resources\Provinsis\Pages\CreateProvinsi;
use App\Filament\Resources\Provinsis\Pages\EditProvinsi;
use App\Filament\Resources\Provinsis\Pages\ListProvinsis;
use App\Filament\Resources\Provinsis\Pages\ViewProvinsi;
use App\Filament\Resources\Provinsis\Schemas\ProvinsiForm;
use App\Filament\Resources\Provinsis\Schemas\ProvinsiInfolist;
use App\Filament\Resources\Provinsis\Tables\ProvinsisTable;
use App\Models\Provinsi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProvinsiResource extends Resource
{
    protected static ?string $model = Provinsi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Provinsi';

    public static function form(Schema $schema): Schema
    {
        return ProvinsiForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProvinsiInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProvinsisTable::configure($table);
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
            'index' => ListProvinsis::route('/'),
            'create' => CreateProvinsi::route('/create'),
            'view' => ViewProvinsi::route('/{record}'),
            'edit' => EditProvinsi::route('/{record}/edit'),
        ];
    }
}
