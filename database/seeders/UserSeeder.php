<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->first();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@smamasehi.sch.id',
            'password' => Hash::make('password123'),
            'role_id' => $adminRole?->id,
            'is_active' => true,
        ]);
    }
}
