@extends('admin.sidebar')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navigation')


        <form action="{{ route('student.save') }}" method="POST">
            @csrf
            <!-- Student information -->
            <div>
                <x-input-label for="std_id" :value="__('Student ID')" />
                <x-text-input id="std_id" class="block mt-1 w-full" type="text" name="std_id" :value="old('std_id')"
                    required autofocus autocomplete="std_id" />
                <x-input-error :messages="$errors->get('std_id')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="std_firstname" :value="__('First Name')" />
                <x-text-input id="std_firstname" class="block mt-1 w-full" type="text" name="std_firstname"
                    :value="old('std_firstname')" required autofocus autocomplete="std_firstname" />
                <x-input-error :messages="$errors->get('std_firstname')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="std_lastname" :value="__('Last Name')" />
                <x-text-input id="std_lastname" class="block mt-1 w-full" type="text" name="std_lastname"
                    :value="old('std_lastname')" required autofocus autocomplete="std_lastname" />
                <x-input-error :messages="$errors->get('std_lastname')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="std_middlename" :value="__('Middle Name')" />
                <x-text-input id="std_middlename" class="block mt-1 w-full" type="text" name="std_middlename"
                    :value="old('std_middlename')" autofocus autocomplete="std_middlename" />
                <x-input-error :messages="$errors->get('std_middlename')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="std_age" :value="__('Age')" />
                <x-text-input id="std_age" class="block mt-1 w-full" type="text" name="std_age" :value="old('std_age')"
                    required autofocus autocomplete="std_age" />
                <x-input-error :messages="$errors->get('std_age')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="std_course" :value="__('Course')" />
                <x-text-input id="std_course" class="block mt-1 w-full" type="text" name="std_course"
                    :value="old('std_course')" required autofocus autocomplete="std_course" />
                <x-input-error :messages="$errors->get('std_course')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="std_address" :value="__('Address')" />
                <x-text-input id="std_address" class="block mt-1 w-full" type="text" name="std_address"
                    :value="old('std_address')" required autofocus autocomplete="std_address" />
                <x-input-error :messages="$errors->get('std_address')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="std_email" :value="__('Email')" />
                <x-text-input id="std_email" class="block mt-1 w-full" type="email" name="std_email"
                    :value="old('std_email')" required autocomplete="std_email" />
                <x-input-error :messages="$errors->get('std_email')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ms-4" type="submit">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </main>
@endsection