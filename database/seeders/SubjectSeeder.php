<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // List of subjects with descriptions related to subject categories
        $subjects = [
            ['code' => 'CS101', 'subject_code' => 'IT 138C', 'subject_desc' => 'Introduction to basic computing concepts and terminology.'],
            ['code' => 'CS102', 'subject_code' => 'IT 140A', 'subject_desc' => 'Understanding of algorithms and programming using Python.'],
            ['code' => 'MATH101', 'subject_code' => 'MATH 101A', 'subject_desc' => 'Fundamentals of mathematics including algebra, geometry, and calculus.'],
            ['code' => 'ENG101', 'subject_code' => 'ENG 101B', 'subject_desc' => 'Introduction to academic writing and English literature analysis.'],
            ['code' => 'BIO101', 'subject_code' => 'BIO 101A', 'subject_desc' => 'An overview of basic biology, covering cells, genetics, and ecology.'],
            ['code' => 'PHYS101', 'subject_code' => 'PHY 101A', 'subject_desc' => 'Fundamental principles of physics, including mechanics and thermodynamics.'],
            ['code' => 'CHEM101', 'subject_code' => 'CHEM 101B', 'subject_desc' => 'Introduction to chemical reactions, periodic table, and atomic structure.'],
            ['code' => 'HIST101', 'subject_code' => 'HIST 101A', 'subject_desc' => 'A survey of global history from the ancient civilizations to the modern world.'],
            ['code' => 'ECON101', 'subject_code' => 'ECO 101A', 'subject_desc' => 'Introduction to basic economic principles, including supply, demand, and markets.'],
            ['code' => 'ART101', 'subject_code' => 'ART 101A', 'subject_desc' => 'Study of the fundamentals of art, including drawing, painting, and visual culture.'],
            ['code' => 'PHIL101', 'subject_code' => 'PHIL 101B', 'subject_desc' => 'Introduction to philosophy, examining ethics, metaphysics, and epistemology.'],
            ['code' => 'MATH201', 'subject_code' => 'MATH 201A', 'subject_desc' => 'In-depth study of calculus including derivatives, integrals, and limits.'],
            ['code' => 'CS201', 'subject_code' => 'CS 201A', 'subject_desc' => 'Advanced programming concepts with object-oriented design using Java.'],
            ['code' => 'ENG201', 'subject_code' => 'ENG 201A', 'subject_desc' => 'Literary analysis of major works in fiction, poetry, and drama from around the world.'],
            ['code' => 'BUS101', 'subject_code' => 'BUS 101A', 'subject_desc' => 'Introduction to business concepts, including management, marketing, and finance.'],
            ['code' => 'SOC101', 'subject_code' => 'SOC 101B', 'subject_desc' => 'Overview of sociology, examining society, culture, and social institutions.'],
            ['code' => 'LAW101', 'subject_code' => 'LAW 101A', 'subject_desc' => 'Basic introduction to law and the legal system, covering civil, criminal, and constitutional law.'],
            ['code' => 'MATH301', 'subject_code' => 'MATH 301A', 'subject_desc' => 'Advanced mathematics focusing on differential equations and linear algebra.'],
            ['code' => 'PSY101', 'subject_code' => 'PSY 101A', 'subject_desc' => 'Study of the basic concepts of psychology, including behavior, cognition, and mental health.'],
            ['code' => 'BIO201', 'subject_code' => 'BIO 201B', 'subject_desc' => 'Advanced biology topics, including anatomy, physiology, and evolutionary theory.'],
            ['code' => 'CHEM201', 'subject_code' => 'CHEM 201A', 'subject_desc' => 'Advanced chemistry, focusing on organic reactions, laboratory techniques, and analysis.'],
        ];

        // Insert subjects into the database
        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
