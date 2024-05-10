<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::insert([
            ['code' => 'C001', 'name' => 'Programming'],
            ['code' => 'C002', 'name' => 'Database'],
            ['code' => 'C003', 'name' => 'Networking'],
            ['code' => 'C004', 'name' => 'Web Development'],
            ['code' => 'C005', 'name' => 'Cyber Security'],
        ]);
    }
}
