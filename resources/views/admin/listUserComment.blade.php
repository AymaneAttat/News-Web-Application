@extends('layouts.admin')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 p-4 gap-4 text-black dark:text-white">
    <div class="md:col-span-2 xl:col-span-3">
        <h3 class="text-lg font-semibold">Liste des commentaires du news "{{$post->title}}" de {{$post->user->name}}</h3>
    </div>
</div>
    <!-- Client Table -->
    <div class="mt-4 mx-4">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <table class="w-full">
                            <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Contenu</th>
                                <th class="px-4 py-3">Utilisateur</th>
                                <th class="px-4 py-3">Action</th>
                                <th class="px-4 py-3">Date Creation</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($comments as $comment)
                                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{$comment->content}}</p>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <div class="flex items-center text-sm">
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full" src="{{$comment->user->image ? $comment->user->image->url() : 'http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg'}}" alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{$comment->user->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                                <form  class="inline-block" method="POST" action="{{ route('admin.deletePostComment', ['admin' => $comment]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <svg class="w-4 h-4 inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="4" stroke-linejoin="round"><path d="M9 10v34h30V10H9z"/><path d="M20 20v13" stroke-linecap="round"/><path d="M28 20v13" stroke-linecap="round"/><path d="M4 10h40" stroke-linecap="round"/><path d="M16 10l3.289-6h9.488L32 10H16z"/></g></svg>
                                                    </button>
                                                </form>
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{$comment->created_at}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td><p>vide</p></td>
                                        <td><p>vide</p></td>
                                        <td><p>vide</p></td>
                                        <td><p>vide</p></td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                            
                        </table>
              </div>
          </div>
        </div>
          <!-- ./Client Table -->
    </div>

@endsection