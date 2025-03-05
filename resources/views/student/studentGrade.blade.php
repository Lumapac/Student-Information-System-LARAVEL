@extends('student.sidebar')
@section('title', 'Grade')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navigation')
        <div class="container-fluid py-2">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 bg">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Grade</h6>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center w-2">Subject Code</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Grade</th>
                                    </tr>
                                </thead>
                                <tbody class="border-bottom">
                                    @foreach($enrolledSubjects as $enrolled)
                                        <tr>
                                            <td class="text-center">{{ $enrolled->subject->code }}</td>
                                            <td class="text-center">{{ $enrolled->subject->subject_desc }}</td>
                                            <td class="text-center">
                                                {{ $enrolled->grade ?? 'N/A' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-3 me-5 text-end">
                            <h6>Grade Average: <strong>{{ $gradeAverage }}</strong></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection