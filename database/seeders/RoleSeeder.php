<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Administrator dengan akses penuh',
            'is_active' => true,
        ]);

        Role::create([
            'name' => 'Editor',
            'description' => 'Editor konten website',
            'is_active' => true,
        ]);
    }
}
