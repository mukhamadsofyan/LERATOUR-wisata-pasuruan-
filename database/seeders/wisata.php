<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use App\Models\wisatamodels;
use Illuminate\Database\Seeder;

class wisata extends Seeder
{
    public function run(): void
    {
        $gunung   = KategoriModel::where('kategori', 'Gunung')->first();
        $keluarga = KategoriModel::where('kategori', 'Keluarga')->first();
        $air      = KategoriModel::where('kategori', 'Air Terjun')->first();
        $sejarah  = KategoriModel::where('kategori', 'Sejarah')->first();
        $religi   = KategoriModel::where('kategori', 'Religi')->first();
        $edukasi  = KategoriModel::where('kategori', 'Edukasi')->first();
        $alam     = KategoriModel::where('kategori', 'Alam')->first();

        $wisatas = [
            [
                'nama_wisata' => 'Taman Safari Indonesia II',
                'deskripsi_wisata' => 'Taman konservasi satwa terbesar di Jawa Timur dengan konsep wisata keluarga dan edukasi.',
                'harga_tiket' => '200000',
                'foto_wisata' => 'wisata/safari.webp',
                'kategori_wisata' => $keluarga->id,
                'jam_buka' => '08:30',
                'jam_tutup' => '16:30',
                'fasilitas' => 'Safari Journey, Edukasi Satwa, Parkir, Toilet',
                'latitude' => -7.708229,
                'longitude' => 112.652206,
            ],
            [
                'nama_wisata' => 'Air Terjun Kakek Bodo',
                'deskripsi_wisata' => 'Air terjun alami di kawasan Prigen dengan suasana sejuk dan pemandangan alam yang asri.',
                'harga_tiket' => '20000',
                'foto_wisata' => 'wisata/kakek_bodo.avif',
                'kategori_wisata' => $air->id,
                'jam_buka' => '07:00',
                'jam_tutup' => '16:00',
                'fasilitas' => 'Parkir, Toilet, Gazebo',
                'latitude' => -7.698278,
                'longitude' => 112.645944,
            ],
            [
                'nama_wisata' => 'Taman Candra Wilwatikta',
                'deskripsi_wisata' => 'Destinasi wisata keluarga dan budaya dengan area luas untuk pertunjukan dan rekreasi.',
                'harga_tiket' => '15000',
                'foto_wisata' => 'wisata/taman_candra.jpg',
                'kategori_wisata' => $keluarga->id,
                'jam_buka' => '08:00',
                'jam_tutup' => '17:00',
                'fasilitas' => 'Parkir, Toilet',
                'latitude' => -7.635742,
                'longitude' => 112.748628,
            ],
            [
                'nama_wisata' => 'Candi Gunung Gangsir',
                'deskripsi_wisata' => 'Candi peninggalan sejarah di Pasuruan yang mencerminkan arsitektur klasik masa lampau.',
                'harga_tiket' => '5000',
                'foto_wisata' => 'wisata/candi.jpeg',
                'kategori_wisata' => $sejarah->id,
                'jam_buka' => '08:00',
                'jam_tutup' => '17:00',
                'fasilitas' => 'Parkir',
                'latitude' => -7.621944,
                'longitude' => 112.900833,
            ],
            [
                'nama_wisata' => 'Masjid Cheng Hoo Pasuruan',
                'deskripsi_wisata' => 'Masjid unik bernuansa arsitektur Tionghoa yang menjadi destinasi religi dan wisata budaya.',
                'harga_tiket' => '5000',
                'foto_wisata' => 'wisata/masjid.jpg',
                'kategori_wisata' => $religi->id,
                'jam_buka' => '04:00',
                'jam_tutup' => '21:00',
                'fasilitas' => 'Parkir, Toilet',
                'latitude' => -7.646009,
                'longitude' => 112.907593,
            ],
            [
                'nama_wisata' => 'Kebun Raya Purwodadi',
                'deskripsi_wisata' => 'Wisata edukasi dan konservasi alam dengan koleksi tanaman tropis yang luas.',
                'harga_tiket' => '15000',
                'foto_wisata' => 'wisata/kebun_raya.jpg',
                'kategori_wisata' => $edukasi->id,
                'jam_buka' => '07:30',
                'jam_tutup' => '16:00',
                'fasilitas' => 'Toilet, Parkir',
                'latitude' => -7.800379,
                'longitude' => 112.741706,
            ],
            [
                'nama_wisata' => 'Saygon Waterpark',
                'deskripsi_wisata' => 'Wisata air keluarga dengan berbagai wahana kolam renang dan area bermain anak.',
                'harga_tiket' => '35000',
                'foto_wisata' => 'wisata/saygon.jpg',
                'kategori_wisata' => $alam->id,
                'jam_buka' => '09:00',
                'jam_tutup' => '17:00',
                'fasilitas' => 'Kolam, Foodcourt, Parkir',
                'latitude' => -7.667282,
                'longitude' => 112.713206,
            ],
            [
                'nama_wisata' => 'Danau Ranu Grati',
                'deskripsi_wisata' => 'Danau alami dengan panorama indah serta wisata perahu yang cocok untuk rekreasi.',
                'harga_tiket' => '10000',
                'foto_wisata' => 'wisata/grati.webp',
                'kategori_wisata' => $alam->id,
                'jam_buka' => '06:00',
                'jam_tutup' => '18:00',
                'fasilitas' => 'Perahu, Parkir, Warung',
                'latitude' => -7.730278,
                'longitude' => 112.843611,
            ],
        ];


        foreach ($wisatas as $wisata) {
            wisatamodels::create($wisata);
        }
    }
}
