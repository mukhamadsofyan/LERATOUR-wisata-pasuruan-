<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wisatamodels extends Model
{
    protected $table = 'wisatas';

    protected $fillable = [
        'nama_wisata',
        'deskripsi_wisata',
        'harga_tiket',
        'kategori_wisata',
        'jam_buka',
        'jam_tutup',
        'fasilitas',
        'latitude',
        'longitude',
        'foto_wisata',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_wisata', 'id');
    }
    public function galleries()
    {
        return $this->hasMany(GaleriModel::class);
    }
}
