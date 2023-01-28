<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uid' => fake()->numberBetween(0, 100),
            'fName' => fake()->name(),
            'lName' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phoneNumber' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'image' => fake()->filePath,
            'category' => fake()->numberBetween(0,4),
            'info' => fake()->text
        ];
    }
}
