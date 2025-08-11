<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();

            $table->primary(['course_id', 'student_id']);

            $table->foreign('course_id')
                  ->references('id')->on('courses')
                  ->onDelete('cascade');

            $table->foreign('student_id')
                  ->references('id')->on('students')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_student');
    }
};