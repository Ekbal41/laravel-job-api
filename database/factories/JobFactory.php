<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. ",
            'salary' => fake()->numberBetween(10000, 50000),
            'location' => fake()->city(),
            'type' => fake()->randomElement(['full-time', 'part-time', 'contract', 'freelance']),
            'category' =>fake()->randomElement(['web-development', 'mobile-development', 'design', 'devops', 'testing', 'data-science', 'other']),
            'time' =>fake()->randomElement(['morning', 'afternoon', 'evening', 'night']),
        ];
    }
}
