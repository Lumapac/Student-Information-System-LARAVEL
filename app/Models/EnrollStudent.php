<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollStudent extends Model
{
    protected $fillable = ['student_id', 'subject_id', 'status', 'grade'];

    protected $cast = [
        'grade' => 'string',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}

