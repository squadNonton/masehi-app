<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrsNewsletter extends Model
{
    protected $table = 'trs_newsletter';

    public $timestamps = false;

    protected $fillable = [
        'email',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
