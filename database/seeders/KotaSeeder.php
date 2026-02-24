<?php

namespace Database\Seeders;

use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kota::create(
            ['nama' => 'Tangerang', 'provinsi_id' => '1',]
        );
        Kota::create(
            ['nama' => 'Bogor', 'provinsi_id' => '2',]
        );
        Kota::create(
            ['nama' => 'Jakarta Barat', 'provinsi_id' => '3',]
        );
        Kota::create(
            ['nama' => 'Serang', 'provinsi_id' => '1',]
        );
    }
}
