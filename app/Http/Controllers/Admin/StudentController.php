<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\EnrollStudent;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Services\StudentService;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get search input if available
        $search = $request->input('search');

        $query = Student::orderBy('created_at', 'desc');

        if ($search) {
            $query->where('std_firstname', 'LIKE', "%{$search}%")
                ->orWhere('std_lastname', 'LIKE', "%{$search}%")
                ->orWhere('std_id', 'LIKE', "%{$search}%")
                ->orWhere('std_email', 'LIKE', "%{$search}%");
        }

        $studentsList = $query->paginate(10);

        $authUserRole = Auth::user()->role;
        if ($authUserRole == 0) {
            return view('admin.student.table', compact('studentsList'));
        }

        abort(403, 'Unauthorized access');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authUserRole = Auth::user()->role;
        if ($authUserRole == 0) {
            return view('admin.student.create');
        }

        abort(403, 'Unauthorized access');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request, StudentService $studentService)
    {
        $studentService->createStudent($request->validated());

        $authUserRole = Auth::user()->role;
        if ($authUserRole == 0) {
            return redirect()->route('student.list')->with('success', 'Student added successfully.');
        }

        abort(403, 'Unauthorized access');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::where('id', $id)->firstOrFail();

        // Fetch enrolled subjects with subject details
        $enrolledSubjects = EnrollStudent::where('student_id', $student->id)
            ->with('subject') // Ensure the relationship is loaded
            ->get();

        return view('admin.student.show', compact('student', 'enrolledSubjects'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::where('std_id', $id)->firstOrFail();

        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $data = $request->validated();

        // Perform the update
        $student->update($data);

        return redirect()->route('student.view', [$student->id])
            ->with('success', 'Student updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::where('id', $id)->first();
        $enrollStudent = EnrollStudent::where('student_id', $student->id)->first();


        // Check if student exists
        if (!$student) {
            return redirect()->route('student.list')->with([
                'confirmationMessage' => 'Student not found!',
                'alertType' => 'danger'
            ]);
        }

        if ($enrollStudent->status === 'enrolled') {
            return redirect()->route('student.list')->with([
                'confirmationMessage' => 'Cannot delete an enrolled student!',
                'alertType' => 'warning'
            ]);
        }

        // Delete student
        $student->delete();

        return redirect()->route('student.list')->with([
            'confirmationMessage' => 'Student deleted successfully!',
            'alertType' => 'success'
        ]);
    }


}
