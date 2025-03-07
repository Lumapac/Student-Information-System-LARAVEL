<?php

namespace App\Http\Controllers\Admin;

use App\Models\EnrollStudent;
use App\Http\Requests\StoreGradeRequest;
use App\Models\Student;
use App\Http\Controllers\Controller;


class GradeStudentController extends Controller
{
    public function gradeForm($id)
    {
        $student = Student::where('id', $id)->first();

        if (!$student) {
            dd("Student not found", $id);
        }

        $enrolledSubjects = EnrollStudent::where('student_id', $id)->with('subject')->get();

        return view('admin.enrollStudent.grade', compact('student', 'enrolledSubjects'));
    }

    public function storeGrades(StoreGradeRequest $request, $id)
    {
        $validatedData = $request->validated();

        foreach ($validatedData['grades'] as $enrollId => $grade) {
            $gradeValue = ($grade === "INC") ? "INC" : ($grade ?: null);

            EnrollStudent::where('id', $enrollId)->update(['grade' => $gradeValue]);
        }

        return redirect()->route('student.view', $id)->with('success', 'Grades successfully uploaded.');
    }



}
