<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstCarousel extends Model
{
    protected $table = 'mst_carousel';

    protected $fillable = [
        'judul',
        'subjudul',
        'gambar',
        'teks_tombol_1',
        'link_tombol_1',
        'teks_tombol_2',
        'link_tombol_2',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
