<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        House::create([
            'name' => 'Donald Jerry Corraya',
            'address' => '300/1 South Kafrul, Dhaka : Cantonment, Dhaka : 1206',
            'description' => 'single owner',
            'unit' => 8
        ]);
    }
}
