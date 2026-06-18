<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'degree' => fake()->randomElement([
                'BS Computer Science',
                'BS Information Technology',
                'BS Information Systems',
                'BS Software Engineering',
            ]),
            'university' => fake()->company() . ' University',
            'description' => fake()->paragraph(),
        ];
    }
}
