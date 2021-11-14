<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Bienvenue @if(Auth::user()->is_admin) 
                    Administrateur {{Auth::user()->name}}, 
                    <a class="underline italic text-sm text-gray-600 hover:text-gray-900" href="{{route('admin.index')}}">Allez au espace administrateur</a> 
                    @else
                        {{Auth::user()->name}} sur <span style="color: #0ED3CF;">NewsTime</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
