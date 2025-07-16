<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $user = User::first();

        foreach (range(1, 10) as $index) {
            $title = $faker->sentence;
            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => $faker->paragraph(10),
                'image' => 'post.jpg',
                'user_id' => $user->id,
            ]);
        }
    }
}
