<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <!-- Create By Joker Banny -->
        <header class="min-h-screen bg-gray-900 pb-32">
            <!-- Navbar -->
            <nav class="py-5 flex justify-between border-b border-opacity-20 px-6">
                <div class="flex items-center space-x-12">
                    <div class="flex space-x-2 text-2xl items-center">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 27" class="h-7 w-7 -mt-2 flex-shrink-0"><path d="M22.487.658s5.03 13.072-1.822 22.171C16.476 28.39 9.84 27.26 5.484 25.68c1.513-3.391 3.441-6.067 5.784-8.03 1.176.623 3.186.792 6.03.51-2.535-.221-4.284-.654-5.246-1.3l.125.08c2.122-1.546 4.556-2.556 7.303-3.029-3.16-.285-6.026.315-8.598 1.804-.577-.742-1.157-1.748-1.74-3.018.07 1.534.339 2.734.809 3.6-2.64 1.797-4.953 4.58-6.94 8.351a7.583 7.583 0 01-.188-.088c-.802-.358-1.328-1.037-1.755-2.036C-1.9 13.366 4.645 8.273 11.123 7.989 23.046 7.465 22.487.658 22.487.658z" fill="#0ED3CF"></path></svg>
                    
                    </div>
                    
                </div>
            
                <div class="hidden lg:flex items-center space-x-12 cursor-pointer">
                    @auth
                        <div class="hidden lg:block">
                            <ul class="flex items-center space-x-6"><a style="color: #0ED3CF;" href="{{ url('/dashboard') }}" class="font-bold">Dashboard</a></ul>
                        </div>
                    @else
                        <div class="hidden lg:block">
                            <ul class="flex items-center space-x-6"><a style="color: #0ED3CF;" href="{{ route('login') }}" class="font-bold"> Login</a></ul></h1>
                        </div>
                        <div class="hidden lg:block">
                            <ul class="flex items-center space-x-6"><a style="color: #0ED3CF;" href="{{ route('register') }}" class="font-bold">Register</a></ul></h1>
                        </div>
                    @endauth
                </div>
                    <div class="space-y-1.5 cursor-pointer lg:hidden">
                    <div class="h-1 w-8 bg-white opacity-25 rounded"></div>
                    <div class="h-1 w-8 bg-white opacity-25 rounded"></div>
                    <div class="h-1 w-8 bg-white opacity-25 rounded"></div>
                </div>
            </nav>
        
            <!-- Section Hero -->
            <div class="lg:flex pr-6 items-center lg:text-left w-full justify-between mt-12 text-center">
            <div class="pl-6">
                <h1 class="text-white text-4xl"><span class="font-bold">Partager des news</span> avec d'autres personnes <br>  inscrivez-vous sur <span style="color: #0ED3CF;">NewsTime</span> </h1>
                <p class="text-white text-lg mt-4">Partager vos idées, vos nouveautés et vos informations <br></p>
                    <!--bootstrap your new apps, projects or landing sites!</p> -->
                    <!--<h1 class="text-white text-4xl">A <span class="font-bold">free repository</span> for community <br>  components using br <span style="color: #0ED3CF;">TailwindCSS</span> </h1>
                    <p class="text-white text-lg mt-4">Open source Tailwind UI components and templates to <br>
                        bootstrap your new apps, projects or landing sites!</p> -->
                    
            </div>
        
            <div class="mt-8 lg:mt-0">
            <img class="w-full h-96 mr-96" src="https://tailwindcomponents.com/svg/website-designer-bro.svg" alt="">
            </div>
            </div>
        </header>
    </body>
</html>