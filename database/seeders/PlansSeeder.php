<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plansData = [
            [
                'name' => 'Section A',
                'office' => 'Upper',
                'gender' => 'Male',
            ],
            [
                'name' => 'Section B',
                'office' => 'Lower',
                'gender' => 'Female',
            ],
            // Add more work data as needed
        ];

        // Insert the data into the works table using Eloquent
        foreach ($plansData as $data) {
            Plan::create($data);
        }
    }
}
