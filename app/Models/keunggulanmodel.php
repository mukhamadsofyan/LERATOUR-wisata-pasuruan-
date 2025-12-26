<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keunggulanmodel extends Model
{
    // use HasFactory;

    protected $table = 'keunggulans';

    protected $fillable = [
        'title_keunggulan',
        'deskripsi_keunggulan'
    ];
}
