<x-app-layout>
    <x-slot name="header">       
        <h2 class="inline-flex font-semibold text-xl text-gray-800 leading-tight mr-6">
        {{ __('News avec des commentaires') }}
        </h2>
        <button id="openModal" class="openModal text-white px-4 w-auto h-7 bg-red-600 rounded-full hover:bg-red-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none float-right">
            <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-4 h-4 inline-block mr-1">
                <path fill="#FFFFFF" d="M17.561,2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984,7.264L2.21,14.037L1.2,18.799l4.763-1.01 l6.774-6.771l6.052-6.052C18.788,4.966,19.005,3.883,17.561,2.439z M5.68,17.217l-1.624,0.35c-0.156-0.293-0.345-0.586-0.69-0.932 c-0.346-0.346-0.639-0.533-0.932-0.691l0.35-1.623l0.47-0.469c0,0,0.883,0.018,1.881,1.016c0.997,0.996,1.016,1.881,1.016,1.881 L5.68,17.217z"/>
            </svg>
            <span>{{__('Créer News')}}</span>
        </button>  
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" /><!-- Validation Errors <x-auth-validation-errors class="mb-4" :errors="$errors" />-->
    @include('posts.modal.create')
    <div class="py-10">
        <div class="inline-flex w-screen space-x-12">
            <div class="w-2/3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-center text-4xl">{{$post->title}}</h1>
                        <h4>
                            <p class="italic">{{$post->content}}</p>
                            <a href="{{$post->url}}" class="underline">
                                <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 128 128"><path d="M59.15 26.26c.12 1.07.38 2.12.71 3.19c.13-.59.24-1.18.32-1.77c.17-1.19.16-2.32.06-3.38c-.17-1.03-.46-1.96-.93-2.74l-.06-.09c-.31 1.49-.33 3.13-.1 4.79z" fill="none"/><path d="M58.37 52.61c-3.66 10.13-7.21 19.92-10.57 29.2c-.84 2.32-1.67 4.61-2.49 6.86c-.2.56-.41 1.12-.61 1.68l-.3.85c-.15.37-.3.75-.48 1.11c-.71 1.44-1.74 2.71-2.97 3.7c-2.45 1.99-5.66 2.86-8.71 2.36c-2.98-.45-5.71-2.21-7.35-4.61c-1.66-2.4-2.31-5.33-1.83-8.14l.12-.58c.04-.18.09-.42.12-.51l.27-.87c.17-.48.35-.95.52-1.43c.35-.95.69-1.88 1.03-2.8c1.36-3.69 2.64-7.18 3.85-10.47c2.42-6.57 4.52-12.3 6.26-17.02c3.47-9.43 5.45-14.83 5.45-14.83a2.447 2.447 0 0 1 3.13-1.45c1.25.46 1.9 1.84 1.46 3.09c0 0-1.89 5.42-5.21 14.91c-1.66 4.75-3.67 10.51-5.98 17.12c-1.15 3.3-2.38 6.82-3.68 10.53c-.32.93-.65 1.86-.99 2.81c-.17.47-.34.95-.51 1.43l-.18.6c-.05.15-.03.17-.05.24l-.03.18c-.2 1.25.11 2.74.93 3.88a5.25 5.25 0 0 0 3.54 2.17c1.39.22 2.96-.22 4.11-1.17c.58-.47 1.05-1.07 1.38-1.75l.22-.52l.3-.83c.2-.56.4-1.12.6-1.69c.8-2.26 1.61-4.56 2.43-6.88c3.3-9.3 6.79-19.11 10.39-29.26c1.36-3.79 2.74-7.65 4.12-11.53c-.38-1-.75-1.99-1.13-2.99l-.71-2l-.38-1.03l-.39-1.13c-.49-1.52-.88-3.09-1.09-4.73c-.4-2.86-.3-6 .77-8.99h-.02l-.35-.05c-.24-.03-.45-.1-.71-.12c-.53-.03-1.07-.09-1.58-.02c-1.04.07-2.04.3-2.98.79c-1.9.9-3.59 2.59-4.88 4.67c-1.37 2.06-2.13 4.43-3.14 7.25c-7.82 21.59-15.63 43.2-22.95 63.46l-.69 1.9l-.25.82c-.08.3-.23.69-.25.91c-.17.9-.37 2.03-.32 3.12c.01 2.17.57 4.32 1.57 6.22c1.95 3.86 5.72 6.46 9.81 7.16c3.98.73 8.22-.58 11.17-3.06c1.49-1.24 2.69-2.78 3.51-4.46c.18-.43.37-.86.55-1.29c.19-.52.38-1.03.57-1.55c.38-1.03.75-2.05 1.12-3.07c5.97-16.17 10.94-29.64 14.42-39.07c1.39-3.76 2.54-6.87 3.43-9.26c-.57-1.5-1.13-3.01-1.7-4.52c-.57 1.54-1.13 3.11-1.69 4.66z" fill="none"/><path d="M104.2 78.45c-.1-.39-.23-.77-.35-1.15l-.31-.84c-.21-.56-.41-1.12-.62-1.68c-.83-2.25-1.67-4.53-2.53-6.85c-3.43-9.26-7.04-19.02-10.78-29.12c-1.88-5.05-3.79-10.18-5.73-15.37c-.94-2.56-2.03-5.48-3.74-8.17c-.85-1.36-1.92-2.67-3.19-3.88c-1.33-1.17-2.91-2.2-4.73-2.81c-1.81-.54-3.78-.76-5.55-.46c-.45.06-.9.11-1.34.2l-1.25.36l-.62.19l-.31.1c-.11.03.05-.05-.29.09l-.12.05l-.98.42c-.18.08-.3.12-.52.24l-.62.34c-.41.24-.85.46-1.21.72c-.72.52-1.45 1.04-2.09 1.7c-.04.04-.07.08-.11.11c-1.25 1.23-2.32 2.71-3.02 4.33c-.17.38-.32.76-.45 1.14c.11.01.31.09.46.13c2.32.68 4.08 1.72 5.06 3.23c.14-.68.34-1.33.62-1.93c.41-.98 1.03-1.8 1.77-2.53c.33-.36.76-.65 1.16-.96c.02-.01.04-.03.06-.04c.21-.16.42-.24.62-.37l.3-.19c.09-.06.3-.14.45-.21c2.25-1 4.31-1.34 6.05-.78c.87.29 1.69.81 2.48 1.49c.76.75 1.5 1.6 2.13 2.62c1.3 2.04 2.21 4.37 3.18 7.01c1.94 5.19 3.86 10.32 5.75 15.36C87.63 51.02 91.3 60.76 94.78 70c.87 2.31 1.73 4.59 2.58 6.83l.63 1.68l.31.83l.17.54c.19.73.21 1.49.07 2.22c-.26 1.47-1.18 2.82-2.38 3.55c-1.26.78-2.74.99-4.11.63c-1.36-.34-2.56-1.27-3.21-2.36l-.09-.16c-.04-.06-.06-.07-.12-.21l-.25-.57c-.18-.48-.36-.95-.54-1.42c-.36-.94-.71-1.87-1.06-2.79c-1.4-3.67-2.74-7.15-3.99-10.41c-2.5-6.54-4.69-12.24-6.48-16.93c-3.6-9.39-5.65-14.75-5.65-14.75a2.446 2.446 0 0 0-3.11-1.42a2.44 2.44 0 0 0-1.46 3.12s1.97 5.4 5.4 14.84c1.72 4.72 3.81 10.46 6.2 17.04c1.2 3.29 2.47 6.79 3.82 10.48c.34.92.68 1.86 1.02 2.8c.17.47.35.95.53 1.43l.35.84c.03.09.15.3.23.47l.28.52c1.45 2.46 3.84 4.28 6.65 5.04c2.79.78 6.02.36 8.59-1.22c2.65-1.59 4.54-4.33 5.13-7.42c.33-1.56.3-3.19-.09-4.75z" fill="#3bb2de"/><g fill="#67939c"><path d="M28.71 86.41c.01-.07 0-.09.05-.24l.18-.6c.17-.48.34-.96.51-1.43c.33-.95.66-1.89.99-2.81c1.29-3.71 2.52-7.22 3.68-10.53c2.31-6.61 4.32-12.37 5.98-17.12c3.31-9.49 5.21-14.91 5.21-14.91a2.437 2.437 0 0 0-4.59-1.64l-5.45 14.83c-1.74 4.72-3.84 10.45-6.26 17.02c-1.21 3.29-2.49 6.78-3.85 10.47c-.34.92-.68 1.86-1.03 2.8c-.17.47-.34.95-.52 1.43l-.27.87c-.03.09-.08.33-.12.51l-.12.58c-.48 2.81.17 5.75 1.83 8.14c1.63 2.4 4.37 4.16 7.35 4.61c3.05.5 6.26-.37 8.71-2.36c1.22-.99 2.25-2.26 2.97-3.7c.17-.36.32-.74.48-1.11l.31-.84c.2-.56.41-1.12.61-1.68c.82-2.25 1.65-4.54 2.49-6.86c3.36-9.28 6.9-19.07 10.57-29.2c.56-1.55 1.12-3.12 1.68-4.68c-1.12-2.97-2.24-5.95-3.36-8.93c-1.39 3.88-2.77 7.73-4.12 11.53c-3.6 10.15-7.09 19.96-10.39 29.26c-.82 2.33-1.63 4.62-2.43 6.88c-.2.57-.4 1.13-.6 1.69l-.3.83l-.22.52c-.33.68-.8 1.27-1.38 1.75c-1.14.96-2.72 1.39-4.11 1.17a5.25 5.25 0 0 1-3.54-2.17c-.82-1.14-1.13-2.62-.93-3.88l-.01-.2z"/><path d="M66.49 45.66c-.23-.09-.47-.12-.71-.12c-.85-.01-1.65.51-1.96 1.35c0 0-.72 1.96-2.06 5.56c-.88 2.39-2.03 5.49-3.43 9.26c-3.48 9.43-8.45 22.9-14.42 39.07c-.37 1.01-.74 2.03-1.12 3.07c-.19.51-.38 1.03-.57 1.55c-.18.43-.37.86-.55 1.29c-.83 1.69-2.02 3.22-3.51 4.46c-2.95 2.49-7.19 3.8-11.17 3.06c-4.09-.7-7.86-3.3-9.81-7.16c-1-1.9-1.56-4.05-1.57-6.22c-.05-1.08.15-2.21.32-3.12c.02-.22.17-.61.25-.91l.25-.82l.69-1.9c7.32-20.26 15.13-41.86 22.94-63.47c1.01-2.82 1.77-5.19 3.14-7.25c1.3-2.07 2.98-3.77 4.88-4.67c.94-.48 1.95-.71 2.98-.79c.51-.06 1.05 0 1.58.02c.26.02.47.09.71.12l.35.05h.02c.11.01.31.09.46.13c2.32.68 4.08 1.72 5.06 3.23l.06.09c.47.79.77 1.71.93 2.74c.1 1.06.11 2.19-.06 3.38c-.08.59-.19 1.18-.32 1.77c.43 1.38.98 2.8 1.57 4.37c.62 1.68 1.25 3.37 1.87 5.05c.2-.57.41-1.13.61-1.7c.93-2.56 1.99-5.49 2.42-8.66c.23-1.59.26-3.28.07-5.02c-.26-1.75-.8-3.56-1.8-5.2c-.52-.8-1.13-1.56-1.8-2.23c-.66-.66-1.38-1.25-2.15-1.7c-.38-.24-.76-.5-1.15-.71l-1.18-.53l-.6-.26l-.3-.13c-.11-.04 0-.01-.23-.09c-.03-.01-.04-.01-.07-.02l-.11-.01l-1.02-.31c-.19-.05-.3-.1-.55-.15l-.7-.14c-.46-.08-.95-.19-1.39-.23c-.89-.07-1.78-.14-2.69-.05c-1.8.12-3.63.57-5.25 1.37c-3.29 1.57-5.73 4.19-7.47 6.95c-.89 1.38-1.61 2.84-2.22 4.32l-.44 1.11l-.38 1.03l-.73 2.03c-7.7 21.65-15.39 43.3-22.6 63.59L10.89 94l-.12.38l-.07.24l-.14.48c-.09.35-.2.58-.28 1.02c-.16.82-.38 1.69-.41 2.45l-.1 1.17c-.01.39 0 .78 0 1.17c0 1.56.26 3.1.61 4.59c.43 1.47.95 2.92 1.7 4.25c1.43 2.68 3.47 5 5.92 6.7c.62.42 1.22.84 1.89 1.17l.98.52l1.02.42l.51.21l.25.1c.01.01.34.11.25.08l.11.03l.9.26c.52.18 1.41.33 2.14.47c5.8.97 11.56-.94 15.65-4.45c2.05-1.76 3.69-3.92 4.81-6.28c.25-.6.5-1.2.74-1.79c.19-.53.37-1.05.55-1.57c.36-1.04.73-2.06 1.08-3.08c5.66-16.28 10.38-29.84 13.69-39.33c.56-1.63 1.08-3.12 1.56-4.51c1.52-4.39 2.6-7.5 3.16-9.12c.29-.85.45-1.3.45-1.3c.36-1.05-.19-2.22-1.25-2.62z"/></g><path d="M116.93 89.54c-.2-.62-.4-1.24-.59-1.85c-.2-.52-.39-1.04-.59-1.56c-.39-1.03-.78-2.04-1.16-3.05c-6.18-16.09-11.33-29.49-14.93-38.88c-3.61-9.38-5.68-14.74-5.68-14.74a2.091 2.091 0 0 0-2.65-1.21a2.078 2.078 0 0 0-1.25 2.66s1.95 5.4 5.37 14.85l14.21 39.15c.37 1.01.74 2.03 1.12 3.06c.19.51.38 1.03.56 1.55c.14.45.27.89.41 1.34c.46 1.82.53 3.77.2 5.68c-.65 3.81-3.04 7.54-6.56 9.55c-3.58 2.11-8.13 2.55-12.11.86c-1.99-.8-3.8-2.08-5.21-3.74c-.74-.79-1.32-1.78-1.77-2.58c-.12-.18-.26-.58-.39-.86l-.33-.77l-.7-1.89c-5.65-15.26-11.59-31.3-17.6-47.52l-1.5-4.05c-.82-2.22-1.65-4.44-2.47-6.67c-.62-1.68-1.25-3.37-1.87-5.05c-.59-1.58-1.14-3-1.57-4.37c-.33-1.07-.59-2.12-.71-3.19c-.24-1.66-.21-3.3.1-4.79c-.98-1.5-2.74-2.55-5.06-3.23c-.15-.04-.35-.11-.46-.13c-1.07 2.99-1.17 6.12-.77 8.99c.21 1.63.6 3.21 1.09 4.73l.39 1.13l.37 1.04l.75 2.02c.38 1 .75 1.99 1.13 2.99c1.12 2.98 2.24 5.95 3.36 8.93c.57 1.51 1.14 3.02 1.7 4.52c.79 2.09 1.57 4.18 2.36 6.26c5.2 13.81 10.32 27.42 15.24 40.46l.71 1.89l.15.37l.1.23l.2.46c.15.33.22.57.44.96c.41.72.8 1.54 1.27 2.14l.68.96c.24.31.5.6.76.89c1.01 1.19 2.2 2.2 3.43 3.11c1.28.85 2.61 1.62 4.04 2.15c2.82 1.12 5.88 1.58 8.84 1.3c.74-.08 1.48-.15 2.2-.33l1.08-.24l1.05-.33l.52-.17l.26-.09c.02 0 .33-.13.25-.1l.11-.05l.85-.38c.51-.19 1.29-.66 1.94-1.02c5.06-3.01 8.22-8.18 9.08-13.51c.42-2.65.28-5.36-.39-7.88z" fill="#3bb2de"/></svg>
                                {{$post->url}}
                            </a>
                        </h4>
                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded-full"><i>{{$post->created_at->diffForHumans()}} </i></span>
                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded-full"><i>Créer par {{$post->user->name}} </i></span>
                        
                            
                        <button class="modal-open px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded-full" data-toggle="modal" data-target="firstModal">
                            <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1.04em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1056 1024"><path d="M625 1024q-108 0-168.5-2t-93-8.5t-41-11T295 985q-15-12-54.5-19.5T109 952q-16-1-25-12q-2-3-8-13t-17-33.5T38.5 842T22 772t-7-85q0-146 49-224q10-15 28-15q84 0 184.5-102T450 69q2-3 6.5-14t5.5-14t5.5-11.5t8-11T485 11t12.5-6.5t16-3T535 0q18 0 37 8t35 21.5T633 60q19 31 22 89t-3.5 108t-17.5 96q178-1 242-1q59 0 95.5 32t37.5 84q1 44-9 67q17 17 28.5 35.5T1041 612q1 47-46 96q1 2 4 9.5t4.5 12.5t2.5 12.5t1 14.5q-2 55-64 98q5 33-1 59q-24 110-317 110zM126 887q164 13 208 46q16 12 28 16t72 7.5t191 3.5q41 0 74.5-2t77.5-7t71-18t32-33q4-21-19-45q-5-12 0-24.5t16-17.5h1q5-2 12-5t20.5-11t22.5-19.5t10-22.5q0-4-.5-7.5t-1-6.5t-2-6l-2.5-5l-2.5-4l-2.5-3.5l-2-2.5l-1.5-2l-.5-1q-4-5-5-11t0-12t4.5-11.5t8.5-9.5q6-3 13-8.5t17.5-20.5t10.5-30q-1-25-38-47q-6-4-10-9.5t-6-12.5q-1-4-.5-8.5t2-9t4.5-8.5q1-1 2-2.5t4-7.5t5-11.5t3.5-13.5t1.5-15q-1-18-9.5-30t-22-16.5T892 417t-16-1H642l-54 1q-4 0-8-1t-7.5-3t-6.5-4.5t-5-6.5q-9-13-3-30q16-46 25.5-101t9-105T578 93q-1-2-4-7t-4-7t-4.5-5.5t-7-5t-9.5-3t-14-1.5q-3 0-6 2t-9 9t-11 19q-77 186-186 296.5T112 511q-8 18-14 36t-12.5 57t-6.5 83q0 45 9 89.5t18.5 70T126 887z" fill="currentColor"/></svg>
                            <span>{{$post->like}} utilisateurs ont aimé cette news</span> 
                        </button>
                        @include('posts.modal.listuser', $likes)    
                            
                        <button id="buttonmodal" class="show-modal px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded-full" type="button">
                            <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><path fill="#F44336" d="M34 9c-4.2 0-7.9 2.1-10 5.4C21.9 11.1 18.2 9 14 9C7.4 9 2 14.4 2 21c0 11.9 22 24 22 24s22-12 22-24c0-6.6-5.4-12-12-12z"/><path fill="#37474F" d="M3.563 6.396L6.39 3.568l37.966 37.966l-2.828 2.828z"/></svg>
                            <span>{{$post->dislike}} utilisateurs ont détesté cette news</span> 
                        </button>  
                        @include('posts.modal.listuserdislike', $dislikes)
                        
                        <br>
                        <form method="POST" action="{{route('posts.comments.store', ['post' => $post])}} ">
                            @csrf
                            <br>
                            <p class="text-2xl">Commentaires</p>
                            <textarea class="w-full block mt-1" name="content" id="" rows="3"></textarea>
                            <button type="submit" class="w-full block mt-1 h-7 text-indigo-100 bg-indigo-700 rounded-full">
                                <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="currentColor" d="M496 496h-16a273.39 273.39 0 0 1-179.025-66.782l-16.827-14.584A291.407 291.407 0 0 1 256 416c-63.527 0-123.385-20.431-168.548-57.529C41.375 320.623 16 270.025 16 216S41.375 111.377 87.452 73.529C132.615 36.431 192.473 16 256 16s123.385 20.431 168.548 57.529C470.625 111.377 496 161.975 496 216a171.161 171.161 0 0 1-21.077 82.151a201.505 201.505 0 0 1-47.065 57.537a285.22 285.22 0 0 0 63.455 97l4.687 4.685zM294.456 381.222l27.477 23.814a241.379 241.379 0 0 0 135 57.86a317.5 317.5 0 0 1-62.617-105.583l-4.395-12.463l9.209-7.068C440.963 305.678 464 262.429 464 216c0-92.636-93.309-168-208-168S48 123.364 48 216s93.309 168 208 168a259.114 259.114 0 0 0 31.4-1.913z"/></svg>
                                <span>{{__('Ajouter un commentaire')}}</span>
                            </button>
                        </form>
                        <br>
                        @forelse ($post->comments as $comment)
                            <hr>
                            <div class="flex mb-4"><!-- src="https://pickaface.net/gallery/avatar/unr_random_180410_1905_z1exb.png" -->
                                <img src="{{$comment->user->image ? $comment->user->image->url() : 'http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg'}}" alt="lovely avatar" class="w-12 h-12 rounded-full" />
                                <div class="flex">
                                    <div class="ml-2 mt-0.5">
                                        <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">{{$comment->user->name}}</span>
                                        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="italic">{{ $comment->content }}.</p>
                        @empty
                            <p>{{__('Ecrire le premier commentaire ')}}</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="w-1/4"><!-- $commSession Status -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="text-2xl"><b>News le plus aimé</b></p>
                        <br>
                        <!--if (isset($mostComments))
                            <p class="italic underline"><a href="{route('posts.show',['post' => $mostComments])}}">{$mostComments->title}}</a>  </p>
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded-full"><i>Avec {count($mostComments->comments)}} commentaire</i></span>
                        else
                            <p>vide</p>
                        endif-->
                        @if (isset($mostPostliked))
                            <p class="italic underline"><a href="{{route('posts.show',['post' => $mostPostliked])}}">{{$mostPostliked->title}}</a></p>
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded-full"><i>Avec {{$mostPostliked->like}} j'aime</i></span>
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded-full"><i>Avec {{count($mostPostliked->comments)}} commentaire</i></span>
                        @else
                            <p>vide</p>
                        @endif
                            
                    </div>
                </div>
                <br>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="text-2xl"><b>News le plus détesté</b></p>
                        <br>
                        @if (isset($mostPostdisliked))
                            <p class="italic underline"><a href="{{route('posts.show',['post' => $mostPostdisliked])}}">{{$mostPostdisliked->title}}</a></p>
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded-full"><i>Avec {{$mostPostdisliked->dislike}} déteste</i></span>
                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded-full"><i>Avec {{count($mostPostdisliked->comments)}} commentaire</i></span>
                        @else
                            <p>vide</p>
                        @endif   
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</x-app-layout>