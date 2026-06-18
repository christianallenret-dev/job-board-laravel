<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'role' => 'admin',
        ]);

        // Create 19 regular users
        $users = User::factory(19)->create();

        // Jobs
       $jobs = Job::factory(15)->create();

        // Combine admin + users
        $allUsers = collect([$admin])->merge($users);

        // One application per user
        foreach ($allUsers as $user) {
            Application::factory()->create([
                'user_id' => $user->id,
                // 70% chance of having a job assigned
                'job_id' => fake()->boolean(70)
                    ? $jobs->random()->id
                    : null,
                'email' => $user->email,
            ]);
        }
    }
}
