<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
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
            'title' => fake()->randomElement([
                'Software Engineer',
                'Web Developer',
                'Frontend Developer',
                'Backend Developer',
                'UI/UX Designer',
                'QA Engineer',
                'System Analyst',
            ]),
            'company' => fake()->company(),
            'location' => fake()->city(),
            'salary' => fake()->numberBetween(25000, 120000),
            'type' => fake()->randomElement([
                'full-time',
                'part-time',
                'contract',
                'internship',
            ]),
            'description' => fake()->paragraphs(3, true),
        ];
    }
}
