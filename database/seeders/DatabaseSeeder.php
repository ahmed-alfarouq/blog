<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (User::count() === 0) {
            User::factory(10)->create();
        }

        if (Tag::count() === 0) {
            Tag::factory(30)->create();
        }

        Post::factory(10)->create()->each(function ($post) {
            $tags = Tag::inRandomOrder()->take(rand(1, 10))->pluck('id');
            $post->tags()->attach($tags);
        });
    }
}
