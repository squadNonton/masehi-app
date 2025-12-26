<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MstKarir extends Model
{
    protected $table = 'mst_karir';

    protected $fillable = [
        'judul_posisi',
        'slug',
        'deskripsi',
        'persyaratan',
        'benefit',
        'tipe',
        'batas_lamaran',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'batas_lamaran' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($karir) {
            if (empty($karir->slug)) {
                $karir->slug = Str::slug($karir->judul_posisi);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->where('batas_lamaran', '>=', now());
    }

    public function scopeByTipe($query, $tipe)
    {
        return $query->where('tipe', $tipe);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function isExpired()
    {
        return $this->batas_lamaran < now();
    }
}
