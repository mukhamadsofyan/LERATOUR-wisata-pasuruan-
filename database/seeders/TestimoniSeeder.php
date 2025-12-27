<?php

namespace Database\Seeders;

use App\Models\testimonimodel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        testimonimodel::insert([
            [
                'nama' => 'Andi Pratama',
                'notelp' => '081234567890',
                'keterangan' => 'Pengunjung',
                'deskripsi_testimoni' => 'Pelayanan sangat memuaskan, tempat wisatanya bersih dan terawat.',
                'foto_testimoni' => 'anjing.jpg',
                'status' => 'tunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aisyah',
                'notelp' => '082345678901',
                'keterangan' => 'Wisatawan',
                'deskripsi_testimoni' => 'Informasi wisata sangat lengkap dan mudah dipahami.',
                'foto_testimoni' => 'persia.jpeg',
                'status' => 'tunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'notelp' => '083456789012',
                'keterangan' => 'Traveler',
                'deskripsi_testimoni' => 'Website membantu saya menemukan destinasi wisata terbaik.',
                'foto_testimoni' => 'anggora.webp',
                'status' => 'tunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
