<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EnrollStudent;

class StudentSubjectController extends Controller
{
    public function enrolledSubjects()
    {
        $user = Auth::user();

        $student = $user->student;

        if (!$student) {
            return back()->with('error', 'Student record not found.');
        }
    
        $enrolledSubjects = EnrollStudent::with('subject')
            ->where('student_id', $student->id)
            ->get();

        // dd($enrolledSubjects);

        return view('student.dashboard', compact('enrolledSubjects'));
    }
}
