<form action="{{ route('student.update', $student->std_id) }}" method="post">
    @csrf
    @method('PATCH')

    <div class="modal fade" id="ModalUpdateStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="ModalUpdateStudent" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalUpdateStudent">Update Student Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="student_id">Student ID:</label>
                        <input type="text" class="form-control" name="std_id" id="student_id"
                            value="{{ old('std_id', $student->std_id) }}">
                        @error('std_id')
                            <span class="text-danger">{{ $message = "student ID has already been taken." }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="std_firstname">First Name:</label>
                        <input type="text" class="form-control" name="std_firstname" id="std_firstname"
                            value="{{ old('std_firstname', $student->std_firstname) }}">
                        @error('std_firstname')
                            <span class="text-danger">{{ $message = "student firstname field is required." }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="std_lastname">Last Name:</label>
                        <input type="text" class="form-control" name="std_lastname" id="std_lastname"
                            value="{{ old('std_lastname', $student->std_lastname) }}">
                        @error('std_lastname')
                            <span class="text-danger">{{ $message = "student lastname field is required." }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="std_middlename">Middle Name:</label>
                        <input type="text" class="form-control" name="std_middlename" id="std_middlename"
                            value="{{ old('std_middlename', $student->std_middlename) }}">
                    </div>

                    <div class="form-group">
                        <label for="std_age">Age:</label>
                        <input type="text" class="form-control" name="std_age" id="std_age"
                            value="{{ old('std_age', $student->std_age) }}">
                        @error('std_age')
                            <span class="text-danger">{{ $message = "student age field is required." }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="std_course">Course:</label>
                        <input type="text" class="form-control" name="std_course" id="std_course"
                            value="{{ old('std_course', $student->std_course) }}">
                        @error('std_course')
                            <span class="text-danger">{{ $message = "student course field is required." }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="std_address">Address:</label>
                        <input type="text" class="form-control" name="std_address" id="std_address"
                            value="{{ old('std_address', $student->std_address) }}">
                        @error('std_address')
                            <span class="text-danger">{{ $message = "student address field is required." }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="std_email">Email:</label>
                        <input type="email" class="form-control" name="std_email" id="std_email"
                            value="{{ old('std_email', $student->std_email) }}">
                        @error('std_email')
                            <span class="text-danger">{{ $message = "student email has already been taken." }}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>