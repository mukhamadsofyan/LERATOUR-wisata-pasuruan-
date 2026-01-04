<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'wisata_id',
        'image',
        'caption',
        'status',
    ];

    public function wisata()
    {
        return $this->belongsTo(wisatamodels::class);
    }
}
