<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'birthdate' => fake()->date('Y-m-d', '2005-12-31'),
            'nationality' => fake()->randomElement(['Argentina', 'Bolivia', 'Uruguay', 'Brazil', 'Paraguay']),
        ];
    }
}
