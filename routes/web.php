<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Student\StudentGradeInfoController;
use App\Http\Controllers\Student\StudentSubjectController;
use App\Http\Controllers\Admin\EnrollStudentController;
use App\Http\Controllers\Admin\GradeStudentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'rolemanager:admin'])->group(function () {
    Route::resource('student-list', StudentController::class)->parameters([
        'student-list' => 'student:std_id'
    ])->names([
                'index' => 'student.list',
                'create' => 'student.add',
                'store' => 'student.save',
                'show' => 'student.view',
                'edit' => 'student.edit',
                'update' => 'student.update',
                'destroy' => 'student.delete',
            ]);
});


Route::middleware(['auth', 'rolemanager:admin'])->group(function () {
    Route::resource('subject-list', SubjectController::class)
        ->parameters(['subject-list' => 'subject'])
        ->names([
            'index' => 'subject.list',
            'create' => 'subject.add',
            'store' => 'subject.save',
            'show' => 'subject.view',
            'edit' => 'subject.edit',
            'update' => 'subject.update',
            'destroy' => 'subject.delete',
        ]);
});

Route::middleware(['auth', 'rolemanager:admin'])->group(function () {
    Route::resource('/enroll/student', EnrollStudentController::class)->names([
        'index' => 'enroll.list',
        'create' => 'enroll.add',
        'store' => 'enroll.save',
        'show' => 'enroll.view',
        'edit' => 'enroll.edit',
        'update' => 'enroll.update',
        'destroy' => 'enroll.delete',
    ]);
});

Route::middleware(['auth', 'rolemanager:admin'])->group(function () {
    Route::get('/students/{id}/grades', [GradeStudentController::class, 'gradeForm'])->name('enroll.gradeForm');
    Route::post('/students/{id}/grades', [GradeStudentController::class, 'storeGrades'])->name('enroll.storeGrades');
});

Route::middleware(['auth', 'verified', 'rolemanager:student'])->group(function () {
    Route::get('/dashboard', [StudentSubjectController::class, 'enrolledSubjects'])->name('student.dashboard');
    Route::get('/grade', [StudentGradeInfoController::class, 'studenGrade'])->name('student.grade');

});



Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemanager:admin'])
    ->name('admin');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
