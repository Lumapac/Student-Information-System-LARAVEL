<div class="card p-2">
    <table class="table table-bordered mt-4">
        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(function () {
                    let successMessage = document.getElementById('successMessage');
                    if (successMessage) {
                        successMessage.classList.remove('show');
                        successMessage.classList.add('fade');
                        setTimeout(() => successMessage.remove(), 300);
                    }
                }, 2000);
            </script>
        @endif

        <thead class="table-dark">
            <tr>
                <th>Code</th>
                <th>Subject Code</th>
                <th>Subject Description</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalGrades = 0;
                $gradeCount = 0;
            @endphp

            @foreach($enrolledSubjects as $enroll)
                        <tr>
                            <td>{{ $enroll->subject->code }}</td>
                            <td>{{ $enroll->subject->subject_code }}</td>
                            <td>{{ $enroll->subject->subject_desc }}</td>
                            <td>{{ $enroll->grade ?? 'N/A' }}</td>

                            @php
                                if (is_numeric($enroll->grade)) {
                                    $totalGrades += $enroll->grade;
                                    $gradeCount++;
                                }
                            @endphp

                            <td>
                                <form action="{{ route('enroll.delete', $enroll->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3 me-5 text-end">
        <h6>
            General Average:
            <strong>
                {{ $gradeCount > 0 ? number_format($totalGrades / $gradeCount, 2) : 'N/A' }}
            </strong>
        </h6>
    </div>

    <!-- Update Subjects Button -->
    <div class="mt-3">
        <a href="{{ route('enroll.edit', $student->id) }}" class="btn btn-info">
            Update Subjects
        </a>

        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#gradeModal">
            Grade Student
        </button>
    </div>

    @include('admin.enrollStudent.grade')
</div>