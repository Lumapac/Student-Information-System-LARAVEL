<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EnrollStudent;

class StudentGradeInfoController extends Controller
{
    public function studenGrade()
    {
        $user = Auth::user();
        $student = $user->student;

        if (!$student) {
            return back()->with('error', 'Student record not found.');
        }

        // Fetch enrolled subjects with their grades
        $enrolledSubjects = EnrollStudent::with('subject')
            ->where('student_id', $student->id)
            ->get();

        // Extract only numeric grades (ignore null or 'INC')
        $validGrades = $enrolledSubjects->whereNotNull('grade')->where('grade', '!=', 'INC')->pluck('grade');

        // Calculate the average if there are valid grades
        $gradeAverage = $validGrades->count() > 0 ? round($validGrades->avg(), 2) : 'N/A';

        return view('student.studentGrade', compact('enrolledSubjects', 'gradeAverage'));
    }

}
