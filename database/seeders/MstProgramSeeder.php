<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MstProgram;
use App\Models\DtlProgram;

class MstProgramSeeder extends Seeder
{
    public function run(): void
    {
        // Program 1: Penguatan Karakter - sampel-1.jpg
        $program1 = MstProgram::create([
            'badge' => 'First',
            'judul' => 'Penguatan Karakter',
            'deskripsi' => 'Penguatan Karakter Profil pelajar Pancasila berbasis LIGHT melalui Teachers and Students in Action, SMASHKU Friday LIGHT, SMASHKU Goes to Church.',
            'gambar' => 'sampel-1.jpg',
            'link_detail' => '#',
            'urutan' => 1,
            'is_active' => true,
        ]);

        DtlProgram::create(['program_id' => $program1->id, 'judul' => 'Teachers and Students in Action', 'icon' => 'fa fa-chalkboard-teacher', 'urutan' => 1, 'is_active' => true]);
        DtlProgram::create(['program_id' => $program1->id, 'judul' => 'SMASHKU Friday LIGHT', 'icon' => 'fa fa-sun', 'urutan' => 2, 'is_active' => true]);
        DtlProgram::create(['program_id' => $program1->id, 'judul' => 'SMASHKU Goes to Church', 'icon' => 'fa fa-church', 'urutan' => 3, 'is_active' => true]);

        // Program 2: Insan Pembelajar - sampel-2.jpg
        $program2 = MstProgram::create([
            'badge' => 'Second',
            'judul' => 'Insan Pembelajar dan Berwawasan Lingkungan',
            'deskripsi' => 'SMA Masehi Kudus membentuk murid menjadi insan pembelajar yang kritis dan kreatif, serta memiliki kepedulian terhadap lingkungan. Tagline "Light Up Your Future" menjadi dorongan bagi murid untuk terus belajar dan menjaga keberlanjutan bumi.',
            'gambar' => 'sampel-2.jpg',
            'link_detail' => '#',
            'urutan' => 2,
            'is_active' => true,
        ]);

        DtlProgram::create(['program_id' => $program2->id, 'judul' => 'Scholar Spark', 'icon' => 'fa fa-graduation-cap', 'urutan' => 1, 'is_active' => true]);
        DtlProgram::create(['program_id' => $program2->id, 'judul' => 'University Preparation Program', 'icon' => 'fa fa-university', 'urutan' => 2, 'is_active' => true]);
        DtlProgram::create(['program_id' => $program2->id, 'judul' => 'Life Skill Program', 'icon' => 'fa fa-briefcase', 'urutan' => 3, 'is_active' => true]);
        DtlProgram::create(['program_id' => $program2->id, 'judul' => 'EDUSHINE', 'icon' => 'fa fa-star', 'urutan' => 4, 'is_active' => true]);
        DtlProgram::create(['program_id' => $program2->id, 'judul' => 'Learning Circle', 'icon' => 'fa fa-users-cog', 'urutan' => 5, 'is_active' => true]);

        // Program 3: Prestasi - sampel-3.jpg
        $program3 = MstProgram::create([
            'badge' => 'Third',
            'judul' => 'Terwujudnya Murid yang Berprestasi',
            'deskripsi' => 'Sekolah berkomitmen melahirkan murid berprestasi melalui pembelajaran inovatif dan dukungan penuh terhadap bakat serta minat murid. Dengan "Light Up Your Future", siswa dituntun menyalakan potensi terbaik dan meraih prestasi optimal.',
            'gambar' => 'sampel-3.jpg',
            'link_detail' => '#',
            'urutan' => 3,
            'is_active' => true,
        ]);

        DtlProgram::create(['program_id' => $program3->id, 'judul' => 'MEADY (Masehi Achievement in Studying)', 'icon' => 'fa fa-award', 'urutan' => 1, 'is_active' => true]);
        DtlProgram::create(['program_id' => $program3->id, 'judul' => 'Smartgency', 'icon' => 'fa fa-brain', 'urutan' => 2, 'is_active' => true]);
        DtlProgram::create(['program_id' => $program3->id, 'judul' => 'Orientasi Profesi', 'icon' => 'fa fa-compass', 'urutan' => 3, 'is_active' => true]);
    }
}
