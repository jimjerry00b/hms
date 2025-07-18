<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Donald V2',
            'email' => 'donald@example.com',
            'password' => bcrypt('123456'),
            'is_deletable' => 0,
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Syrus',
            'email' => 'syrus@example.com',
            'password' => bcrypt('123456'),
            'is_deletable' => 1,
            'role_id' => 2,
        ]);


        User::create([
            'name' => 'Carris',
            'email' => 'carris@example.com',
            'password' => bcrypt('123456'),
            'is_deletable' => 1,
            'role_id' => 3,
        ]);

    }
}
