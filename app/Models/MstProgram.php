<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstProgram extends Model
{
    protected $table = 'mst_program';

    protected $fillable = [
        'badge',
        'judul',
        'deskripsi',
        'gambar',
        'link_detail',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    public function items()
    {
        return $this->hasMany(DtlProgram::class, 'program_id')->active()->ordered();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}
