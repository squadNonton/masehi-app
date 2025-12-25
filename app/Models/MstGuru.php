<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstGuru extends Model
{
    protected $table = 'mst_guru';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'facebook',
        'twitter',
        'instagram',
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
