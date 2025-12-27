<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marketing;

class MarketingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Marketing::create([
      'nama' => 'Deney Abdi Sulistyo',
    ]);
    Marketing::create([
      'nama' => 'Yossy Kurnia Jaya',
    ]);
    Marketing::create([
      'nama' => 'Mansyur Siregar',
    ]);
    Marketing::create([
      'nama' => 'Apriadi',
    ]);
    Marketing::create([
      'nama' => 'Firdaus Azis',
    ]);
    Marketing::create([
      'nama' => 'Rhafael Bijaksana',
    ]);
    Marketing::create([
      'nama' => 'Eza Harjati',
    ]);
    Marketing::create([
      'nama' => 'Muhammad Dahroni',
    ]);
    Marketing::create([
      'nama' => 'Daniel Eka Putra',
    ]);
    Marketing::create([
      'nama' => 'Muhammad Bagus Satrio',
    ]);
  }
}
