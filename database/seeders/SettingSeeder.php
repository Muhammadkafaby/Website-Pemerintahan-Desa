<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'village_name',
            'value' => 'Desa Maju Jaya',
        ]);

        Setting::create([
            'key' => 'logo',
            'value' => 'logo.png',
        ]);

        Setting::create([
            'key' => 'contact',
            'value' => '08123456789',
        ]);

        Setting::create([
            'key' => 'social_media',
            'value' => json_encode([
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
            ]),
        ]);

        Setting::create([
            'key' => 'hero_banner',
            'value' => 'banner.jpg',
        ]);

        Setting::create([
            'key' => 'primary_color',
            'value' => '#4F46E5',
        ]);
    }
}
