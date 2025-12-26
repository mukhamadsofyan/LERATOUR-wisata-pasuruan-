<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    /**
     * Field yang boleh diisi (mass assignment)
     */
    protected $fillable = [
        'order_id',
        'nama_wisata',
        'nama_pemesan',
        'email',
        'harga_tiket',
        'jumlah_tiket',
        'total_bayar',
        'payment_status',
        'payment_method',
        'transaction_id',
    ];
}
