<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        // Use factory for cleaner code & maintainability so thats why i made changes in this file to for this week..
        Student::factory()->count(100)->create();
    }
}