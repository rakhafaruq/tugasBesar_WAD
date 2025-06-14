<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tipe;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tipe::firstOrCreate(['name' => 'Sedan']);
        tipe::firstOrCreate(['name' => 'SUV']);
        tipe::firstOrCreate(['name' => 'MPV']);
    }
}
