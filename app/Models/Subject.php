<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'subject_code',
        'subject_desc',
    ];
    
    public function students()
    {
        return $this->belongsToMany(Student::class, 'enroll_students', 'subject_id', 'student_id')
            ->withPivot('status')
            ->withTimestamps();
    }
    
}
