<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriModel extends Model
{
    protected $table = 'galeri';

    protected $fillable = [
        'nama_wisata',
        'gambar',
    ];

    protected $casts = [
        'gambar' => 'array', // otomatis jadi array
    ];
}
