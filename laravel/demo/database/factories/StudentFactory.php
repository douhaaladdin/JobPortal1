<?php

namespace Database\Factories;

use App\Models\Track;
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
        // $date=fake()->date();
        return [
            //

            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'image' => fake()->unique()->imageUrl(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'age' => fake()->numberBetween(19, 25),
            'gender' => fake()->randomElement(['male', 'female']),
            'updated_at' => now(),
            'created_at' => now(),
            'track_id' => Track::inRandomOrder()->value('id'),


        ];
    }
}
