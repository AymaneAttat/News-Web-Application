@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 p-4 gap-4 text-black dark:text-white">
        <div class="md:col-span-2 xl:col-span-3">
            <h3 class="text-lg font-semibold">Liste des news du {{$user->name}}</h3>
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
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Nbr Commentaire</th>
                                <th class="px-4 py-3">Nbr j'aime</th>
                                <th class="px-4 py-3">Nbr Déteste</th>
                                <th class="px-4 py-3">Action</th>
                                <th class="px-4 py-3">Date Creation</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($posts as $post)
                                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{$post->title}}</p>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <a class="inline-block" href="{{route('admin.postcomment',['admin' => $post ])}}">
                                                <svg class="w-5 h-full inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 128 128"><path d="M64.32 103.32c-34.03 0-53.56-33.13-56.94-39.38c3.07-6.27 20.91-39.26 56.94-39.26s53.87 32.98 56.94 39.26c-3.38 6.25-22.92 39.38-56.94 39.38z" fill="#fafafa"/><path d="M64.32 27.12c15.81 0 29.84 6.42 41.7 19.09c6.63 7.08 10.73 14.26 12.49 17.67c-4.51 7.99-23.05 36.99-54.19 36.99c-14.88 0-28.63-6.45-40.89-19.17c-6.89-7.15-11.37-14.41-13.3-17.82c1.75-3.41 5.86-10.6 12.49-17.67c11.86-12.67 25.89-19.09 41.7-19.09m0-4.88C22.56 22.24 4.66 64 4.66 64s20.25 41.76 59.66 41.76S123.97 64 123.97 64s-17.9-41.76-59.65-41.76z" fill="#b0bec5"/><path d="M64.32 37c26.97 0 45.47 16.51 53.66 27.71c.96 1.31 1.99-4.99 1.12-6.36c-7.84-12.26-25.41-32.91-54.77-32.91S17.38 46.1 9.54 58.36c-.88 1.37.3 6.83 1.41 5.64c8.54-9.17 26.39-27 53.37-27z" fill="#b0bec5"/><circle cx="64.32" cy="60.79" r="33.15" fill="#9c7a63"/><path d="M64.32 37c10.87 0 20.36 2.68 28.36 6.62c-5.81-9.58-16.34-15.97-28.36-15.97c-12.28 0-23 6.69-28.72 16.61C43.61 40.04 53.18 37 64.32 37z" fill="#806451"/><circle cx="64.32" cy="60.79" r="15.43" fill="#212121"/><circle cx="88.86" cy="59.37" r="7.72" fill="#d9baa5"/><g><path d="M7.21 67.21c-.52 0-1.05-.13-1.54-.4a3.207 3.207 0 0 1-1.27-4.35c.85-1.55 21.28-40.21 59.92-40.21s58.47 37.89 59.29 39.41c.84 1.56.27 3.5-1.29 4.35c-1.56.84-3.5.27-4.35-1.29c-.18-.34-18.88-33.86-53.66-33.86c-34.79 0-54.11 34.34-54.3 34.69a3.185 3.185 0 0 1-2.8 1.66z" fill="#616161"/></g></svg>
                                                <span>{{$post->comments->count()}}</span>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <button class="modal-open" data-toggle="modal" data-target="firstModal">
                                                <svg class="w-5 h-full inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 128 128"><path d="M64.32 103.32c-34.03 0-53.56-33.13-56.94-39.38c3.07-6.27 20.91-39.26 56.94-39.26s53.87 32.98 56.94 39.26c-3.38 6.25-22.92 39.38-56.94 39.38z" fill="#fafafa"/><path d="M64.32 27.12c15.81 0 29.84 6.42 41.7 19.09c6.63 7.08 10.73 14.26 12.49 17.67c-4.51 7.99-23.05 36.99-54.19 36.99c-14.88 0-28.63-6.45-40.89-19.17c-6.89-7.15-11.37-14.41-13.3-17.82c1.75-3.41 5.86-10.6 12.49-17.67c11.86-12.67 25.89-19.09 41.7-19.09m0-4.88C22.56 22.24 4.66 64 4.66 64s20.25 41.76 59.66 41.76S123.97 64 123.97 64s-17.9-41.76-59.65-41.76z" fill="#b0bec5"/><path d="M64.32 37c26.97 0 45.47 16.51 53.66 27.71c.96 1.31 1.99-4.99 1.12-6.36c-7.84-12.26-25.41-32.91-54.77-32.91S17.38 46.1 9.54 58.36c-.88 1.37.3 6.83 1.41 5.64c8.54-9.17 26.39-27 53.37-27z" fill="#b0bec5"/><circle cx="64.32" cy="60.79" r="33.15" fill="#9c7a63"/><path d="M64.32 37c10.87 0 20.36 2.68 28.36 6.62c-5.81-9.58-16.34-15.97-28.36-15.97c-12.28 0-23 6.69-28.72 16.61C43.61 40.04 53.18 37 64.32 37z" fill="#806451"/><circle cx="64.32" cy="60.79" r="15.43" fill="#212121"/><circle cx="88.86" cy="59.37" r="7.72" fill="#d9baa5"/><g><path d="M7.21 67.21c-.52 0-1.05-.13-1.54-.4a3.207 3.207 0 0 1-1.27-4.35c.85-1.55 21.28-40.21 59.92-40.21s58.47 37.89 59.29 39.41c.84 1.56.27 3.5-1.29 4.35c-1.56.84-3.5.27-4.35-1.29c-.18-.34-18.88-33.86-53.66-33.86c-34.79 0-54.11 34.34-54.3 34.69a3.185 3.185 0 0 1-2.8 1.66z" fill="#616161"/></g></svg>
                                                {{$post->like}}
                                            </button>
                                            @include('admin.modal.listuser', $post->liked)
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <button id="buttonmodal" class="show-modal" type="button">
                                                <svg class="w-5 h-full inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 128 128"><path d="M64.32 103.32c-34.03 0-53.56-33.13-56.94-39.38c3.07-6.27 20.91-39.26 56.94-39.26s53.87 32.98 56.94 39.26c-3.38 6.25-22.92 39.38-56.94 39.38z" fill="#fafafa"/><path d="M64.32 27.12c15.81 0 29.84 6.42 41.7 19.09c6.63 7.08 10.73 14.26 12.49 17.67c-4.51 7.99-23.05 36.99-54.19 36.99c-14.88 0-28.63-6.45-40.89-19.17c-6.89-7.15-11.37-14.41-13.3-17.82c1.75-3.41 5.86-10.6 12.49-17.67c11.86-12.67 25.89-19.09 41.7-19.09m0-4.88C22.56 22.24 4.66 64 4.66 64s20.25 41.76 59.66 41.76S123.97 64 123.97 64s-17.9-41.76-59.65-41.76z" fill="#b0bec5"/><path d="M64.32 37c26.97 0 45.47 16.51 53.66 27.71c.96 1.31 1.99-4.99 1.12-6.36c-7.84-12.26-25.41-32.91-54.77-32.91S17.38 46.1 9.54 58.36c-.88 1.37.3 6.83 1.41 5.64c8.54-9.17 26.39-27 53.37-27z" fill="#b0bec5"/><circle cx="64.32" cy="60.79" r="33.15" fill="#9c7a63"/><path d="M64.32 37c10.87 0 20.36 2.68 28.36 6.62c-5.81-9.58-16.34-15.97-28.36-15.97c-12.28 0-23 6.69-28.72 16.61C43.61 40.04 53.18 37 64.32 37z" fill="#806451"/><circle cx="64.32" cy="60.79" r="15.43" fill="#212121"/><circle cx="88.86" cy="59.37" r="7.72" fill="#d9baa5"/><g><path d="M7.21 67.21c-.52 0-1.05-.13-1.54-.4a3.207 3.207 0 0 1-1.27-4.35c.85-1.55 21.28-40.21 59.92-40.21s58.47 37.89 59.29 39.41c.84 1.56.27 3.5-1.29 4.35c-1.56.84-3.5.27-4.35-1.29c-.18-.34-18.88-33.86-53.66-33.86c-34.79 0-54.11 34.34-54.3 34.69a3.185 3.185 0 0 1-2.8 1.66z" fill="#616161"/></g></svg>
                                                {{$post->dislike}}
                                            </button>    
                                            @include('admin.modal.listuserdislike', $post->disliked)
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                                <form  class="inline-block" method="POST" action="{{ route('admin.deletepost', ['admin' => $post]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <svg class="w-4 h-4 inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="4" stroke-linejoin="round"><path d="M9 10v34h30V10H9z"/><path d="M20 20v13" stroke-linecap="round"/><path d="M28 20v13" stroke-linecap="round"/><path d="M4 10h40" stroke-linecap="round"/><path d="M16 10l3.289-6h9.488L32 10H16z"/></g></svg>
                                                    </button>
                                                </form>
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm">{{$user->created_at}}</td>
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
            <!--<div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                { $users->links() }}
            </div>-->
          </div>
        </div>
          <!-- ./Client Table -->
      
    </div>

@endsection