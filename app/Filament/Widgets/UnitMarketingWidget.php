<?php

namespace App\Filament\Widgets;

use App\Models\Marketing;
use App\Models\Provinsi;
use App\Models\Unit;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UnitMarketingWidget extends StatsOverviewWidget
{
    protected function getHeading(): ?string
    {
        return 'Marketing & Unit Properti';
    }

    protected function getDescription(): ?string
    {
        return 'Data-data terkait Properti & Marketing';
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Marketing', Marketing::count()),
            Stat::make('Jumlah Unit Properti', Unit::count()),
            Stat::make('Marketing Dengan Unit Terbanyak', function () {
                $result = Marketing::withCount('units')->orderByDesc('units_count')->first();
                return "{$result['nama']} - {$result['units_count']}";
            }),
            Stat::make('Provinsi Dengan Unit Terbanyak', function () {
                $result = Provinsi::withCount('units')->orderByDesc('units_count')->first();
                return "{$result['nama']} - {$result['units_count']}";
            }),
        ];
    }
}
