<form action="{{ route('subject.update', $subject->id) }}" method="post">
    @csrf
    @method('PATCH')

    <div class="modal fade" id="ModalUpdateSubject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="ModalUpdateSubject" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalUpdateSubject">Update Subject Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="code">Code :</label>
                        <input type="text" class="form-control" name="code" id="code"
                            value="{{ old('code', $subject->code) }}">
                        @error('code')
                            <span class="text-danger">{{ $message = "Code has already been asigned." }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subject_code">Subject Code:</label>
                        <input type="text" class="form-control" name="subject_code" id="subject_code"
                            value="{{ old('subject_code', $subject->subject_code) }}">
                        @error('subject_code')
                            <span class="text-danger">{{ $message = "Subject code has already been asigned." }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subject_desc">Subject Description:</label>
                        <input type="text" class="form-control" name="subject_desc" id="subject_desc"
                            value="{{ old('subject_desc', $subject->subject_desc) }}">
                        @error('subject_desc')
                            <span class="text-danger">{{ $message = "Subject description must be unique." }}</span>
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