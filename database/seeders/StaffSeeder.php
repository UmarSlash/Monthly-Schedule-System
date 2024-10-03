<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;
use Illuminate\Support\Arr;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sample data for staff
        $staffData = [
            [
                'id' => 1,
                'name' => 'Syahmi',
                'email' => 'Syahmi@gmail.com',
                'gender' => 'male',
                'color' => '#abaa9d',
                'deleted_at' => '2024-05-22 22:56:14',
                'created_at' => '2024-05-13 20:47:36',
                'updated_at' => '2024-05-22 22:56:14',
            ],
            [
                'id' => 2,
                'name' => 'Syazwan',
                'email' => 'Syazwan@gmail.com',
                'gender' => 'male',
                'color' => '#9ea7e4',
                'deleted_at' => null,
                'created_at' => '2024-05-13 20:47:36',
                'updated_at' => '2024-05-25 17:36:57',
            ],
            [
                'id' => 3,
                'name' => 'Ridhuan',
                'email' => 'Ridhuan@gmail.com',
                'gender' => 'male',
                'color' => '#d3cb90',
                'deleted_at' => null,
                'created_at' => '2024-05-13 20:47:36',
                'updated_at' => '2024-05-13 20:47:36',
            ],
            [
                'id' => 4,
                'name' => 'Izzat',
                'email' => 'Izzat@gmail.com',
                'gender' => 'male',
                'color' => '#9def85',
                'deleted_at' => null,
                'created_at' => '2024-05-13 20:47:36',
                'updated_at' => '2024-05-15 19:14:06',
            ],
            [
                'id' => 5,
                'name' => 'Nas',
                'email' => 'Nas@gmail.com',
                'gender' => 'male',
                'color' => '#bad48c',
                'deleted_at' => null,
                'created_at' => '2024-05-13 20:47:36',
                'updated_at' => '2024-05-13 20:47:36',
            ],
            [
                'id' => 6,
                'name' => 'Soleh',
                'email' => 'Soleh@gmail.com',
                'gender' => 'male',
                'color' => '#f3a4c1',
                'deleted_at' => null,
                'created_at' => '2024-05-13 20:47:36',
                'updated_at' => '2024-05-15 19:14:15',
            ],
            [
                'id' => 7,
                'name' => 'Rahman',
                'email' => 'Rahman@gmail.com',
                'gender' => 'male',
                'color' => '#ef96e1',
                'deleted_at' => null,
                'created_at' => '2024-05-13 20:47:36',
                'updated_at' => '2024-05-20 20:30:46',
            ],
            [
                'id' => 8,
                'name' => 'Zul',
                'email' => 'Zul@gmail.com',
                'gender' => 'male',
                'color' => '#94b3a8',
                'deleted_at' => null,
                'created_at' => '2024-05-13 20:47:36',
                'updated_at' => '2024-05-13 20:47:36',
            ],
            [
                'id' => 9,
                'name' => 'Riduan',
                'email' => 'Riduan@gmail.com',
                'gender' => 'male',
                'color' => '#d890ff',
                'deleted_at' => null,
                'created_at' => '2024-05-15 19:14:39',
                'updated_at' => '2024-05-15 19:14:39',
            ],
            [
                'id' => 10,
                'name' => 'Umar',
                'email' => 'Umar@gmail.com',
                'gender' => 'male',
                'color' => '#87d4d3',
                'deleted_at' => null,
                'created_at' => '2024-05-15 19:14:57',
                'updated_at' => '2024-05-15 19:14:57',
            ],
            [
                'id' => 11,
                'name' => 'Aisyah',
                'email' => 'Aisyah@gmail.com',
                'gender' => 'female',
                'color' => '#f08486',
                'deleted_at' => null,
                'created_at' => '2024-05-15 19:15:33',
                'updated_at' => '2024-05-15 19:15:33',
            ],
            [
                'id' => 12,
                'name' => 'Fatihah',
                'email' => 'Fatihah@gmail.com',
                'gender' => 'female',
                'color' => '#b9ba85',
                'deleted_at' => null,
                'created_at' => '2024-05-15 19:15:51',
                'updated_at' => '2024-05-15 19:15:55',
            ],
            [
                'id' => 13,
                'name' => 'Aqilah',
                'email' => 'Aqilah@gmail.com',
                'gender' => 'female',
                'color' => '#df8abb',
                'deleted_at' => null,
                'created_at' => '2024-05-15 19:16:58',
                'updated_at' => '2024-05-15 19:16:58',
            ],
            [
                'id' => 14,
                'name' => 'Husna',
                'email' => 'Husna@gmail.com',
                'gender' => 'female',
                'color' => '#d6e79b',
                'deleted_at' => null,
                'created_at' => '2024-05-15 19:17:12',
                'updated_at' => '2024-05-15 19:17:12',
            ],
            [
                'id' => 15,
                'name' => 'Athirah',
                'email' => 'Athirah@gmail.com',
                'gender' => 'female',
                'color' => '#f7c49b',
                'deleted_at' => null,
                'created_at' => '2024-05-15 19:17:46',
                'updated_at' => '2024-05-15 19:17:46',
            ],
            [
                'id' => 16,
                'name' => 'Afifah',
                'email' => 'Afifah@gmail.com',
                'gender' => 'female',
                'color' => '#da83dc',
                'deleted_at' => null,
                'created_at' => '2024-05-18 16:54:17',
                'updated_at' => '2024-05-18 16:54:17',
            ],
            [
                'id' => 17,
                'name' => 'Najihah',
                'email' => 'Najihah@gmail.com',
                'gender' => 'female',
                'color' => '#8fca87',
                'deleted_at' => null,
                'created_at' => '2024-05-18 16:54:44',
                'updated_at' => '2024-05-18 16:54:44',
            ],
            [
                'id' => 18,
                'name' => 'Maryam',
                'email' => 'Maryam@gmail.com',
                'gender' => 'female',
                'color' => '#ffa68d',
                'deleted_at' => null,
                'created_at' => '2024-05-18 16:56:00',
                'updated_at' => '2024-05-18 16:56:00',
            ],
            [
                'id' => 19,
                'name' => 'Amirul',
                'email' => 'Amirul@gmail.com',
                'gender' => 'male',
                'color' => '#dff3c1',
                'deleted_at' => null,
                'created_at' => '2024-05-18 16:56:21',
                'updated_at' => '2024-05-20 20:34:20',
            ],
            [
                'id' => 20,
                'name' => 'Luqman',
                'email' => 'Luqman@gmail.com',
                'gender' => 'male',
                'color' => '#89b081',
                'deleted_at' => null,
                'created_at' => '2024-05-18 16:57:00',
                'updated_at' => '2024-05-18 16:57:00',
            ],
            [
                'id' => 21,
                'name' => 'Abdullah',
                'email' => 'Abdullah@gmail.com',
                'gender' => 'male',
                'color' => '#a4d1ea',
                'deleted_at' => null,
                'created_at' => '2024-05-18 16:57:35',
                'updated_at' => '2024-05-18 16:57:35',
            ],
            [
                'id' => 22,
                'name' => 'Fatin',
                'email' => 'Fatin@gmail.com',
                'gender' => 'female',
                'color' => '#f6e1a6',
                'deleted_at' => null,
                'created_at' => '2024-05-19 17:18:14',
                'updated_at' => '2024-05-19 17:18:14',
            ],
            [
                'id' => 23,
                'name' => 'Zara',
                'email' => 'Zara@gmail.com',
                'gender' => 'female',
                'color' => '#b4a3ed',
                'deleted_at' => null,
                'created_at' => '2024-05-19 17:18:38',
                'updated_at' => '2024-05-21 00:12:54',
            ],
        ];

        // Insert the data into the staff table using Eloquent
        foreach ($staffData as $data) {
            Staff::create($data);
        }
    }
    
}
