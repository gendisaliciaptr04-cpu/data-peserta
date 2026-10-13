<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    protected $fillable = [
        'user_id',
        'nomor_peserta',
        'nik',
        'nama',
        'email',
        'no_hp',
        'skema_id',
    ];

    public function skema(): BelongsTo
    {
        return $this->belongsTo(Skema::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}