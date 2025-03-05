@extends('admin.sidebar')
@section('title', 'Student Profile')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        @include('layouts.navigation')  

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="container-fluid py-2">
                <div class="row">
                <div class="col-12">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </main>
@endsection