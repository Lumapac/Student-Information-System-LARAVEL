<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;
        $student_id = $this->faker->unique()->numberBetween(2201106000, 2201106999);
        $email = strtolower($student_id . '@student.buksu.edu.ph');
        $courses = ['BSIT', 'BSCS', 'BSBA', 'BSED', 'BSN', 'BSHM'];

        // Create the user first
        User::firstOrCreate(
            ['email' => $email],
            [
                'name' => "$firstName $lastName",
                'password' => Hash::make('defaultpassword'),
                'role' => 'student',
            ]
        );

        return [
            'std_id' => $student_id,
            'std_firstname' => $firstName,
            'std_lastname' => $lastName,
            'std_middlename' => $this->faker->lastName,
            'std_age' => $this->faker->numberBetween(18, 25),
            'std_course' => $this->faker->randomElement($courses),
            'std_address' => $this->faker->address,
            'std_email' => $email,
        ];
    }
}
