<?php

namespace App\Livewire;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Filament\Schemas\Components\Grid;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DaerahWidget extends StatsOverviewWidget
{
    protected function getHeading(): ?string
    {
        return 'Daerah';
    }

    protected function getDescription(): ?string
    {
        return 'Data-data terkait Kecamatan, Kota, Provinsi';
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Kecamatan', Kecamatan::count()),
            Stat::make('Jumlah Kota', Kota::count()),
            Stat::make('Jumlah Provinsi', Provinsi::count()),
            Stat::make('Provinsi Dengan Kota Terbanyak', Provinsi::withCount('kota')->orderByDesc('kota_count')->first()['nama']),
            Stat::make('Kota Dengan Kecamatan Terbanyak', Kota::withCount('kecamatan')->orderByDesc('kecamatan_count')->first()['nama']),
        ];
    }
}
