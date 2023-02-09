<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            "title" => fake()->sentence(3),
            "description" => fake()->paragraph(),
            "tags" => implode("|", (fake()->optional()->words(3) ?? [])),
            "project_date" => fake()->dateTime(),
            "img" => fake()->optional()->imageURL(
                640,
                480,
                null,
                true,
                null,
                false,
                "jpg"
            ),
            "repo" => fake()->optional()->url(),
        ];
    }
}
