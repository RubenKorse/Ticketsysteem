<html>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
        <script src="https://kit.fontawesome.com/8603ec5cfb.js" crossorigin="anonymous"></script>


        <title>Ruben Ticktsystem</title>
    </head>
    <body class="bg-gray-600">
        <header class="flex h-28 items-center bg-gray-800 text-gray-300 text-xl">
            <a class="text-3xl m-5 font-bold hover:text-white transition duration-300" href="/">Ticktsystem</a>
            <nav class="flex w-2/5 justify-center gap-10">
                <a class="hover:text-white" href="{{ route('sports') }}">Sports</a>
                <a class="hover:text-white" href="{{ route('festivals') }}">Festivals</a>
                <a class="hover:text-white" href="{{ route('films') }}">Films</a>
            </nav>
            @if (Route::has('login'))
                <div class="flex w-3/5 m-5 gap-5 justify-end">
                    @auth
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                                <div @click="open = !open">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-white dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 text-xl">
                                    @if(auth()->user()->admin)
                                            <div class="mr-2 text-green-500"><a href="/admin">Admin</a></div> |
                                        @endif
                                    <div class="ml-2">{{ auth()->user()->name }}</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </button>
                                </div>

                                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0" @click="open = false" style="display: none;">
                                    <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-gray-700">
                                        <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out" href="http://127.0.0.1:8000/profile">Acount</a>
                                        <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out" href="/Reservations">Reservations</a>

                                        <!-- Authentication -->
                                        <form method="POST" action="http://127.0.0.1:8000/logout">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">
                                            <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out" href="http://127.0.0.1:8000/logout" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div>
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition duration-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> |
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-300 hover:text-white transition duration-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        </div>
                    @endauth
                </div>
            @endif


        </header>


        <main class="">
            {{ $slot }}
        </main>

        <footer class="bg-gray-800 text-gray-300 py-4 bottom-0 w-full h-50 flex justify-center items-center">
            <div class="container mx-auto flex justify-between items-center w-full">
                <div class="text-left">
                    <div class="text-xl font-bold mb-2">
                        Ticketsysteem
                    </div>
                    <p>Contact:</p>
                    <p>Email: <a href="mailto:ticketsysteem@gmail.com" class="text-white">ticketsysteem@gmail.com</a></p>
                    <p>Telefoon: 123-456-7890</p>
                    <p>Adres: Kerkstraat 1, 1234 AB Amsterdam</p>
                </div>
                <div class="text-center">
                    <p>© Ruben Korse {{ date('Y') }}</p>
                </div>
            </div>
        </footer>


    </body>
</html>

