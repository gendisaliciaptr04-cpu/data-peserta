<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    // Menentukan field yang boleh diisi secara massal
    protected $fillable = [
        'nomor_peserta',
        'nama',
        'email',
        'no_hp',
        'skema_id',
    ];

    // Relasi: satu peserta memiliki satu skema
    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}