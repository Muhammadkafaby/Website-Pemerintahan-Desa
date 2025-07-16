<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publication;
use App\Models\User;
use Faker\Factory as Faker;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $user = User::first();

        foreach (range(1, 5) as $index) {
            Publication::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'file' => 'document.pdf',
                'user_id' => $user->id,
            ]);
        }
    }
}
