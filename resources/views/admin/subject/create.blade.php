@extends('admin.sidebar')
@section('title', 'Add Subject')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.navigation')


        <form action="{{ route('subject.save') }}" method="POST">
            @csrf
            <!-- Subject information -->
            <div>
                <x-input-label for="code" :value="__('Code')" />
                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required
                    autofocus autocomplete="code" />
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="subject_code" :value="__('Subect Code')" />
                <x-text-input id="subject_code" class="block mt-1 w-full" type="text" name="subject_code"
                    :value="old('subject_code')" required autofocus autocomplete="subject_code" />
                <x-input-error :messages="$errors->get('subject_code')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="subject_desc" :value="__('Description')" />
                <x-text-input id="subject_desc" class="block mt-1 w-full" type="text" name="subject_desc"
                    :value="old('subject_desc')" required autofocus autocomplete="subject_desc" />
                <x-input-error :messages="$errors->get('subject_desc')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ms-4" type="submit">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </main>
@endsection