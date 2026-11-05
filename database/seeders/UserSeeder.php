<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['felnev' => 'admin'],
            [
                'vnev' => 'Rendszer',
                'knev' => 'Admin',
                'email' => 'admin@renew.local',
                'password' => Hash::make('Admin123!'),
                'role' => 1,
            ]
        );
    }
}
