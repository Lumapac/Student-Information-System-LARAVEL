<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\EnrollStudent;
use App\Http\Requests\StoreEnrollStudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class EnrollStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalEnrolledStudents = EnrollStudent::distinct('student_id')->count('student_id');
        return view('admin-dashboard', compact('totalEnrolledStudents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get students nga wapa na enroll
        $enrolledStudentIds = EnrollStudent::pluck('student_id')->unique()->toArray();
        $students = Student::whereNotIn('id', $enrolledStudentIds)->get();

        // Get all subjects
        $subjects = Subject::all();

        $authUserRole = Auth::user()->role;
        if ($authUserRole == 0) {
            return view('admin.enrollStudent.create', compact('students', 'subjects'));
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollStudentRequest $request)
    {


        // Check if student exists
        $student = Student::where('id', $request->student_id)->first();
        if (!$student) {
            return redirect()->back()->withErrors(['student_id' => 'Student not found.']);
        }

        // Check if subjects exist
        $validSubjects = Subject::whereIn('id', $request->subjects)->pluck('id')->toArray();
        if (count($validSubjects) !== count($request->subjects)) {
            return redirect()->back()->withErrors(['subjects' => 'One or more selected subjects do not exist.']);
        }

        // Enroll student in selected subjects
        foreach ($request->subjects as $subjectId) {
            EnrollStudent::firstOrCreate([
                'student_id' => $student->id,
                'subject_id' => $subjectId,
                'status' => 'enrolled'
            ]);
        }

        return redirect()->back()->with('success', 'Student enrolled successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        // Ensure the 'subject' relationship is loaded to avoid accessing an integer
        $enrolledSubjects = EnrollStudent::with('subject')
            ->where('student_id', $student->id)
            ->get();

        return view('admin.student.show', compact('student', 'enrolledSubjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $student = Student::where('id', $id)->first();
        $enrolledSubjects = EnrollStudent::where('student_id', $student->id)->pluck('subject_id')->toArray();
        $subjects = Subject::all();

        return view('admin.enrollStudent.edit', compact('student', 'enrolledSubjects', 'subjects'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $student_id)
    {
        Student::findOrFail($student_id);

        // Validate subjects
        $validatedData = $request->validate([
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        // Remove old subjects
        EnrollStudent::where('student_id', $student_id)->delete();

        // Re-enroll in selected subjects
        foreach ($validatedData['subjects'] as $subject_id) {
            EnrollStudent::create([
                'student_id' => $student_id,
                'subject_id' => $subject_id,
                'status' => 'enrolled',
            ]);
        }

        return redirect()->route('enroll.edit', $student_id)->with('success', 'Subjects updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enrollment = EnrollStudent::find($id);

        if (!$enrollment) {
            return redirect()->back()->with('error', 'Enrollment record not found.');
        }

        // Prevent deletion if the subject has a grade
        if (!is_null($enrollment->grade)) {
            return redirect()->back()->with([
                'error' => 'Cannot delete an enrolled subject with a grade.'
            ]);
        }

        $enrollment->delete();

        return redirect()->back()->with('success', 'Subject removed successfully.');
    }

}
