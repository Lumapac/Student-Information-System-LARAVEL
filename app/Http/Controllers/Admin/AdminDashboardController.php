<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnrollStudent;
use App\Models\Student;
use App\Models\Subject;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalStudent = Student::count();
        $totalEnrolledStudents = EnrollStudent::distinct()->count('student_id');
        $totalSubject = Subject::count();


        return view('admin-dashboard', compact('totalEnrolledStudents', 
        'totalStudent', 'totalSubject'));
    }
}
