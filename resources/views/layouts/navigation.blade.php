<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 27" class="h-7 w-7 -mt-2 flex-shrink-0"><path d="M22.487.658s5.03 13.072-1.822 22.171C16.476 28.39 9.84 27.26 5.484 25.68c1.513-3.391 3.441-6.067 5.784-8.03 1.176.623 3.186.792 6.03.51-2.535-.221-4.284-.654-5.246-1.3l.125.08c2.122-1.546 4.556-2.556 7.303-3.029-3.16-.285-6.026.315-8.598 1.804-.577-.742-1.157-1.748-1.74-3.018.07 1.534.339 2.734.809 3.6-2.64 1.797-4.953 4.58-6.94 8.351a7.583 7.583 0 01-.188-.088c-.802-.358-1.328-1.037-1.755-2.036C-1.9 13.366 4.645 8.273 11.123 7.989 23.046 7.465 22.487.658 22.487.658z" fill="#0ED3CF"></path></svg>
                        <!-- <x-application-logo class="block h-10 w-auto fill-current text-gray-600" /> -->
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        {{ __('Page Accueil') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <svg class="inline-block w-5 h-5 float-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M117 544h554q14 0 23-9.5t9-23t-9-22.5t-23-9H119l116-116q9-9 9-22.5t-9-22.5q-7-6-15-8.5t-16.5 0T189 319L0 513l189 194q5 4 11 6.5t12 2.5q13 0 23-9q3-3 5-7t3-8t1-8t-1-8t-3-8t-5-7zM960 0H416q-27 0-45.5 18.5T352 64v288h64V103q0-10 5-19t14-14.5t20-5.5h465q16 0 27 11.5t11 27.5l1 818q0 16-11 27.5T921 960H455q-16 0-27.5-11.5T416 921V671h-64v289q0 27 18.5 45.5T416 1024h544q6 0 12.5-1.5t12-3.5t11-5.5t9.5-8t7.5-9.5t6-11t4-12t1.5-13V64q0-39-35-57q-14-7-29-7z" fill="currentColor"/></svg>
                                <span>{{ __('Log Out') }}</span>
                            </x-dropdown-link>
                        </form>
                        <x-dropdown-link :href="route('users.show', ['user' => Auth::user()])">
                            <svg class="w-7 h-7 inline-block float-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" style="vertical-align: -0.125em;" width="0.96em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1408 1472"><path d="M704 768q-5 3-55.5 25T590 821q38 57 73 98q-9 20-26 93t-36.5 168t-20.5 99q-1-3-21-8t-42.5-18.5T487 1215q-16-54-27-162t-17-192.5t-13-93.5q-7 3-31.5 16T348 806q-30 11-82 30t-82 30.5t-66.5 27.5t-59 32.5T24 960q-24 64-24 512h1408q0-112-5.5-292T1384 960q-12-17-34.5-33.5t-59-32.5t-66.5-27.5t-82-30.5t-82-30q-26-10-50.5-23T978 767q-7 9-11.5 93.5t-14 192.5t-25.5 162q-7 24-29.5 37.5T855 1271t-21 8q-62-303-89-360q35-41 73-98q-8-6-58.5-28T704 768zm0-704q133 0 226.5 93.5T1024 384t-93.5 226.5T704 704t-226.5-93.5T384 384t93.5-226.5T704 64zm272 322q-39 8-111.5-7.5T742 342q-34-15-65-34.5t-71-49t-62-43.5q16 119-112 170q1 113 80.5 192T704 656t191.5-79T976 386z" fill="currentColor"/></svg>
                            <span>{{ __('Profile') }}</span>
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
