<?php

namespace Database\Factories;

use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(3),
            'author' => fake()->name(),
            'description' => fake()->sentence(5),
            'year' => random_int(2000, 2050)
        ];
    }
}
