<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstAlumni extends Model
{
    protected $table = 'mst_alumni';

    protected $fillable = [
        'nama',
        'foto',
        'tahun_lulus',
        'pekerjaan',
        'perusahaan',
        'universitas',
        'testimoni',
        'is_featured',
        'is_active',
        'urutan',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'tahun_lulus' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('tahun_lulus', 'desc');
    }
}
