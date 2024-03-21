<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeePreference>
 */

class EmployeePreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'is_happy' => $this->faker->boolean(),
            'favorite_year' => $this->faker->year(),
            'preferred_hourly_rate' => $this->faker->randomFloat(2, 10, 1000),
            'ip_address' => $this->faker->ipv4()
        ];
    }
}