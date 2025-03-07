<div class="modal fade" id="subjectModal" tabindex="-1" aria-labelledby="subjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subjectModalLabel">Add New Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Start -->
                <form action="{{ route('subject.save') }}" method="POST">
                    @csrf
                    <!-- Subject Code -->
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control border border-dark rounded" id="code" name="code" value="{{ old('code') }}"
                            required>
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Subject Code -->
                    <div class="mb-3">
                        <label for="subject_code" class="form-label">Subject Code</label>
                        <input type="text" class="form-control border border-dark rounded" id="subject_code" name="subject_code"
                            value="{{ old('subject_code') }}" required>
                        @error('subject_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Subject Description -->
                    <div class="mb-3">
                        <label for="subject_desc" class="form-label">Description</label>
                        <input type="text" class="form-control border border-dark rounded" id="subject_desc" name="subject_desc"
                            value="{{ old('subject_desc') }}" required>
                        @error('subject_desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>