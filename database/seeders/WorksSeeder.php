<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sample data for works
        $worksData = [
            [
                'id' => 1,
                'name' => 'Section A',
                'office' => 'upper',
                'gender' => 'male',
                'created_at' => '2024-04-23 03:28:03',
                'updated_at' => '2024-05-25 17:41:42',
            ],
            [
                'id' => 2,
                'name' => 'Section B',
                'office' => 'upper',
                'gender' => 'male',
                'created_at' => '2024-04-23 03:28:12',
                'updated_at' => '2024-04-23 03:28:12',
            ],
            [
                'id' => 3,
                'name' => 'Cermin + Partition',
                'office' => 'upper',
                'gender' => 'both',
                'created_at' => '2024-04-23 03:28:26',
                'updated_at' => '2024-05-06 10:36:41',
            ],
            [
                'id' => 4,
                'name' => 'Meja Meeting',
                'office' => 'upper',
                'gender' => 'both',
                'created_at' => '2024-04-23 03:28:35',
                'updated_at' => '2024-05-06 10:36:54',
            ],
            [
                'id' => 5,
                'name' => 'Sampah',
                'office' => 'upper',
                'gender' => 'male',
                'created_at' => '2024-04-23 03:28:41',
                'updated_at' => '2024-04-23 03:28:41',
            ],
            [
                'id' => 6,
                'name' => 'Toilet',
                'office' => 'upper',
                'gender' => 'female',
                'created_at' => '2024-04-23 03:28:48',
                'updated_at' => '2024-04-23 03:28:48',
            ],
            [
                'id' => 7,
                'name' => 'Surau',
                'office' => 'upper',
                'gender' => 'male',
                'created_at' => '2024-04-23 03:28:53',
                'updated_at' => '2024-05-19 17:20:25',
            ],
            [
                'id' => 8,
                'name' => 'Tangga',
                'office' => 'upper',
                'gender' => 'male',
                'created_at' => '2024-04-23 03:29:02',
                'updated_at' => '2024-05-19 17:20:15',
            ],
            [
                'id' => 9,
                'name' => 'Filter',
                'office' => 'upper',
                'gender' => 'male',
                'created_at' => '2024-04-23 03:29:08',
                'updated_at' => '2024-04-23 03:29:08',
            ],
            [
                'id' => 10,
                'name' => 'Mop Section A',
                'office' => 'upper',
                'gender' => 'female',
                'created_at' => '2024-04-23 03:29:23',
                'updated_at' => '2024-04-23 03:29:23',
            ],
            [
                'id' => 11,
                'name' => 'Mop Section B',
                'office' => 'upper',
                'gender' => 'female',
                'created_at' => '2024-04-23 03:29:28',
                'updated_at' => '2024-04-23 03:29:28',
            ],
            [
                'id' => 12,
                'name' => 'Section A',
                'office' => 'lower',
                'gender' => 'both',
                'created_at' => '2024-04-23 03:29:38',
                'updated_at' => '2024-05-06 10:37:07',
            ],
            [
                'id' => 13,
                'name' => 'Section B',
                'office' => 'lower',
                'gender' => 'both',
                'created_at' => '2024-04-23 03:29:45',
                'updated_at' => '2024-05-06 10:37:13',
            ],
            [
                'id' => 14,
                'name' => 'Cermin',
                'office' => 'lower',
                'gender' => 'female',
                'created_at' => '2024-04-23 03:29:50',
                'updated_at' => '2024-04-23 03:29:50',
            ],
            [
                'id' => 15,
                'name' => 'Meja',
                'office' => 'lower',
                'gender' => 'male',
                'created_at' => '2024-04-23 03:29:57',
                'updated_at' => '2024-04-23 03:29:57',
            ],
            [
                'id' => 16,
                'name' => 'Sampah',
                'office' => 'lower',
                'gender' => 'male',
                'created_at' => '2024-04-23 03:30:04',
                'updated_at' => '2024-04-23 03:30:04',
            ],
            [
                'id' => 17,
                'name' => 'Toilet',
                'office' => 'lower',
                'gender' => 'female',
                'created_at' => '2024-04-23 03:30:10',
                'updated_at' => '2024-04-23 03:30:10',
            ],
            [
                'id' => 18,
                'name' => 'Mop Section A',
                'office' => 'lower',
                'gender' => 'female',
                'created_at' => '2024-04-23 03:30:16',
                'updated_at' => '2024-04-23 03:30:16',
            ],
            [
                'id' => 19,
                'name' => 'Mop Section B',
                'office' => 'lower',
                'gender' => 'female',
                'created_at' => '2024-04-23 03:30:21',
                'updated_at' => '2024-04-23 03:30:21',
            ],
            [
                'id' => 20,
                'name' => 'Filter',
                'office' => 'lower',
                'gender' => 'male',
                'created_at' => '2024-04-23 03:30:26',
                'updated_at' => '2024-04-23 03:30:26',
            ],
            [
                'id' => 21,
                'name' => 'Pintu',
                'office' => 'lower',
                'gender' => 'male',
                'created_at' => '2024-05-05 16:22:00',
                'updated_at' => '2024-05-25 20:50:31',
            ],
        ];

        // Insert the data into the works table using Eloquent
        foreach ($worksData as $data) {
            Work::create($data);
        }
    }
}
