<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VillageProfile;

class VillageProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VillageProfile::create([
            'history' => 'Sejarah singkat Desa Maju Jaya.',
            'vision_and_mission' => 'Visi dan Misi Desa Maju Jaya.',
            'location' => 'Lokasi Desa Maju Jaya.',
            'geography' => 'Geografis Desa Maju Jaya.',
        ]);
    }
}
