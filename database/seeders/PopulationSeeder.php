<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Population;
use Faker\Factory as Faker;

class PopulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $index) {
            Population::create([
                'name' => $faker->name,
                'nik' => $faker->unique()->nik,
                'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'age' => $faker->numberBetween(1, 80),
                'education' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
                'occupation' => $faker->jobTitle,
                'religion' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            ]);
        }
    }
}
