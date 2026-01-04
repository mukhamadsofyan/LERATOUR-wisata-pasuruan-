<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGalery extends Model
{

    protected $fillable = [
        'image',
        'title',
        'kategori_id',
        'uploader_name',
        'uploader_type',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }
}
