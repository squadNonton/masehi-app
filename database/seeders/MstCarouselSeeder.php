<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MstCarousel;

class MstCarouselSeeder extends Seeder
{
    public function run(): void
    {
        // Slide 1 - backwall3.png
        MstCarousel::create([
            'judul' => 'LIGHT Up Your Future',
            'subjudul' => null,
            'gambar' => 'backwall3.png',
            'teks_tombol_1' => 'Daftar Sekarang',
            'link_tombol_1' => '#courses',
            'teks_tombol_2' => 'Mengapa Memilih Kami?',
            'link_tombol_2' => '#about',
            'urutan' => 1,
            'is_active' => true,
        ]);

        // Slide 2 - backwall2.png
        MstCarousel::create([
            'judul' => 'LIGHT',
            'subjudul' => 'Love Intelligent Gritty Humble Trustworthy',
            'gambar' => 'backwall2.png',
            'teks_tombol_1' => null,
            'link_tombol_1' => null,
            'teks_tombol_2' => 'Enroll Now',
            'link_tombol_2' => '#courses',
            'urutan' => 2,
            'is_active' => true,
        ]);
    }
}
