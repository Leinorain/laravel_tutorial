<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeePreference;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supervisor_id' => User::all()->random()->id,
            'department_id' => Department::all()->random()->id,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'middle_initial' => $this->faker->randomElement(range('A', 'Z')),
            'job_title' => $this->faker->jobTitle(),
            'job_description' => $this->faker->bs(),
            'birthdate' => $this->faker->date(),
            'is_active' => $this->faker->boolean(),
            'profile_picture' => null,
        ];
    }

    /**
     * Define the EmployeePreference relationship.
     *
     * @return EmployeeFactory
     */
    public function configure(): self
    {
        return $this->afterCreating(function (Employee $employee) {
            $employee->preference()->save(EmployeePreference::factory()->make());
        });
    }
}