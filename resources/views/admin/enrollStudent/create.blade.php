@extends('admin.sidebar')
@section('title', 'Enroll Student')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navigation')
        <div class="container-fluid py-2">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Enroll Student</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success" id="success-alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    let alertBox = document.getElementById("success-alert");

                                    if (alertBox) {
                                        setTimeout(() => {
                                            alertBox.style.transition = "opacity 0.4s ease";
                                            alertBox.style.opacity = "0";

                                            // Remove from DOM after fade-out
                                            setTimeout(() => alertBox.remove(), 200);
                                        }, 1000);
                                    }
                                });
                            </script>

                            <form action="{{ route('enroll.save') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="student" class="form-label">Select Student</label>
                                    <select name="student_id" class="form-select" required>
                                        <option value="">-- Select a Student --</option>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->std_firstname }}
                                                {{ $student->std_middlename }}
                                                {{ $student->std_lastname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <!-- <div class="form-outline mb-2 w-30">
                                            <input type="text" id="subject-search"
                                                class="form-control border border-secondary rounded"
                                                placeholder="Search subjects..." />
                                        </div> -->
                                    <label for="subjects" class="form-label">Select Subjects</label>
                                    <select name="subjects[]" class="form-select" multiple required>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->code }} |
                                                {{ $subject->subject_code }} -
                                                {{ $subject->subject_desc }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Hold CTRL to select multiple subjects.</small>
                                </div>
                                <button type="submit" class="btn btn-success">Enroll Student</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection