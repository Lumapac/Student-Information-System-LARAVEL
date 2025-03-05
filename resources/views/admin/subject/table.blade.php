@extends('admin.sidebar')
@section('title', 'Subject')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navigation')
        <div class="container-fluid py-2">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Available Subject </h6>
                            </div>

                            <div div class="mt-3 d-flex justify-content-between align-items-center px-3">
                                <div class="input-group input-group-outline w-30">
                                    <label class="form-label">Search subject...</label>
                                    <input type="text" class="form-control">
                                </div>

                                <a href="{{ route('subject.add') }}" class="btn btn-success me-3">Add Subject</a>
                            </div>
                        </div>

                        @if(session('success'))
                            <div id="success-alert" class="mx-2 p-2 alert alert-success alert-dismissible fade show mt-2"
                                role="alert">
                                {{ session('success') }}
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
                                                Code</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Subject Code</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Description</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($subjectList->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-3">
                                                    No subject found.
                                                </td>
                                            </tr>
                                        @else

                                            @foreach ($subjectList as $subject)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="text-xs text-bold mb-0 text-center">
                                                                {{ $subject->code }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $subject->subject_code }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0 text-sm">{{ $subject->subject_desc }}</h6>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <div class="d-flex justify-content-center mt-2">

                                                            <a href="{{ route('subject.view', $subject->id) }}"
                                                                class="text-secondary font-weight-bold text-xs mx-1"
                                                                data-toggle="tooltip" data-original-title="Edit user">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </a>

                                                            <a href="#" onclick="deleteSubject({{ $subject->id }})"
                                                                class="text-secondary font-weight-bold text-xs mx-1 delete-icon"
                                                                data-toggle="tooltip" data-original-title="Delete subject"
                                                                id="delete-btn-{{ $subject->id }}">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>

                                                            <form action="{{ route('subject.delete', $subject->id) }}" method="POST"
                                                                id="subject-form-{{ $subject->id }}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteSubject(id) {
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
                    let form = document.getElementById('subject-form-' + id);
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
@endsection