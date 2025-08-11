<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['fname', 'lname', 'email', 'department'];

    // One-to-one: professor to course
    public function course()
    {
        return $this->hasOne(Course::class);
    }

    // Optional convenience accessor
    public function getFullNameAttribute(): string
    {
        return trim("{$this->fname} {$this->lname}");
    }
}