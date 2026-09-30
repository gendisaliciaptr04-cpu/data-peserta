<?php

// Namespace model
namespace App\Models;

// Menggunakan fitur Model Laravel
use Illuminate\Database\Eloquent\Model;


// Model untuk data skema sertifikasi
class Skema extends Model
{
    // Kolom yang boleh diisi
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi'
    ];


    // Relasi skema dengan peserta
    // Satu skema dapat dimiliki banyak peserta
    public function pesertas()
    {
        return $this->hasMany(Peserta::class);
    }
}