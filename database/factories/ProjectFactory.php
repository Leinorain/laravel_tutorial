<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class ProjectFactory extends Factory
{
    const SEEDED_EMPLOYEE_COUNT = 100;

    public function configure(): self
    {
        return $this->afterMaking(function (Project $project) {
            // nothing here
        })->afterCreating(function (Project $project) {
            // ONLY FOR SEEDING! Comment this out afterwards
            $this->seedAssignedEmployees($project);
        });
    }
    public function definition(): array
    {
        return [
            'supervisor_id' => random_int(1, 10),
            'title' => $this->faker->word(),
            'start_date' => $this->faker->date()
        ];
    }

    private function seedAssignedEmployees(Project $project): void
    {
        $employee_projects = [];
        $number_of_members = random_int(0, 20);
        $employee_id_list = [];
        for ($i = 1; $i <= self::SEEDED_EMPLOYEE_COUNT; $i++) {
            $employee_id_list[] = $i;
        }

        shuffle($employee_id_list);
        $project_id = $project->id;
        for ($i = 0; $i < $number_of_members; $i++) {
            $employee_projects[] = [
                'employee_id' => $employee_id_list[$i],
                'project_id' => $project_id
            ];
        }
        DB::table('employee_projects')->insert($employee_projects);
    }

}