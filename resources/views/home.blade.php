@extends('layouts.index')
@section('content')

<div class="flex flex-col items-center justify-center h-screen">
    <h1 class="text-4xl font-bold text-gray-800">¡Bienvenido a Eliptic Airlines!</h1>
    <p class="text-gray-600">Tu aerolínea de confianza</p>
    <a href="{{ route('flightsIndex') }}" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Ver vuelos</a>


</div>

@endsection