<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MstKarya extends Model
{
    protected $table = 'mst_karya';

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'file',
        'kategori',
        'nama_siswa',
        'kelas',
        'tahun',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tahun' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($karya) {
            if (empty($karya->slug)) {
                $karya->slug = Str::slug($karya->judul);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('tahun', 'desc')->orderBy('created_at', 'desc');
    }
}
