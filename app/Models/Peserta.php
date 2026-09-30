<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = [
        'nomor_peserta',
        'nama',
        'email',
        'no_hp',
        'skema_id',
    ];

    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}