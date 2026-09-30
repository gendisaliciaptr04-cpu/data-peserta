<?php

// Menentukan namespace model
namespace App\Models;

// Menggunakan fitur Model dari Laravel
use Illuminate\Database\Eloquent\Model;


// Model Peserta digunakan untuk mengatur data peserta
class Peserta extends Model
{
    // Kolom yang boleh diisi menggunakan Peserta::create()
    protected $fillable = [
        'nomor_peserta',
        'nama',
        'email',
        'no_hp',
        'skema_id',
    ];


    // Relasi peserta dengan skema
    // Satu peserta memiliki satu skema
    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}