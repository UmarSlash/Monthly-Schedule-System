<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskDetail;
use App\Models\TaskGroup;
use App\Models\Work;
use App\Models\Staff;
use Faker\Factory as Faker;

class TaskDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all task group IDs, work IDs, and staff IDs
        $taskGroupIds = TaskGroup::pluck('id')->toArray();
        $workIds = Work::pluck('id')->toArray();
        $staffIds = Staff::pluck('id')->toArray();

        // Generate dummy data for task details
        for ($i = 0; $i < 50; $i++) { // Adjust the number of task details as needed
            TaskDetail::create([
                'task_group_id' => $faker->randomElement($taskGroupIds),
                'work_id' => $faker->randomElement($workIds),
                'staff_id' => $faker->randomElement($staffIds),
            ]);
        }
    }
}
