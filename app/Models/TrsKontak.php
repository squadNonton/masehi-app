<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrsKontak extends Model
{
    protected $table = 'trs_kontak';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'subjek',
        'pesan',
        'is_dibaca',
        'is_active',
    ];

    protected $casts = [
        'is_dibaca' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_dibaca', false);
    }
}
