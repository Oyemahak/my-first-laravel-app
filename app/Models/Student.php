<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['fname', 'lname', 'email'];

    // Many-to-many: student to courses
    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    // Optional convenience accessor
    public function getFullNameAttribute(): string
    {
        return trim("{$this->fname} {$this->lname}");
    }
}