<header class="bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <div class="text-2xl font-bold">Eliptic Airlines</div>
        <nav class="space-x-8">
            <a href="{{route('home')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:bg-black hover:text-white dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-500 bg m-4">Home</a>
            <a href="{{route('flightsIndex')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:bg-black hover:text-white dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-500 bg m-4">Flights</a>
            @auth
                @if (Auth::user()->isAdmin == 1)
                <a href="{{route('airplanesIndex')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:bg-black hover:text-white dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-500 bg m-4">Airplanes</a>
                {{-- <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:bg-black hover:text-white dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-500 bg m-4">Reservations</a> --}}
                @endif  
            @endauth
            <a href="{{route('contact')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:bg-black hover:text-white dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-500 bg m-4">Contact</a>
        </nav>
        <div class="flex items-center space-x-4">
            @if (Auth::user())
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-gray-400 bg-blue-400 dark:bg-gray-800 hover:bg-black dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-500 bg m-4" type="button">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-gray-400 bg-blue-400 dark:bg-gray-800 hover:bg-black dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-500 bg" type="submit">
                                Log Out
                            </button>
                        </form>
            </div>
            @else
                <a href="{{ route('login')}}"><button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-black transition duration-500 font-bold">Log In</button></a>
                <a href="{{ route('register')}}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-black transition duration-500 font-bold">Register</a>
            @endif
            
        </div>
    </div>
</header>