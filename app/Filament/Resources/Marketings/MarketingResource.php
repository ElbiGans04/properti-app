<?php

namespace App\Filament\Resources\Marketings;

use App\Filament\Resources\Marketings\Pages\CreateMarketing;
use App\Filament\Resources\Marketings\Pages\EditMarketing;
use App\Filament\Resources\Marketings\Pages\ListMarketings;
use App\Filament\Resources\Marketings\Pages\ViewMarketing;
use App\Filament\Resources\Marketings\Schemas\MarketingForm;
use App\Filament\Resources\Marketings\Schemas\MarketingInfolist;
use App\Filament\Resources\Marketings\Tables\MarketingsTable;
use App\Models\Marketing;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class MarketingResource extends Resource
{
    protected static ?string $model = Marketing::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'marketing';

    public static function form(Schema $schema): Schema
    {
        return MarketingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MarketingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketingsTable::configure($table);
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
            'index' => ListMarketings::route('/'),
            'create' => CreateMarketing::route('/create'),
            'view' => ViewMarketing::route('/{record}'),
            'edit' => EditMarketing::route('/{record}/edit'),
        ];
    }

    protected static string|UnitEnum|null $navigationGroup = 'Core Data';
}
