<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $professors = Professor::factory(15)->create();
        $courses    = Course::factory(12)->create();

        $n = min(8, $courses->count(), $professors->count());
        $pool = $professors->shuffle()->take($n)->values();

        for ($i = 0; $i < $n; $i++) {
            $course = $courses[$i];
            $course->professor_id = $pool[$i]->id;
            $course->save();
        }

        $students = Student::factory(40)->create();
        $courseIds = $courses->pluck('id');

        $students->each(function (Student $s) use ($courseIds) {
            $s->courses()->sync(
                $courseIds->shuffle()->take(fake()->numberBetween(0, 3))->all()
            );
        });
    }
}