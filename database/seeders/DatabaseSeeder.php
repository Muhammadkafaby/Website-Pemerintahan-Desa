<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            VillageProfileSeeder::class,
            GovernmentSeeder::class,
            PopulationSeeder::class,
            PostSeeder::class,
            PublicationSeeder::class,
            BumdesSeeder::class,
        ]);
    }
}
