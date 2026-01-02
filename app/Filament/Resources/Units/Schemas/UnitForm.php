<?php

namespace App\Filament\Resources\Units\Schemas;

use App\Models\Kecamatan;
use App\Models\Kota;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()->columns(1)->schema([
                    // Gambar
                    Repeater::make('imagesRepeteter')
                        ->label("Gambar")
                        ->relationship('images')
                        ->schema([

                            FileUpload::make("nama")->required()->label("Gambar")->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ]),
                        ])->hidden(function ($operation) {
                            return $operation === "create";
                        }),

                    FileUpload::make("images")->required()->label("Gambar")->image()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            '16:9',
                            '4:3',
                            '1:1',
                        ])->multiple()->dehydrated(false)->hidden(function ($operation) {
                            return $operation !== "create";
                        }),
                    // Jenis
                    Section::make("Jenis Unit")->description("Keterangan Singkat Tentang Unit Terkait")->schema([
                        Radio::make("jenis_transaksi")->label("Jenis Transaksi")->options([
                            "JUAL" => "Jual",
                            "SEWA" => "Sewa"
                        ])->inline()->required()->live(),
                        Radio::make("jenis_unit")->label("Jenis Unit")->options([
                            "APARTEMENT" => "Apartement",
                            "GUDANG" => "Gudang",
                            "PABRIK" => "Pabrik",
                            "RUKO" => "Ruko",
                            "TANAH" => "Tanah",
                            "LAINNYA" => "Lainnya"
                        ])->inline()->required(),
                        Checkbox::make("is_lelang")->label("Apakah Ini Unit Lelang ?")->inline()
                    ]),

                    // Spek Unit
                    Section::make("Spesifikasi Unit")->description("Spesifikasi Detail Tentang Unit Terkait")->schema([
                        TextInput::make("judul")->required(),
                        Textarea::make("deskripsi")->required()->label("Deskripsi"),
                        Grid::make()->columns(2)->schema([
                            TextInput::make("luas_tanah")->label("Luas Tanah")->required()->numeric(),
                            TextInput::make("luas_bangunan")->label("Luas Bangunan")->required()->numeric(),
                        ]),
                        Radio::make("legalitas")->label("Legalitas")->options([
                            "SHM" => "SHM",
                            "SHGB" => "SHGB",
                            "GIRIK" => "GIRIK",
                            "AJB" => "AJB",
                            "SHGU" => "SHGU",
                            "TRADISIONAL" => "TRADISIONAL",
                            "LAINNYA" => "LAINNYA",
                        ])->inline()->required(),
                        Radio::make(name: "hadap")->label("Hadap")->options([
                            "UTARA" => "UTARA",
                            "TIMUR" => "TIMUR",
                            "SELATAN" => "SELATAN",
                            "BARAT" => "BARAT",
                        ])->inline()->required(),

                        // Marketing
                        Select::make("marketing_id")->required()->relationship(name: 'marketing', titleAttribute: 'nama')->searchable()
                            ->preload()->required(true),
                    ]),


                    // Alamat
                    Section::make("Harga")->description("Harga unit properti")->schema(function ($get) {
                        $selected = match ($get('jenis_transaksi')) {
                            "JUAL" => [
                                TextInput::make("harga_jual")->label("Harga Jual")->numeric()->required(),
                            ],
                            "SEWA" => [
                                TextInput::make("harga_sewa")->label("Harga Sewa")->numeric()->required(),
                                Radio::make("harga_sewa_tipe")->options([
                                    "HARGA_SEWA_PERTAHUN" => "Harga Sewa Per Tahun",
                                    "HARGA_SEWA_PERBULAN" => "Harga Sewa Per Bulan"
                                ])->required(),
                            ],
                            default => []
                        };

                        return $selected;
                    }),

                    // Alamat
                    Section::make("Lokasi")->description("Tempat lokasi unit")->schema([
                        Textarea::make("alamat")->required(),
                        TextInput::make("link_maps")->label("Tautan Google Maps")->url()->required(),
                        Grid::make()->columns(2)->schema([
                            Select::make("provinsi_id")->label("Provinsi")->required()->relationship(name: 'provinsi', titleAttribute: 'nama')->preload()->searchable()->live()->afterStateUpdated(function ($set) {
                                $set('kota_id', '');
                                $set('kecamatan_id', '');
                            })->partiallyRenderComponentsAfterStateUpdated(['kota_id', 'kecamatan_id']),
                            Select::make("kota_id")->label("Kota/Kabupaten")->required()
                                ->options(function ($get) {
                                    $value = $get("provinsi_id");
                                    return Kota::query()->where('provinsi_id', $value)->pluck('nama', 'id')
                                        ->all();
                                })
                                ->preload()
                                ->searchable()->afterStateUpdated(function ($set) {
                                    $set('kecamatan_id', '');
                                })->live()->partiallyRenderComponentsAfterStateUpdated(['kecamatan_id'])
                            ,
                            Select::make("kecamatan_id")->label("Kecamatan")->required()->options(function ($get) {
                                $value = $get("kota_id");
                                return Kecamatan::query()->where('kota_id', $value)->pluck('nama', 'id')->all();
                            })->preload()->searchable(),
                        ]),
                    ]),

                    // Link Tautan
                    Section::make("Sosial Media")->description("Tautan Postingan Sosial Media terkait unit ini")->schema([
                        TextInput::make("link_post_fb")->label("Tautan Facebook")->url(),
                        TextInput::make("link_post_ig")->label("Tautan Instagram")->url(),
                        TextInput::make("link_post_yt")->label("Tautan Tiktok")->url(),
                        TextInput::make("link_post_tt")->label("Tautan Youtube")->url(),
                    ])->columns(2),

                    // Notes
                    Textarea::make("note"),
                ])->columnSpanFull()
            ]);
    }
}
