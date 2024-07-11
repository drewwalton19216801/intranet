<?php

namespace Database\Factories\Medtracker;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescriber>
 */
class PrescriberFactory extends Factory
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
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'city' => fake()->city(),
            'state' => fake()->stateAbbr(),
            'zip' => fake()->postcode(),
        ];
    }
}
