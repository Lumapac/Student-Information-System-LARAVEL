<?php

namespace App\Services;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentService
{
    public function createStudent(array $data)
    {
        // Create user if not exists
        $user = User::firstOrCreate(
            ['email' => $data['std_email']],
            [
                'name' => "{$data['std_firstname']} {$data['std_lastname']}",
                'password' => Hash::make('defaultpassword'),
                'role' => 'student',
            ]
        );

        // Create student
        return Student::create($data);
    }
}
