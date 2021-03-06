<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modification du News') }}
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
        <form method="POST" action=" {{ route('posts.update',['post' => $post->id]) }} ">
            @csrf
            @method('PUT')
            <div class="mt-4">
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="w-full block mt-1" type="text" name="title" value="{{ $post->title }}" required autofocus />
            </div>
            <div class="mt-4">
                <x-label for="url" :value="__('Url')" />
                <x-input id="url" class="w-full block mt-1" type="text" name="url" value="{{ $post->url }}" required autofocus />
            </div>
            <div class="mt-4">
                <label for="content">{{__('content')}}</label>
                <textarea class="w-full block mt-1" id="content" name="content" rows="3">{{ old('content', $post->content) }}</textarea>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('posts.index') }}">
                    {{ __("Retourne ?? la page d'accueil") }}
                </a>
                <x-button class="ml-4 rounded-full">
                    {{ __('Modifier') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>