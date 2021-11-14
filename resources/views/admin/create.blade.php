@extends('layouts.admin')
@section('content')
<!-- Contact Form -->
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    
        <a href="/">
            <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> 
            <svg class="w-20 h-20 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 27" class="h-7 w-7 -mt-2 flex-shrink-0"><path d="M22.487.658s5.03 13.072-1.822 22.171C16.476 28.39 9.84 27.26 5.484 25.68c1.513-3.391 3.441-6.067 5.784-8.03 1.176.623 3.186.792 6.03.51-2.535-.221-4.284-.654-5.246-1.3l.125.08c2.122-1.546 4.556-2.556 7.303-3.029-3.16-.285-6.026.315-8.598 1.804-.577-.742-1.157-1.748-1.74-3.018.07 1.534.339 2.734.809 3.6-2.64 1.797-4.953 4.58-6.94 8.351a7.583 7.583 0 01-.188-.088c-.802-.358-1.328-1.037-1.755-2.036C-1.9 13.366 4.645 8.273 11.123 7.989 23.046 7.465 22.487.658 22.487.658z" fill="#0ED3CF"></path></svg>-->
            <svg class="w-20 h-20 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path d="M128 76a44 44 0 1 1-44 44a44 44 0 0 1 44-44zm48-12h16v16a8 8 0 0 0 16 0V64h16a8 8 0 0 0 0-16h-16V32a8 8 0 0 0-16 0v16h-16a8 8 0 0 0 0 16zm45.56 40.956a8 8 0 0 0-6.649 9.154A89 89 0 0 1 216 128a87.637 87.637 0 0 1-22.242 58.41a79.704 79.704 0 0 0-24.43-22.974a59.836 59.836 0 0 1-82.655 0a79.703 79.703 0 0 0-24.431 22.974A87.95 87.95 0 0 1 128 40a89.03 89.03 0 0 1 13.89 1.089a8 8 0 1 0 2.505-15.803A104.083 104.083 0 0 0 24 128a103.747 103.747 0 0 0 33.82 76.68a7.945 7.945 0 0 0 1.326 1.19a103.784 103.784 0 0 0 137.712-.003a7.946 7.946 0 0 0 1.317-1.181A103.748 103.748 0 0 0 232 128a105.047 105.047 0 0 0-1.286-16.395a7.998 7.998 0 0 0-9.154-6.649z" fill="currentColor"/></svg>
        </a>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            <div>
                <label class="bg-white-800" for="name" :value="__('Name')">{{__('Name')}}</label>
                <x-input id="name" class="block mt-1 w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label class="bg-white-800" for="email" :value="__('Email')">{{__('Email')}}</label>
                <x-input id="email" class="block mt-1 w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="bg-white-800" for="password" :value="__('Password')">{{__('Password')}}</label>
                <x-input id="password" class="block mt-1 w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label class="bg-white-800" for="password_confirmation" :value="__('Confirm Password')">{{__('Confirm Password')}}</label>
                <x-input id="password_confirmation" class="block mt-1 w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                
                <button class="ml-4 bg-blue-600 dark:bg-gray-100 text-white px-4 w-auto h-7 dark:text-gray-800 hover:bg-blue-700 dark:hover:bg-gray-200 rounded-lg active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                     
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
  <!-- ./Contact Form -->
@endsection