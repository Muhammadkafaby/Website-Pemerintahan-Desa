<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Government;

class GovernmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Government::create([
            'name' => 'Budi Santoso',
            'position' => 'Kepala Desa',
            'photo' => 'budi.jpg',
            'history' => 'Riwayat singkat Budi Santoso.',
        ]);

        Government::create([
            'name' => 'Siti Aminah',
            'position' => 'Sekretaris Desa',
            'photo' => 'siti.jpg',
            'history' => 'Riwayat singkat Siti Aminah.',
        ]);
    }
}
