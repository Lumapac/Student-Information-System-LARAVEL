<!-- Add Student Modal -->
<div class="modal fade" id="ModalAddStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalAddStudentLabel" aria-hidden="true"
    onshow="document.body.style.overflow='hidden';"
    onhide="document.body.style.overflow='auto';">
    
    <div class="modal-dialog modal-dialog-scrollable  modal-lg" style="max-width: 75%; margin-left: 20%;">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAddStudentLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('student.save') }}" method="POST">
                    @csrf
                    <!-- Student ID -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student_id">Student ID:</label>
                                <input type="text" id="std_id" name="std_id" class="form-control border border-dark rounded"
                                    value="{{ old('std_id') }}"  style="padding: 10px;" required>
                                @error('std_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="std_email">Email</label>
                                <input type="email" id="std_email" name="std_email" class="form-control border border-dark rounded"
                                    value="{{ old('std_email') }}" style="padding: 10px;" required>
                                @error('std_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="std_firstname">First Name</label>
                        <input type="text" id="std_firstname" name="std_firstname" class="form-control border border-dark rounded"
                            value="{{ old('std_firstname') }}" style="padding: 10px;" required>
                        @error('std_firstname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="std_lastname">Last Name</label>
                        <input type="text" id="std_lastname" name="std_lastname" class="form-control border border-dark rounded"
                            value="{{ old('std_lastname') }}" style="padding: 10px;" required>
                        @error('std_lastname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Middle Name -->
                    <div class="form-group">
                        <label for="std_middlename">Middle Name</label>
                        <input type="text" id="std_middlename" name="std_middlename" class="form-control border border-dark rounded"
                            value="{{ old('std_middlename') }}" style="padding: 10px;">
                        @error('std_middlename')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="std_address">Address</label>
                                <input type="text" id="std_address" name="std_address" class="form-control border border-dark rounded"
                                    value="{{ old('std_address') }}" style="padding: 10px;" required>
                                @error('std_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="std_age">Age</label>
                                <input type="number" id="std_age" name="std_age" class="form-control border border-dark rounded"
                                    value="{{ old('std_age') }}" style="padding: 10px;" required>
                                @error('std_age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Course -->
                    <div class="form-group">
                        <label for="std_course">Course</label>
                        <input type="text" id="std_course" name="std_course" class="form-control border border-dark rounded"
                            value="{{ old('std_course') }}" style="padding: 10px;" required>
                        @error('std_course')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>