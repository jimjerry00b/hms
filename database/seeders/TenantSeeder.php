<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::create([
            'name' => 'Salam Uddin',
            'email' => 's.uddin@gmail.com',
            'phone' => '+01654165464',
            'image' => 'assets/img/profile-img.jpg',
            'nid' => 'assets/img/profile-img.jpg',
            'flat_id' => '1',
            'house_id' => 1,
            'move_in_date' => 1689022402,
            'move_out_date' => ''
        ]);
    }
}
