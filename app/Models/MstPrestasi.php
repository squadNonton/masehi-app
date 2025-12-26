<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstPrestasi extends Model
{
    protected $table = 'mst_prestasi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tingkat',
        'kategori',
        'peringkat',
        'nama_peserta',
        'tahun',
        'tanggal',
        'gambar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tahun' => 'integer',
        'tanggal' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByTingkat($query, $tingkat)
    {
        return $query->where('tingkat', $tingkat);
    }

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function scopeByTahun($query, $tahun)
    {
        return $query->where('tahun', $tahun);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('tahun', 'desc')->orderBy('tanggal', 'desc');
    }
}
