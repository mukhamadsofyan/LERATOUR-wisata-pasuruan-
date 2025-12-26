<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sliderModel extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [
        'title',
        'deskripsi_slider',
        'Gambar_Slider',
    ];
}
