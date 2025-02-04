@extends('layouts.index')
@section('content')

<div class="flex flex-col items-center justify-center h-screen">
    <h1 class="text-4xl font-bold text-gray-800">Welcome to Eliptic Airlines</h1>
    <p class="text-gray-600">The best airline to reach your destination</p>
    <a href="{{ route('flightsIndex') }}" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">See Flights</a>


</div>

@endsection