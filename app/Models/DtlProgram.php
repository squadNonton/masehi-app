<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DtlProgram extends Model
{
    protected $table = 'dtl_program';

    protected $fillable = [
        'program_id',
        'judul',
        'icon',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    public function program()
    {
        return $this->belongsTo(MstProgram::class, 'program_id');
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
