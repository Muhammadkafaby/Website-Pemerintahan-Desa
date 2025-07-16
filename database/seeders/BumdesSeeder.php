<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bumdes;
use Faker\Factory as Faker;

class BumdesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 3) as $index) {
            Bumdes::create([
                'name' => 'BUMDes ' . $faker->company,
                'description' => $faker->paragraph,
                'image' => 'bumdes.jpg',
                'contact' => $faker->phoneNumber,
            ]);
        }
    }
}
