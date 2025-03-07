@extends('admin.sidebar')
@section('title', 'Subject Information')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.navigation')
        <!-- End Navbar -->

        @if (session('success'))
            <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <script>
                setTimeout(function () {
                    let successAlert = document.getElementById('successAlert');
                    if (successAlert) {
                        let bsAlert = new bootstrap.Alert(successAlert);
                        bsAlert.close();
                    }
                }, 2000);
            </script>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                <strong>Failed to update the subject. Please check the errors below:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <script>
                setTimeout(() => {
                    let alertBox = document.getElementById('error-alert');
                    if (alertBox) {
                        let bsAlert = new bootstrap.Alert(alertBox);
                        bsAlert.close();
                    }
                }, 8000);
            </script>
        @endif

        <div class="container-fluid py-2">
            <h4>Code : {{ $subject->code }}</h4>
            <h4>Subject Code : {{ $subject->subject_code }}</h4>
            <h4>Description : {{ $subject->subject_desc }}</h4>
        </div>
        <div class="mt-3">
            <a href="{{ route('subject.list') }}" class="btn btn-light">
                Back
            </a>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUpdateSubject">
                Edit
            </a>
        </div>
        @include('admin.subject.edit')
    </main>
@endsection