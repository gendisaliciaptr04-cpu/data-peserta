<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    // Menentukan field yang boleh diisi secara massal
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi'
    ];

    // Relasi: satu skema dapat memiliki banyak peserta
    public function pesertas()
    {
        return $this->hasMany(Peserta::class);
    }
}