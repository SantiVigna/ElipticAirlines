@extends('layouts.index')
@section('content')

<div class="flex flex-col items-center justify-center h-screen">
    <div class="mt-4">
        <h1 class="text-4xl font-bold text-gray-800">¡Bienvenido a Eliptic Airlines!</h1>
        <p class="text-gray-600 ">Tu aerolínea de confianza</p>
    </div>
    @foreach ($flights as $flight)
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="bg-white shadow-md rounded-lg p-6 w-96">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h1 class="text-2xl font-bold">DEL</h1>
                        <p class="text-orange-500">Delhi</p>
                    </div>
                    <div class="text-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">DXB</h1>
                        <p class="text-orange-500">Dubai</p>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-600">Passenger Name</p>
                        <p class="font-semibold">John Smith</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-600">Age / Gender</p>
                        <p class="font-semibold">42 / M</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-600">Flight Number</p>
                        <p class="font-semibold">LH456</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-600">Flight Date</p>
                        <p class="font-semibold">17/11/2023</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-600">Class</p>
                        <p class="font-semibold">Economy</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-600">Departure Date</p>
                        <p class="font-semibold">16:15</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-600">Arrival Date</p>
                        <p class="font-semibold">17:30</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection