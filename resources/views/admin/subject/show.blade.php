@extends('admin.sidebar')
@section('title', 'Subject Information')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.navigation')
        <!-- End Navbar -->
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