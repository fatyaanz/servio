<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sparepart;

class SparepartSeeder extends Seeder
{
    public function run()
    {
        Sparepart::create([
            'name' => 'Freon R32',
            'description' => 'Freon untuk AC tipe R32',
            'price' => 150000
        ]);

        Sparepart::create([
            'name' => 'Kapasitor AC',
            'description' => 'Kapasitor penggerak kompresor AC',
            'price' => 120000
        ]);

        Sparepart::create([
            'name' => 'Filter AC',
            'description' => 'Filter udara AC',
            'price' => 50000
        ]);

        Sparepart::create([
            'name' => 'Motor Fan AC',
            'description' => 'Motor kipas indoor/outdoor AC',
            'price' => 300000
        ]);
    }
}