@extends('admin.sidebar')
@section('title', 'Student')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navigation')
        <div class="container-fluid py-2">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Student table</h6>
                            </div>

                            <div div class="mt-3 d-flex justify-content-between align-items-center px-3">
                            <div class="input-group input-group-outline w-30">
                                <label class="form-label">Search subject...</label>
                                <input type="text" class="form-control" id="searchInput">
                            </div>

                                <a href="{{ route('student.add') }}" class="btn btn-success me-3">Add Student</a>
                            </div>
                        </div>

                        @if(session('confirmationMessage'))
                            <div id="success-alert"
                                class="mx-2 p-2 alert alert-{{ session('alertType') }} alert-dismissible fade show mt-2"
                                role="alert">
                                {{ session('confirmationMessage') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <script>
                                setTimeout(() => {
                                    let alertBox = document.getElementById('success-alert');
                                    if (alertBox) {
                                        let bsAlert = new bootstrap.Alert(alertBox);
                                        bsAlert.close();
                                    }
                                }, 1250);
                            </script>
                        @endif


                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="w-8 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                STUDENT ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Address</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($studentsList->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-3">
                                                    No students found.
                                                </td>
                                            </tr>
                                        @else
                                        
                                        @foreach ($studentsList as $student)
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-xs mb-0 text-center">
                                                            {{ $student->std_id }}
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $student->std_firstname .' '. $student->std_middlename .' '. $student->std_lastname }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $student->std_email }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm">{{ $student->std_address }}</h6>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex flex-column align-items-center mt-2">
                                                        @php
                                                            $isEnrolled = \App\Models\EnrollStudent::where('student_id', $student->id)->exists();
                                                        @endphp

                                                        @if ($isEnrolled)
                                                            <span class="badge bg-success">Enrolled</span>
                                                        @else
                                                            <span class="badge bg-danger">Not Enrolled</span>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex justify-content-center mt-2">

                                                        <a href="{{ route('student.view', $student->id) }}" class="text-secondary font-weight-bold text-xs mx-1"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                        
                                                        <a href="#" onclick="deleteStudent({{ $student->id }})"
                                                            class="text-secondary font-weight-bold text-xs mx-1 delete-icon"
                                                            data-toggle="tooltip" data-original-title="Delete user" id="delete-btn-{{ $student->id }}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>

                                                        <form action="{{ route('student.delete', $student->id) }}" method="POST" id="student-form-{{ $student->id }}">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                    <div class="mt-3">
                                        {{ $studentsList->links('vendor.pagination.material-dashboard') }}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteStudent(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = document.getElementById('student-form-' + id);
                    let deleteButton = document.getElementById('delete-btn-' + id);

                    if (form) {
                        // Disable delete button and add a loading effect
                        deleteButton.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> Deleting...`;
                        deleteButton.classList.add("disabled");
                        deleteButton.style.pointerEvents = "none"; // Prevents further clicks

                        // Show SweetAlert loading state
                        Swal.fire({
                            title: "Deleting...",
                            text: "Please wait",
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // Submit the form after a short delay
                        setTimeout(() => {
                            form.submit();
                        }, 1000);
                    }
                }
            });
        }
    </script>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            let searchValue = this.value.toLowerCase();
            let subjectRows = document.querySelectorAll('tbody tr');

            subjectRows.forEach(row => {
                let code = row.children[0]?.textContent.toLowerCase() || "";
                let subjectCode = row.children[1]?.textContent.toLowerCase() || "";
                let description = row.children[2]?.textContent.toLowerCase() || "";

                if (code.includes(searchValue) || subjectCode.includes(searchValue) || description.includes(searchValue)) {
                    row.style.display = ''; // Show matching rows
                } else {
                    row.style.display = 'none'; // Hide non-matching rows
                }
            });
        });
    </script>
@endsection