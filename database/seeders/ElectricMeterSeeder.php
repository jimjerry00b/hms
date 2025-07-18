<?php

namespace Database\Seeders;

use App\Models\ElectricMeter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectricMeterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ElectricMeter::create([
            'flat_id' => 1,
            'account_number' => '11212941',
            'meter_number' => '52688',
            'is_active' => 1
        ]);

        ElectricMeter::create([
            'flat_id' => 2,
            'account_number' => '11212951',
            'meter_number' => '028122',
            'is_active' => 1
        ]);

        ElectricMeter::create([
            'flat_id' => 3,
            'account_number' => '11212961',
            'meter_number' => '0466488',
            'is_active' => 1
        ]);

        ElectricMeter::create([
            'flat_id' => 4,
            'account_number' => '11212971',
            'meter_number' => '645013707435',
            'is_active' => 1
        ]);

        ElectricMeter::create([
            'flat_id' => 5,
            'account_number' => '11212981',
            'meter_number' => '645013707436',
            'is_active' => 1
        ]);

        ElectricMeter::create([
            'flat_id' => 6,
            'account_number' => '11213261',
            'meter_number' => '645013707437',
            'is_active' => 1
        ]);

        ElectricMeter::create([
            'flat_id' => 7,
            'account_number' => '11213271',
            'meter_number' => '645013707438',
            'is_active' => 1
        ]);

        ElectricMeter::create([
            'flat_id' => 8,
            'account_number' => '12010918',
            'meter_number' => '095953',
            'is_active' => 1
        ]);
    }
}
