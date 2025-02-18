<header class="shadow-md azulMedianoche">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <div class="text-2xl font-bold text-white">Eliptic Airlines</div>
        <nav class="space-x-8">
            <a href="{{route('home')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md focus:outline-none transition ease-in-out duration-500 bg m-4 nav-link">Home</a>
            <a href="{{route('flightsIndex')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md focus:outline-none transition ease-in-out duration-500 bg m-4 nav-link">Flights</a>
            @auth
                @if (Auth::user()->isAdmin == 1)
                <a href="{{route('airplanesIndex')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md focus:outline-none transition ease-in-out duration-500 bg m-4 nav-link">Airplanes</a>
                {{-- <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md focus:outline-none transition ease-in-out duration-500 bg m-4 nav-link">Reservations</a> --}}
                @endif  
            @endauth
            <a href="{{route('contact')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 rounded-md focus:outline-none transition ease-in-out duration-500 bg m-4 nav-link">Contact</a>
        </nav>
        <div class="flex items-center space-x-4">
            @if (Auth::user())
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-gray-400 dark:bg-gray-800 focus:outline-none transition ease-in-out duration-500 bg m-4 nav-button" type="button">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-gray-400 dark:bg-gray-800 focus:outline-none transition ease-in-out duration-500 bg nav-button" type="submit">
                                Log Out
                            </button>
                        </form>
            </div>
            @else
                <a href="{{ route('login')}}"><button class="text-white px-4 py-2 rounded-lg transition duration-500 font-bold nav-button">Log In</button></a>
                <a href="{{ route('register')}}" class=" text-white px-4 py-2 rounded-lg transition duration-500 font-bold nav-button">Register</a>
            @endif
            
        </div>
    </div>
</header>