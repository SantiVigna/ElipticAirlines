@extends('layouts.index')
@section('content')

<!-- <div class="flex flex-col items-center justify-center h-screen">
    <h1 class="text-4xl font-bold text-gray-800">Welcome to Eliptic Airlines</h1>
    <p class="text-gray-600">The best airline to reach your destination</p>
    <a href="{{ route('flightsIndex') }}" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">See Flights</a>


</div> -->

<section class="heroSection relative w-full max-w-4xl rounded-2xl shadow-xl text-center my-12 flex flex-col items-center mx-auto">
        <h1 class="text-5xl font-extrabold mb-4 drop-shadow-lg">Welcome to Eliptic Airlines</h1>
        <p class="text-lg opacity-90 mb-6">Where dreams take off and the sky is just the beginning.</p>
    </section>

    <!-- Features Section -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl text-center my-12 mx-auto">
        <div class="p-6 bg-white/20 rounded-xl shadow-lg flex flex-col items-center service-card">
            <div class="text-5xl mb-3 ">✈️</div>
            <h3 class="text-xl font-bold text-white">First-Class Comfort</h3>
            <p class="text-sm opacity-90 mt-2 text-white">Luxury seats and onboard entertainment.</p>
        </div>
        <div class="p-6 bg-white/20 rounded-xl shadow-lg flex flex-col items-center service-card">
            <div class="text-5xl mb-3">🔒</div>
            <h3 class="text-xl font-bold text-white">Secure Flights</h3>
            <p class="text-sm opacity-90 mt-2 text-white">Security and confidence in every flight</p>
        </div>
        <div class="p-6 bg-white/20 rounded-xl shadow-lg flex flex-col items-center service-card">
            <div class="text-5xl mb-3">🌍</div>
            <h3 class="text-xl font-bold text-white">Exclusive Destinations</h3>
            <p class="text-sm opacity-90 mt-2 text-white">Explore the world with our global network</p>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="text-center my-12">
        <h2 class="text-3xl font-bold">Book your next flight today!</h2>
        <p class="opacity-90 mt-2">Discover exclusive offers and travel at your own style. </p>
        <a href="{{ route('flightsIndex') }}" class="mt-6 px-6 py-3 rounded-full font-semibold text-lg shadow-lg transition ease-in-out duration-500 inline-block nav-link">
            Book Now
        </a>
    </section>

@endsection