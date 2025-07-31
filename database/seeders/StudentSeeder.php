<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            Student::create([
                'fname' => fake()->firstName(),
                'lname' => fake()->lastName(),
                'email' => fake()->unique()->safeEmail(),
            ]);
        }
    }
}