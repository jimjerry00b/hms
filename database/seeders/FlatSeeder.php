<?php

namespace Database\Seeders;

use App\Models\FlatModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FlatModel::create([
            'name' => 'A1',
            'description' => 'Ground floor front side',
            'house_id' => 1,
            'monthly_rent' => 6400,
            'is_active' => 1,
            'electric_meter_id' => 1
        ]);

        FlatModel::create([
            'name' => 'B1',
            'description' => 'Ground floor back side',
            'house_id' => 1,
            'monthly_rent' => 12000,
            'is_active' => 1,
            'electric_meter_id' => 2
        ]);

        FlatModel::create([
            'name' => 'A2',
            'description' => '1st floor front side',
            'house_id' => 1,
            'monthly_rent' => 14000,
            'is_active' => 1,
            'electric_meter_id' => 3
        ]);

        FlatModel::create([
            'name' => 'B2',
            'description' => '1st floor back side',
            'house_id' => 1,
            'monthly_rent' => 13500,
            'is_active' => 1,
            'electric_meter_id' => 4
        ]);

        FlatModel::create([
            'name' => 'A3',
            'description' => '2nd floor front side',
            'house_id' => 1,
            'monthly_rent' => 13200,
            'is_active' => 1,
            'electric_meter_id' => 5
        ]);

        FlatModel::create([
            'name' => 'B3',
            'description' => '2nd floor back side',
            'house_id' => 1,
            'monthly_rent' => 12000,
            'is_active' => 1,
            'electric_meter_id' => 6
        ]);

        FlatModel::create([
            'name' => 'A4',
            'description' => '3rd floor front side',
            'house_id' => 1,
            'monthly_rent' => 13500,
            'is_active' => 1,
            'electric_meter_id' => 7
        ]);

        
        FlatModel::create([
            'name' => 'B4',
            'description' => '3rd floor back side',
            'house_id' => 1,
            'monthly_rent' => 13000,
            'is_active' => 1,
            'electric_meter_id' => 8
        ]);
    }
}
