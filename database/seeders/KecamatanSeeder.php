<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kecamatan::create(
            [
                'nama' => 'Legok',
                'kota_id' => '1'
            ]
        );
        Kecamatan::create(
            [
                'nama' => 'Curug',
                'kota_id' => '1'
            ]
        );
        Kecamatan::create(
            [
                'nama' => 'Panongan',
                'kota_id' => '1'
            ]
        );
        Kecamatan::create(
            [
                'nama' => 'Bitung',
                'kota_id' => '1'
            ]
        );
        Kecamatan::create(
            [
                'nama' => 'Parung Panjang',
                'kota_id' => '2'
            ]
        );
        Kecamatan::create(
            [
                'nama' => 'Cikande',
                'kota_id' => '4'
            ]
        );
    }
}
