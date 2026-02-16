<?php

namespace App\Filament\Resources\Units\Pages;

use App\Filament\Resources\Units\UnitResource;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewUnit extends ViewRecord
{
    protected static string $resource = UnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(1)->schema([
                    RepeatableEntry::make('images')->schema([
                        ImageEntry::make('nama')->label("image")->imageWidth(540)->imageHeight(300)->hiddenLabel(),
                    ])->contained(false),

                    Section::make("Meta Data Properti")->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('jenis_transaksi'),
                            TextEntry::make('jenis_unit'),
                            TextEntry::make('is_lelang')->label("Apakah Properti Lelang ?")->default('Tidak'),
                        ]),
                        TextEntry::make('judul'),
                        TextEntry::make('deskripsi'),
                    ]),
                    Section::make("Data Properti")->schema([
                        TextEntry::make('luas_tanah')->numeric(),
                        TextEntry::make('luas_bangunan')->numeric()->visible(function ($get){
                            $jenis_unit = $get('jenis_unit');
                            return $jenis_unit !== 'TANAH';
                        }),
                        TextEntry::make('legalitas'),
                        TextEntry::make('hadap'),
                    ])->columns(2),
                    Section::make("Harga Properti")->schema([
                        TextEntry::make('harga_jual')->visible(function ($get) {
                            $harga_sewa = $get('jenis_transaksi');
                            return $harga_sewa === "JUAL";
                        })->money('IDR'),
                        TextEntry::make('harga_sewa')->visible(function ($get) {
                            $harga_sewa = $get('jenis_transaksi');
                            return $harga_sewa === "SEWA";
                        })->money('IDR'),
                        TextEntry::make('harga_sewa_tipe')->visible(function ($get) {
                            $harga_sewa = $get('jenis_transaksi');
                            return $harga_sewa === "SEWA";
                        }),
                    ]),
                    Section::make("Sosial Media")->schema([
                        TextEntry::make('link_post_fb')->default('-'),
                        TextEntry::make('link_post_ig')->default('-'),
                        TextEntry::make('link_post_yt')->default('-'),
                        TextEntry::make('link_post_tt')->default('-'),
                    ])->columns(2),
                    Section::make("Alamat")->description("Alamat Lengkap Dari Properti")->schema([
                        TextEntry::make('link_maps')->default('-'),
                        Grid::make(2)->schema([
                            TextEntry::make('alamat')->default('-'),
                            TextEntry::make('kecamatan.nama')->default('-')->label("Kecamatan"),
                            TextEntry::make('kota.nama')->default('-')->label('Kota'),
                            TextEntry::make('provinsi.nama')->default('-')->label('Provinsi'),
                        ])
                    ])->columnSpanFull(),
                    TextEntry::make('note')->default('-'),
                ])->columnSpanFull()
            ]);
    }
}
