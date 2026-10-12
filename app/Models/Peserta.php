<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    // Menentukan field yang boleh diisi secara massal
    protected $fillable = [
        'nomor_peserta',
        'nik',
        'nama',
        'email',
        'no_hp',
        'skema_id',
    ];

    // Relasi peserta dengan skema sertifikasi
    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}