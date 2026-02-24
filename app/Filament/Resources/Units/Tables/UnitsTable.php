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
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
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
                TextColumn::make("jenis_transaksi")->badge()->color(fn(string $state): string => match ($state) {
                    'JUAL' => 'success',
                    'SEWA' => 'danger',
                })->label('Tipe')->sortable(),
                TextColumn::make("judul")->searchable()->sortable(),
                TextColumn::make(name: "jenis_unit")->sortable(),
                TextColumn::make("luas_tanah")->label('LT - LB')->formatStateUsing(function ($state, $record) {
                    $jenis = $record->jenis_unit;
                    return $jenis == "TANAH" ? $state . ' m' : $state . ' m - ' . $record->luas_bangunan . ' m';
                }),
                TextColumn::make("provinsi.nama")->label('Alamat')->formatStateUsing(fn($state, $record) => $state . ' - ' . $record->kota['nama'])->sortable(),
            ])
            ->filters([
                SelectFilter::make("jenis_unit")->options([
                    'APARTEMENT' => 'Apartement',
                    'GUDANG' => 'Gudang',
                    'PABRIK' => 'Pabrik',
                    'RUKO' => 'Ruko',
                    'TANAH' => 'Tanah',
                    'LAINNYA' => 'Lainnya'
                ])->label("Jenis Unit"),
                SelectFilter::make("jenis_transaksi")->options([
                    'SEWA' => 'Sewa',
                    'JUAL' => 'Jual',
                ])->label("Jenis Transaksi"),
                SelectFilter::make("marketings")->relationship('marketing', 'nama'),
                SelectFilter::make("provinsi")->relationship("provinsi", 'nama'),
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
