<?php

namespace App\Filament\Resources\Units\Tables;

use App\Models\Marketing;
use App\Models\Provinsi;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UnitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("judul")->searchable(),
                TextColumn::make(name: "jenis_unit"),
                TextColumn::make("jenis_transaksi")->badge()->color(fn(string $state): string => match ($state) {
                    'JUAL' => 'success',
                    'SEWA' => 'danger',
                }),
                TextColumn::make("marketing.nama"),
            ])
            ->filters([
                SelectFilter::make("marketings")->relationship('marketing', 'nama'),
                SelectFilter::make("provinsi")->relationship("provinsi", 'nama')
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
