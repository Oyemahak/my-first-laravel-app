<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'professor_id'];

    // Many-to-many: course to students
    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    // One-to-one (inverse): course to professor
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}