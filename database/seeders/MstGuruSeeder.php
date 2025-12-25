<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MstGuru;

class MstGuruSeeder extends Seeder
{
    public function run(): void
    {
        // Guru 1 - copyBoy1.png
        MstGuru::create([
            'nama' => 'Full Name',
            'jabatan' => 'Trainer',
            'foto' => 'copyBoy1.png',
            'facebook' => '#',
            'twitter' => '#',
            'instagram' => '#',
            'urutan' => 1,
            'is_active' => true,
        ]);

        // Guru 2 - copyGirl2.png
        MstGuru::create([
            'nama' => 'Full Name',
            'jabatan' => 'Trainer',
            'foto' => 'copyGirl2.png',
            'facebook' => '#',
            'twitter' => '#',
            'instagram' => '#',
            'urutan' => 2,
            'is_active' => true,
        ]);

        // Guru 3 - copyBoy1.png (repeat)
        MstGuru::create([
            'nama' => 'Full Name',
            'jabatan' => 'Trainer',
            'foto' => 'copyBoy1.png',
            'facebook' => '#',
            'twitter' => '#',
            'instagram' => '#',
            'urutan' => 3,
            'is_active' => true,
        ]);

        // Guru 4 - copyGirl2.png (repeat)
        MstGuru::create([
            'nama' => 'Full Name',
            'jabatan' => 'Trainer',
            'foto' => 'copyGirl2.png',
            'facebook' => '#',
            'twitter' => '#',
            'instagram' => '#',
            'urutan' => 4,
            'is_active' => true,
        ]);
    }
}
