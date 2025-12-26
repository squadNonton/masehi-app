<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstGaleri extends Model
{
    protected $table = 'mst_galeri';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tipe',
        'file_path',
        'video_url',
        'kategori',
        'album',
        'is_active',
        'urutan',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFoto($query)
    {
        return $query->where('tipe', 'foto');
    }

    public function scopeVideo($query)
    {
        return $query->where('tipe', 'video');
    }

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function scopeByAlbum($query, $album)
    {
        return $query->where('album', $album);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('created_at', 'desc');
    }
}
