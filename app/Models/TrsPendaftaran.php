<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrsPendaftaran extends Model
{
    protected $table = 'trs_pendaftaran';

    protected $fillable = [
        'nama_siswa',
        'nisn',
        'asal_sekolah',
        'telepon_ortu',
        'email_ortu',
        'jurusan',
        'alamat',
        'catatan',
        'status',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
