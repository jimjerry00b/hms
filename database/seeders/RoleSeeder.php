<?php

namespace Database\Seeders;

use App\Models\RoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleModel::create([
            'name' => 'Super Admin',
        ]);

        RoleModel::create([
            'name' => 'Admin',
        ]);

        RoleModel::create([
            'name' => 'User',
        ]);
    }
}
