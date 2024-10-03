<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Faker\Factory as Faker;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate dummy data for tasks
        for ($i = 0; $i < 10; $i++) {
            Task::create([
                'month' => $faker->numberBetween(1, 12), // Random month between 1 and 12
                'year' => '2024' // Random year between 2020 and 2025
            ]);
        }
    }
}
