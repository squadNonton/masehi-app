<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstFasilitas extends Model
{
    protected $table = 'mst_fasilitas';

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'icon',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan');
    }
}
