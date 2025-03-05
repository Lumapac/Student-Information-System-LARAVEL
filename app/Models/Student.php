<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'std_id';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'std_id',
        'std_firstname',
        'std_lastname',
        'std_middlename',
        'std_age',
        'std_course',
        'std_address',
        'std_email',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'std_email', 'email');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'enroll_students', 'student_id', 'subject_id')
            ->withPivot('status')
            ->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($student) {
            $student->user()->delete();
        });
    }

    public function enrollments()
    {
        return $this->hasMany(EnrollStudent::class, 'student_id', 'std_id');
    }

}
