<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'img' => $this->faker->imageUrl(),
            'content' => fake()->paragraph(10),
            'user_id' => $user ? $user->id : User::factory()->create()->id
        ];
    }
}
