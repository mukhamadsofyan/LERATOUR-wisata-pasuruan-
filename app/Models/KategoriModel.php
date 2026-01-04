<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $fillable = [
        'kategori'
    ];

    // RELASI
    // public function wisatas()
    // {
    //     return $this->hasMany(wisatamodels::class, 'kategori_wisata', 'kategori');
    // }
    public function wisatas()
    {
        return $this->hasMany(wisatamodels::class, 'kategori_wisata', 'id');
    }
    public function galery()
    {
        return $this->hasMany(UserGalery::class, 'kategori_id');
    }
}
