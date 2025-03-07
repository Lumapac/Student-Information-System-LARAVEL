@extends('admin.sidebar')
@section('title', 'Student Information')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.navigation')
        <!-- End Navbar -->
        <div class="container-fluid py-2">
            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMessage">
                    {{ session('error') }}
                </div>
            @endif

            <script>
                setTimeout(function () {
                    let successMessage = document.getElementById('successMessage');
                    let errorMessage = document.getElementById('errorMessage');

                    if (successMessage) {
                        successMessage.classList.remove('show');
                        successMessage.classList.add('fade');
                        setTimeout(() => successMessage.remove(), 300);
                    }

                    if (errorMessage) {
                        errorMessage.classList.remove('show');
                        errorMessage.classList.add('fade');
                        setTimeout(() => errorMessage.remove(), 300);
                    }
                }, 5000);
            </script>


            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                    <strong>Failed to update the student. Please check the errors below:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <script>
                    setTimeout(() => {
                        let alertBox = document.getElementById('error-alert');
                        if (alertBox) {
                            let bsAlert = new bootstrap.Alert(alertBox);
                            bsAlert.close();
                        }
                    }, 8000);
                </script>
            @endif

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