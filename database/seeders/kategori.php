<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori' => 'Alam'],
            ['kategori' => 'Gunung'],
            ['kategori' => 'Sejarah'],
            ['kategori' => 'Religi'],
            ['kategori' => 'Edukasi'],
            ['kategori' => 'Air Terjun'],
            ['kategori' => 'Keluarga'],
        ];

        foreach ($data as $item) {
            KategoriModel::create($item);
        }
    }
}
