@extends('admin.sidebar')
@section('title', 'Update Enrolled Subjects')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.navigation')

        <div class="container py-2">
            <div class="card p-4">
                <h4 class="mb-3">Enrolled Subjects for {{ $student->std_firstname }} {{ $student->std_lastname }}</h4>

                <!-- Display Enrolled Subjects Table -->
                <table class="table table-bordered mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>Code</th>
                            <th>Subject Code</th>
                            <th>Subject Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrolledSubjects as $enroll)
                            <tr>
                                <td>{{ $enroll->subject->code }}</td>
                                <td>{{ $enroll->subject->subject_code }}</td>
                                <td>{{ $enroll->subject->subject_desc }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Button to Open Modal -->
                <!-- Update Subject Button -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateSubjectModal">
                    Update Subjects
                </button>
                <a href="{{ route('student.list') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </main>

    <div class="modal fade" id="updateSubjectModal" tabindex="-1" aria-labelledby="updateSubjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateSubjectModalLabel">Update Enrolled Subjects</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('enroll.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="subjects" class="form-label">Select Subjects</label>
                            <select name="subjects[]" class="form-select" multiple required>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" @if(in_array($subject->id, $enrolledSubjects)) selected
                                    @endif>
                                        {{ $subject->code }} | {{ $subject->subject_code }} - {{ $subject->subject_desc }}
                                    </option>
                                @endforeach
                            </select>

                            <small class="text-muted">Hold CTRL to select multiple subjects.</small>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update Subjects</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JavaScript (Required for Modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection