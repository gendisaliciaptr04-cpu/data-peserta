<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi'
    ];
}