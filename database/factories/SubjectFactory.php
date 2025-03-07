<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Subject::class;

    public function definition()
    {
        return [
            'code' => $this->faker->bothify('T##'), // Random code like T98
            'subject_code' => $this->faker->bothify('IT ###C'), // Random subject code like IT 138C
            'subject_desc' => $this->faker->sentence, // Random description like Information Assurance Security
        ];
    }
}
