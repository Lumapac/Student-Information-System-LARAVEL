@extends('admin.sidebar')
@section('title', 'Student Information')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.navigation')
        <!-- End Navbar -->
        <div class="container-fluid py-2">

            <h4>Status:
                @php
                    $enrolled = \App\Models\EnrollStudent::where('student_id', $student->id)->exists();
                @endphp

                @if($enrolled)
                    <span class="text-success">Enrolled</span>
                @else
                    <span class="text-danger">Not Enrolled</span>
                @endif
            </h4>

            <h4>ID: {{ $student->std_id }}</h4>
            <h4>First Name: {{ $student->std_firstname }}</h4>
            <h4>Middle Name: {{ $student->std_middlename }}</h4>
            <h4>Last Name: {{ $student->std_lastname }}</h4>
            <h4>Age: {{ $student->std_age }}</h4>
            <h4>Course: {{ $student->std_course }}</h4>
            <h4>Address: {{ $student->std_address }}</h4>
            <h4>Email: {{ $student->std_email }}</h4>
        </div>
        <div class="mt-3">
            <a href="{{ route('student.list') }}" class="btn btn-light">
                Back
            </a>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUpdateStudent">
                Edit
            </a>
        </div>

        @include('admin.student.edit')
        @include('admin.enrollStudent.show')
    </main>
@endsection

