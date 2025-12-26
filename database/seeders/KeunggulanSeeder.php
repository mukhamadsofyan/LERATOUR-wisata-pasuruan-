<?php

namespace Database\Seeders;

use App\Models\keunggulanmodel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeunggulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        keunggulanmodel::create([
            'title_keunggulan' => 'Pelayanan Cepat',
            'deskripsi_keunggulan' => 'Kami memberikan pelayanan cepat dan responsif kepada pengunjung.',
        ]);

        keunggulanmodel::create([
            'title_keunggulan' => 'Harga Terjangkau',
            'deskripsi_keunggulan' => 'Harga yang ditawarkan ramah di kantong tanpa mengurangi kualitas.',
        ]);

        keunggulanmodel::create([
            'title_keunggulan' => 'Lokasi Strategis',
            'deskripsi_keunggulan' => 'Mudah dijangkau dan berada di lokasi strategis.',
        ]);
        keunggulanmodel::create([
            'title_keunggulan' => 'Lokasi Strategis',
            'deskripsi_keunggulan' => 'Mudah dijangkau dan berada di lokasi strategis.',
        ]);
    }
}
