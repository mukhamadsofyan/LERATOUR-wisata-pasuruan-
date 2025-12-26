<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class testimonimodel extends Model
{
    protected $table = 'testimonials';
    protected $fillable = [
        'nama',
        'notelp',
        'keterangan',
        'deskripsi_testimoni',
        'foto_testimoni',
        'status',
    ];
}
