<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskGroup;
use App\Models\Task;
use Faker\Factory as Faker;

class TaskGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all task IDs
        $taskIds = Task::pluck('id')->toArray();

        // Generate dummy data for task groups
        for ($i = 0; $i < 20; $i++) { // Adjust the number of task groups as needed
            TaskGroup::create([
                'task_id' => $faker->randomElement($taskIds),
                'week' => $faker->numberBetween(1, 52), // Random week between 1 and 52
                'weekStart' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'weekEnd' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            ]);
        }
    }
}
