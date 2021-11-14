<x-app-layout>
    <x-slot name="header">   
        <h2 class="inline-flex font-semibold text-xl text-gray-800 leading-tight mr-6">
        {{ __('Votre Profile') }}
        </h2>
        <button id="openModal" class="openModal text-white px-4 w-auto h-7 bg-red-600 rounded-full hover:bg-red-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none float-right">
            <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-4 h-4 inline-block mr-1">
                <path fill="#FFFFFF" d="M17.561,2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984,7.264L2.21,14.037L1.2,18.799l4.763-1.01 l6.774-6.771l6.052-6.052C18.788,4.966,19.005,3.883,17.561,2.439z M5.68,17.217l-1.624,0.35c-0.156-0.293-0.345-0.586-0.69-0.932 c-0.346-0.346-0.639-0.533-0.932-0.691l0.35-1.623l0.47-0.469c0,0,0.883,0.018,1.881,1.016c0.997,0.996,1.016,1.881,1.016,1.881 L5.68,17.217z"/>
            </svg>
            <span>{{__('Créer News')}}</span>
        </button>
    </x-slot>
    <!-- Session Status 'enctype' => 'multipart/form-data'] toDateTimeString()-->
    <x-auth-session-status class="mb-4" :status="session('status')" /><!-- Validation Errors <x-auth-validation-errors class="mb-4" :errors="$errors" />-->
    @include('posts.modal.create')
    <div class="py-10">
        <div class="inline-flex w-screen space-x-12">
            <div class="w-1/4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="px-11">
                            <div class="item-center justify-center">
                                <img class="h-64 w-64 border border-indigo-100 shadow-lg rounded-full" src="{{$user->image ? $user->image->url() : 'http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg'}}">
                                    @if(Auth()->user()->id == $user->id)
                                        <form method="POST" action="{{ route('user.updateAvatar', ['user' => $user]) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="file" name="avatar" class="">
                                            <div class="text-center">
                                                <button type="submit" class="text-white px-4 w-auto h-7 bg-green-600 rounded-full hover:bg-green-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                                                    <span>{{ __('Modifier') }}</span>
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                            </div>
                        </div>    
                        <div class="pt-2 border-t mt-5 w-full text-center text-xl text-gray-600">
                            <!--?php setlocale(LC_TIME, 'fr_FR'); ? $user->created_at->toDayDateTimeString() Carbon::parse($post->date)->toDateTimeString()-->
                            {{$user->name}} <br>Profile Créer dans {{$user->created_at->toDateString()}} <br> {{$user->posts->count()}} News créer
                        </div><br>
                        <div class=" flex flex-col hover:cursor-pointer">
                            @if(Auth()->user()->id == $user->id || Auth()->user()->is_admin == 1)
                                <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 text-xl text-left text-gray-600 font-semibold" href="{{route('users.edit', ['user' => $user])}} "><svg class="inline-block float-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M27 16.76V16v-.77l1.92-1.68A2 2 0 0 0 29.3 11l-2.36-4a2 2 0 0 0-1.73-1a2 2 0 0 0-.64.1l-2.43.82a11.35 11.35 0 0 0-1.31-.75l-.51-2.52a2 2 0 0 0-2-1.61h-4.68a2 2 0 0 0-2 1.61l-.51 2.52a11.48 11.48 0 0 0-1.32.75l-2.38-.86A2 2 0 0 0 6.79 6a2 2 0 0 0-1.73 1L2.7 11a2 2 0 0 0 .41 2.51L5 15.24v1.53l-1.89 1.68A2 2 0 0 0 2.7 21l2.36 4a2 2 0 0 0 1.73 1a2 2 0 0 0 .64-.1l2.43-.82a11.35 11.35 0 0 0 1.31.75l.51 2.52a2 2 0 0 0 2 1.61h4.72a2 2 0 0 0 2-1.61l.51-2.52a11.48 11.48 0 0 0 1.32-.75l2.42.82a2 2 0 0 0 .64.1a2 2 0 0 0 1.73-1l2.28-4a2 2 0 0 0-.41-2.51zM25.21 24l-3.43-1.16a8.86 8.86 0 0 1-2.71 1.57L18.36 28h-4.72l-.71-3.55a9.36 9.36 0 0 1-2.7-1.57L6.79 24l-2.36-4l2.72-2.4a8.9 8.9 0 0 1 0-3.13L4.43 12l2.36-4l3.43 1.16a8.86 8.86 0 0 1 2.71-1.57L13.64 4h4.72l.71 3.55a9.36 9.36 0 0 1 2.7 1.57L25.21 8l2.36 4l-2.72 2.4a8.9 8.9 0 0 1 0 3.13L27.57 20z" fill="currentColor"/><path d="M16 22a6 6 0 1 1 6-6a5.94 5.94 0 0 1-6 6zm0-10a3.91 3.91 0 0 0-4 4a3.91 3.91 0 0 0 4 4a3.91 3.91 0 0 0 4-4a3.91 3.91 0 0 0-4-4z" fill="currentColor"/></svg><span>Modifier Votre Profile</span></a>
                            @endif
                            <a class="hover:bg-gray-300 bg-gray-200 border-t-2 p-3 text-xl text-left text-gray-600 font-semibold" href="">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <svg class="inline-block float-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M117 544h554q14 0 23-9.5t9-23t-9-22.5t-23-9H119l116-116q9-9 9-22.5t-9-22.5q-7-6-15-8.5t-16.5 0T189 319L0 513l189 194q5 4 11 6.5t12 2.5q13 0 23-9q3-3 5-7t3-8t1-8t-1-8t-3-8t-5-7zM960 0H416q-27 0-45.5 18.5T352 64v288h64V103q0-10 5-19t14-14.5t20-5.5h465q16 0 27 11.5t11 27.5l1 818q0 16-11 27.5T921 960H455q-16 0-27.5-11.5T416 921V671h-64v289q0 27 18.5 45.5T416 1024h544q6 0 12.5-1.5t12-3.5t11-5.5t9.5-8t7.5-9.5t6-11t4-12t1.5-13V64q0-39-35-57q-14-7-29-7z" fill="currentColor"/></svg>
                                    <button href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        
                                        <span>{{ __('Log Out') }}</span>
                                    </button>
                                </form>
                            </a>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="w-3/5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-800">
                        <p class="italic text-center text-3xl">Votre News</p>
                        <br>
                        @forelse ($posts as $post)
                        <div class="px-48">
                            <div class="w-max p-6 item-center justify-center bg-white border border-gray-600 rounded">
                                <div class="flex mb-4"> <!-- src="https://pickaface.net/gallery/avatar/unr_random_180410_1905_z1exb.png" -->
                                    <img src="{{$user->image ? $user->image->url() : 'http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg'}}" alt="lovely avatar" class="w-12 h-12 rounded-full" />
                                    <div class="inline-flex space-x-10">
                                        <div class="ml-2 mt-0.5 xl:mr-20">
                                            <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">{{$post->user->name}}</span>
                                            <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                        <button class="mr-10 flex right-40 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                            <div class="ml-1">
                                            </div>
                                        </button>
                                        <span class="float-right mr-3"> 
                                        </span>
                                        <span class="float-right mr-3"> 
                                        </span>
                                        <span class="float-right mr-3">
                                            
                                        </span>
                                        <div class="hidden right-0 sm:flex sm:ml-6 mr-10">
                                            @can('update', $post)
                                                <x-dropdown align="right" width="48">
                                                    <x-slot name="trigger">
                                                        <button class="flex right-40 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                            <span class="text-sm"> </span>
                                                            <div class="ml-1">
                                                                <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path class="clr-i-outline clr-i-outline-path-1" d="M18.1 11c-3.9 0-7 3.1-7 7s3.1 7 7 7s7-3.1 7-7s-3.1-7-7-7zm0 12c-2.8 0-5-2.2-5-5s2.2-5 5-5s5 2.2 5 5s-2.2 5-5 5z" fill="currentColor"/><path class="clr-i-outline clr-i-outline-path-2" d="M32.8 14.7l-2.8-.9l-.6-1.5l1.4-2.6c.3-.6.2-1.4-.3-1.9l-2.4-2.4c-.5-.5-1.3-.6-1.9-.3l-2.6 1.4l-1.5-.6l-.9-2.8C21 2.5 20.4 2 19.7 2h-3.4c-.7 0-1.3.5-1.4 1.2L14 6c-.6.1-1.1.3-1.6.6L9.8 5.2c-.6-.3-1.4-.2-1.9.3L5.5 7.9c-.5.5-.6 1.3-.3 1.9l1.3 2.5c-.2.5-.4 1.1-.6 1.6l-2.8.9c-.6.2-1.1.8-1.1 1.5v3.4c0 .7.5 1.3 1.2 1.5l2.8.9l.6 1.5l-1.4 2.6c-.3.6-.2 1.4.3 1.9l2.4 2.4c.5.5 1.3.6 1.9.3l2.6-1.4l1.5.6l.9 2.9c.2.6.8 1.1 1.5 1.1h3.4c.7 0 1.3-.5 1.5-1.1l.9-2.9l1.5-.6l2.6 1.4c.6.3 1.4.2 1.9-.3l2.4-2.4c.5-.5.6-1.3.3-1.9l-1.4-2.6l.6-1.5l2.9-.9c.6-.2 1.1-.8 1.1-1.5v-3.4c0-.7-.5-1.4-1.2-1.6zm-.8 4.7l-3.6 1.1l-.1.5l-.9 2.1l-.3.5l1.8 3.3l-2 2l-3.3-1.8l-.5.3c-.7.4-1.4.7-2.1.9l-.5.1l-1.1 3.6h-2.8l-1.1-3.6l-.5-.1l-2.1-.9l-.5-.3l-3.3 1.8l-2-2l1.8-3.3l-.3-.5c-.4-.7-.7-1.4-.9-2.1l-.1-.5L4 19.4v-2.8l3.4-1l.2-.5c.2-.8.5-1.5.9-2.2l.3-.5l-1.7-3.3l2-2l3.2 1.8l.5-.3c.7-.4 1.4-.7 2.2-.9l.5-.2L16.6 4h2.8l1.1 3.5l.5.2c.7.2 1.4.5 2.1.9l.5.3l3.3-1.8l2 2l-1.8 3.3l.3.5c.4.7.7 1.4.9 2.1l.1.5l3.6 1.1v2.8z" fill="currentColor"/></svg>
                                                            </div>
                                                        </button>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <!-- Authentication </a><a href="{ route('posts.edit',['post' => $post]) }}">-->
                                                        
                                                            <x-dropdown-link :href="route('posts.edit',['post' => $post])">
                                                                <button>
                                                                    <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path d="M17.561 2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984 7.264L2.21 14.037L1.2 18.799l4.763-1.01l6.774-6.771l6.052-6.052c-.001 0 .216-1.083-1.228-2.527zM5.68 17.217l-1.624.35a3.71 3.71 0 0 0-.69-.932a3.742 3.742 0 0 0-.932-.691l.35-1.623l.47-.469s.883.018 1.881 1.016c.997.996 1.016 1.881 1.016 1.881l-.471.468z" fill="currentColor"/></svg>
                                                                    <span>{{ __('Modifier') }}</span>
                                                                </button>
                                                            </x-dropdown-link>
                                                            <x-dropdown-link>
                                                                <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit">
                                                                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 28 28"><g fill="none"><path d="M14 2.25a3.75 3.75 0 0 1 3.745 3.55l.005.2h5.5a.75.75 0 0 1 .102 1.493l-.102.007h-1.059l-1.22 15.053A3.75 3.75 0 0 1 17.233 26h-6.466a3.75 3.75 0 0 1-3.738-3.447L5.808 7.5H4.75a.75.75 0 0 1-.743-.648L4 6.75a.75.75 0 0 1 .648-.743L4.75 6h5.5A3.75 3.75 0 0 1 14 2.25zm6.687 5.25H7.313l1.211 14.932a2.25 2.25 0 0 0 2.243 2.068h6.466a2.25 2.25 0 0 0 2.243-2.068L20.686 7.5zm-8.937 3.75a.75.75 0 0 1 .743.648L12.5 12v8a.75.75 0 0 1-1.493.102L11 20v-8a.75.75 0 0 1 .75-.75zm4.5 0a.75.75 0 0 1 .743.648L17 12v8a.75.75 0 0 1-1.493.102L15.5 20v-8a.75.75 0 0 1 .75-.75zM14 3.75a2.25 2.25 0 0 0-2.245 2.096L11.75 6h4.5l-.005-.154A2.25 2.25 0 0 0 14 3.75z" fill="currentColor"/></g></svg>
                                                                        <span>{{ __('Supprimer') }}</span>
                                                                    </button>
                                                                </form>
                                                            </x-dropdown-link>                                   
                                                    </x-slot>
                                                </x-dropdown>
                                            @endcan
                                            
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal w-96">{{$post->title}}.</p>
                                <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal w-96">{{$post->content}}.</p>
                                <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal w-96"><a href="{{$post->url}}">{{$post->url}}</a>.</p>
                                <hr>
                                <div class="flex justify-between items-center mt-5">
                                    <div class="flex ">
                                        @if ( $post->isAuthUserLikedPost() )
                                        <form method="POST" action="{{route('post.like', ['post' => $post])}} " id="like-form-{{$post->id}}">
                                            @csrf
                                            @method("GET")
                                            <input type="hidden" name="id" value="{{$post->id}}">
                                                <button type="submit">
                                                    <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><path fill="#F44336" d="M34 9c-4.2 0-7.9 2.1-10 5.4C21.9 11.1 18.2 9 14 9C7.4 9 2 14.4 2 21c0 11.9 22 24 22 24s22-12 22-24c0-6.6-5.4-12-12-12z"/></svg>
                                                    <span class="ml-1 text-gray-500 dark:text-gray-400  font-light">{{$post->like}}</span>
                                                </button>
                                            </form> 
                                        @else
                                            @if ($post->isAuthUserDisLikedPost())
                                                <div>
                                                    <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1.04em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1056 1024"><path d="M625 1024q-108 0-168.5-2t-93-8.5t-41-11T295 985q-15-12-54.5-19.5T109 952q-16-1-25-12q-2-3-8-13t-17-33.5T38.5 842T22 772t-7-85q0-146 49-224q10-15 28-15q84 0 184.5-102T450 69q2-3 6.5-14t5.5-14t5.5-11.5t8-11T485 11t12.5-6.5t16-3T535 0q18 0 37 8t35 21.5T633 60q19 31 22 89t-3.5 108t-17.5 96q178-1 242-1q59 0 95.5 32t37.5 84q1 44-9 67q17 17 28.5 35.5T1041 612q1 47-46 96q1 2 4 9.5t4.5 12.5t2.5 12.5t1 14.5q-2 55-64 98q5 33-1 59q-24 110-317 110zM126 887q164 13 208 46q16 12 28 16t72 7.5t191 3.5q41 0 74.5-2t77.5-7t71-18t32-33q4-21-19-45q-5-12 0-24.5t16-17.5h1q5-2 12-5t20.5-11t22.5-19.5t10-22.5q0-4-.5-7.5t-1-6.5t-2-6l-2.5-5l-2.5-4l-2.5-3.5l-2-2.5l-1.5-2l-.5-1q-4-5-5-11t0-12t4.5-11.5t8.5-9.5q6-3 13-8.5t17.5-20.5t10.5-30q-1-25-38-47q-6-4-10-9.5t-6-12.5q-1-4-.5-8.5t2-9t4.5-8.5q1-1 2-2.5t4-7.5t5-11.5t3.5-13.5t1.5-15q-1-18-9.5-30t-22-16.5T892 417t-16-1H642l-54 1q-4 0-8-1t-7.5-3t-6.5-4.5t-5-6.5q-9-13-3-30q16-46 25.5-101t9-105T578 93q-1-2-4-7t-4-7t-4.5-5.5t-7-5t-9.5-3t-14-1.5q-3 0-6 2t-9 9t-11 19q-77 186-186 296.5T112 511q-8 18-14 36t-12.5 57t-6.5 83q0 45 9 89.5t18.5 70T126 887z" fill="currentColor"/></svg>
                                                    <span class="ml-1 text-gray-500 dark:text-gray-400  font-light">{{$post->like}}</span>
                                                </div>
                                            @else
                                                <form method="POST" action="{{route('post.like', ['post' => $post])}} " id="like-form-{{$post->id}}">
                                                    @csrf
                                                    @method("GET")
                                                    <input type="hidden" name="id" value="{{$post->id}}">
                                                    <button type="submit">
                                                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1.04em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1056 1024"><path d="M625 1024q-108 0-168.5-2t-93-8.5t-41-11T295 985q-15-12-54.5-19.5T109 952q-16-1-25-12q-2-3-8-13t-17-33.5T38.5 842T22 772t-7-85q0-146 49-224q10-15 28-15q84 0 184.5-102T450 69q2-3 6.5-14t5.5-14t5.5-11.5t8-11T485 11t12.5-6.5t16-3T535 0q18 0 37 8t35 21.5T633 60q19 31 22 89t-3.5 108t-17.5 96q178-1 242-1q59 0 95.5 32t37.5 84q1 44-9 67q17 17 28.5 35.5T1041 612q1 47-46 96q1 2 4 9.5t4.5 12.5t2.5 12.5t1 14.5q-2 55-64 98q5 33-1 59q-24 110-317 110zM126 887q164 13 208 46q16 12 28 16t72 7.5t191 3.5q41 0 74.5-2t77.5-7t71-18t32-33q4-21-19-45q-5-12 0-24.5t16-17.5h1q5-2 12-5t20.5-11t22.5-19.5t10-22.5q0-4-.5-7.5t-1-6.5t-2-6l-2.5-5l-2.5-4l-2.5-3.5l-2-2.5l-1.5-2l-.5-1q-4-5-5-11t0-12t4.5-11.5t8.5-9.5q6-3 13-8.5t17.5-20.5t10.5-30q-1-25-38-47q-6-4-10-9.5t-6-12.5q-1-4-.5-8.5t2-9t4.5-8.5q1-1 2-2.5t4-7.5t5-11.5t3.5-13.5t1.5-15q-1-18-9.5-30t-22-16.5T892 417t-16-1H642l-54 1q-4 0-8-1t-7.5-3t-6.5-4.5t-5-6.5q-9-13-3-30q16-46 25.5-101t9-105T578 93q-1-2-4-7t-4-7t-4.5-5.5t-7-5t-9.5-3t-14-1.5q-3 0-6 2t-9 9t-11 19q-77 186-186 296.5T112 511q-8 18-14 36t-12.5 57t-6.5 83q0 45 9 89.5t18.5 70T126 887z" fill="currentColor"/></svg>
                                                        <span class="ml-1 text-gray-500 dark:text-gray-400  font-light">{{$post->like}}</span>
                                                    </button>
                                                </form> 
                                            @endif
                                            
                                        @endif
                                        
                                        
                                    </div>
                                    
                                    <div class="ml-1 text-gray-500 dark:text-gray-400 font-light">
                                        @if(count($post->comments) > 0)
                                            {{count($post->comments)}} <a href="{{route('posts.show',['post' => $post])}} ">{{ __('commentaires') }}</a>
                                        @else
                                            <p class="italic"><a href="{{route('posts.show',['post' => $post])}} ">{{ __('aucun commentaire') }}</a></p>
                                        @endif
                                        
                                    </div>
                                    @if ( $post->isAuthUserLikedPost() )
                                        <div>
                                            <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path fill="currentColor" fill-opacity=".89" fill-rule="evenodd" d="M15.807.939c.396.367.655 1.133.706 1.595c.59.366 1.288 1.104 1.349 2.494c1.053.731 1.853 2.083.854 4.06c.58.54 1.227 2.188.395 3.516c-.969 1.552-3.075 1.66-5.174 1.383c.56 1.565.77 3.009-.116 4.488C12.94 19.787 11.724 20 11.308 20c-1.138 0-1.918-.979-2.234-2.283c-.115-.364-.246-1.224-.297-1.45c-.265-1.44-1.156-2.592-2.67-3.453a11.392 11.392 0 0 0-2.123-.946h-2.34c-.521 0-1.144-.527-1.144-1.165V3.067c.074-.722.475-1.082 1.202-1.082h3.11c1.364-.31 2.724-.642 4.079-.995C10.2.637 10.487.52 11.403.268c2.053-.532 3.478-.24 4.404.67zm-2.382.424c-.819 0-1.856.252-2.316.399c-.162.051-.446.135-.745.221l-.3.087l-.288.082l-.56.158s-1.41.378-4.173 1.02c-.103.012-.158.02-.166.022v7.38c1.511.582 2.688 1.288 3.53 2.118c1.264 1.244 1.615 2.368 1.822 3.807c.118.723.309 1.306.597 1.705a.65.65 0 0 0 .342.251c.147.047.35.05.783-.184c.433-.236.99-.853 1.095-1.772c.07-.893-.17-1.667-.492-2.481a15.705 15.705 0 0 0-.357-.822c-.218-.413.11-1.099.786-.95c.906.255 3.154.6 4.422 0c.737-.427.92-1.116.547-2.066a1.74 1.74 0 0 0-.495-.553c-.17-.102-.502-.544-.103-1.045c.396-.635.975-1.928-.49-2.734a.656.656 0 0 1-.34-.57c-.02-.274.024-1.29-.73-1.744c-.18-.097-.397-.177-.52-.41c-.078-.154-.103-.528-.103-.528c-.103-.632-.245-1.222-1.746-1.391zM3.519 3.348H1.861v7.157h1.658V3.348z"/></svg>
                                            <span class="ml-1 text-gray-500 dark:text-gray-400  font-light">{{$post->dislike}}</span>
                                        </div>
                                        <!--</button><button type="submit">-->
                                    @else
                                        @if ($post->isAuthUserDisLikedPost())
                                            <form method="POST" action="{{route('post.dislike', ['post' => $post])}} " id="dislike-form-{{$post->id}}">
                                                @csrf
                                                @method("GET")
                                                <input type="hidden" name="id" value="{{$post->id}}">
                                                <button type="submit">
                                                    <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><path fill="#F44336" d="M34 9c-4.2 0-7.9 2.1-10 5.4C21.9 11.1 18.2 9 14 9C7.4 9 2 14.4 2 21c0 11.9 22 24 22 24s22-12 22-24c0-6.6-5.4-12-12-12z"/><path fill="#37474F" d="M3.563 6.396L6.39 3.568l37.966 37.966l-2.828 2.828z"/></svg>
                                                    <span class="ml-1 text-gray-500 dark:text-gray-400  font-light">{{$post->dislike}}</span>
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{route('post.dislike', ['post' => $post])}} " id="dislike-form-{{$post->id}}">
                                                @csrf
                                                @method("GET")
                                                <input type="hidden" name="id" value="{{$post->id}}">
                                                <button type="submit">
                                                    <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path fill="currentColor" fill-opacity=".89" fill-rule="evenodd" d="M15.807.939c.396.367.655 1.133.706 1.595c.59.366 1.288 1.104 1.349 2.494c1.053.731 1.853 2.083.854 4.06c.58.54 1.227 2.188.395 3.516c-.969 1.552-3.075 1.66-5.174 1.383c.56 1.565.77 3.009-.116 4.488C12.94 19.787 11.724 20 11.308 20c-1.138 0-1.918-.979-2.234-2.283c-.115-.364-.246-1.224-.297-1.45c-.265-1.44-1.156-2.592-2.67-3.453a11.392 11.392 0 0 0-2.123-.946h-2.34c-.521 0-1.144-.527-1.144-1.165V3.067c.074-.722.475-1.082 1.202-1.082h3.11c1.364-.31 2.724-.642 4.079-.995C10.2.637 10.487.52 11.403.268c2.053-.532 3.478-.24 4.404.67zm-2.382.424c-.819 0-1.856.252-2.316.399c-.162.051-.446.135-.745.221l-.3.087l-.288.082l-.56.158s-1.41.378-4.173 1.02c-.103.012-.158.02-.166.022v7.38c1.511.582 2.688 1.288 3.53 2.118c1.264 1.244 1.615 2.368 1.822 3.807c.118.723.309 1.306.597 1.705a.65.65 0 0 0 .342.251c.147.047.35.05.783-.184c.433-.236.99-.853 1.095-1.772c.07-.893-.17-1.667-.492-2.481a15.705 15.705 0 0 0-.357-.822c-.218-.413.11-1.099.786-.95c.906.255 3.154.6 4.422 0c.737-.427.92-1.116.547-2.066a1.74 1.74 0 0 0-.495-.553c-.17-.102-.502-.544-.103-1.045c.396-.635.975-1.928-.49-2.734a.656.656 0 0 1-.34-.57c-.02-.274.024-1.29-.73-1.744c-.18-.097-.397-.177-.52-.41c-.078-.154-.103-.528-.103-.528c-.103-.632-.245-1.222-1.746-1.391zM3.519 3.348H1.861v7.157h1.658V3.348z"/></svg>
                                                    <span class="ml-1 text-gray-500 dark:text-gray-400  font-light">{{$post->dislike}}</span>
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        @empty
                            <p>vide</p>
                        @endforelse
                          <br>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>