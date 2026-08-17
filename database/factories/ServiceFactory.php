<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(3),
            'short_description' => fake()->sentence(10),
            'description' => fake()->paragraphs(4, true),
            'is_published' => fake()->boolean(),
            'slug' => fake()->unique()->sentence(3),
        ];
    }
}
