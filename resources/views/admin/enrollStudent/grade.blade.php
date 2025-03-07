<!-- Material Dashboard Modal -->
<div class="modal fade" id="gradeModal" tabindex="-1" aria-labelledby="gradeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gradeModalLabel">Grade Subjects for {{ $student->std_firstname }}
                    {{ $student->std_lastname }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Display Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('enroll.storeGrades', $student->id) }}" method="POST">
                    @csrf

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrolledSubjects as $enroll)
                                <tr>
                                    <td>{{ $enroll->subject->code }} - {{ $enroll->subject->subject_desc }}</td>
                                    <td>
                                        <div class="input-group input-group-outline">
                                            <select name="grades[{{ $enroll->id }}]"
                                                class="form-control @error('grades.' . $enroll->id) is-invalid @enderror">
                                                <option value="" {{ is_null($enroll->grade) ? 'selected' : '' }}>No Grade
                                                    (Null)</option>
                                                @foreach(["1.00", "1.25", "1.50", "1.75", "2.00", "2.25", "2.50", "2.75", "3.00", "4.00", "5.00", "INC"] as $grade)
                                                    <option value="{{ $grade }}" {{ old('grades.' . $enroll->id, $enroll->grade) == $grade ? 'selected' : '' }}>
                                                        {{ $grade }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- Error message for individual grade field --}}
                                        @error('grades.' . $enroll->id)
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Save Grades</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>