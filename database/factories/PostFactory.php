<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            'title' => fake()->sentence(6),
            'img' => 'https://picsum.photos/id/' . Arr::random(Post::IMAGE_IDS) . '/640/480',
            'content' => fake()->paragraph(10),
            'user_id' => $user ? $user->id : User::factory()->create()->id
        ];
    }
}
