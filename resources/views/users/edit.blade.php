<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modification Profil') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <svg class="w-20 h-20 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 27" class="h-7 w-7 -mt-2 flex-shrink-0"><path d="M22.487.658s5.03 13.072-1.822 22.171C16.476 28.39 9.84 27.26 5.484 25.68c1.513-3.391 3.441-6.067 5.784-8.03 1.176.623 3.186.792 6.03.51-2.535-.221-4.284-.654-5.246-1.3l.125.08c2.122-1.546 4.556-2.556 7.303-3.029-3.16-.285-6.026.315-8.598 1.804-.577-.742-1.157-1.748-1.74-3.018.07 1.534.339 2.734.809 3.6-2.64 1.797-4.953 4.58-6.94 8.351a7.583 7.583 0 01-.188-.088c-.802-.358-1.328-1.037-1.755-2.036C-1.9 13.366 4.645 8.273 11.123 7.989 23.046 7.465 22.487.658 22.487.658z" fill="#0ED3CF"></path></svg>
            </a>
        </x-slot>
        <!-- Session Status -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('users.update',['user' => $user->id]) }}">
            @csrf
            @method('PUT')
            <div>
                <label class="bg-white-800" for="name" :value="__('Name')">{{__('Name')}}</label>
                <x-input id="name" class="block mt-1 w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50" type="text" name="name" value="{{$user->name}}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label class="bg-white-800" for="email" :value="__('Email')">{{__('Email')}}</label>
                <x-input id="email" class="block mt-1 w-full bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50" type="email" name="email" value="{{$user->email}}" required />
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
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('users.show',['user' => $user]) }}">
                    {{ __("Retourne au votre profile") }}
                </a>
                <button class="ml-4 bg-blue-600 dark:bg-gray-100 text-white px-4 w-auto h-7 dark:text-gray-800 hover:bg-blue-700 dark:hover:bg-gray-200 rounded-lg active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                    
                    {{ __('Modifier') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>