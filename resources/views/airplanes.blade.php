@extends('layouts.index')
@section('content')

@auth
    @if (Auth::user()->isAdmin == 1)
    <div class="flex flex-row justify-center mt-10">
        <a href="{{route('airplanesForm')}}">
            <button class="inline-flex items-center px-6 py-3 border border-transparent text-lg leading-4 font-semibold rounded-full text-white bg-gradient-to-r from-green-400 to-green-600 hover:from-green-500 hover:to-green-700 focus:outline-none transition ease-in-out duration-500 shadow-lg transform hover:scale-105 m-4">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            New Airplane
            </button>
        </a>
    </div>
    @endif
@endauth

<div class="min-h-screen py-5">
    <div class='overflow-x-auto w-full'>
        <table class='mx-auto max-w-4xl w-full rounded-lg bg-gradient-to-r from-blue-50 to-blue-100 divide-y divide-gray-300 overflow-hidden shadow-lg mb-10'>
            <thead class="bg-blue-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Registration </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Model </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Capacity </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Autonomy </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">  </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">  </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($airplanes as $airplane)
                    <tr class="hover:bg-blue-50 transition duration-300 ease-in-out">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='Airplane image' src='{{ $airplane->image }}' /> </div>
                                <div>
                                    <p class="text-gray-900 font-medium"> {{$airplane->registration}} </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-gray-900 font-medium text-center"> {{$airplane->model}} </p>
                        </td>
                        <td class="px-6 py-4 text-center"> <span class="text-gray-900 font-medium"> {{$airplane->capacity}} </span> </td>
                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-blue-600 font-semibold px-2 rounded-full"> {{$airplane->autonomy}} KM </span> </td>
                        <td class="px-6 py-4 text-center">
                            <a href="" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-semibold rounded-full text-white bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-600 hover:to-blue-800 focus:outline-none transition ease-in-out duration-500 shadow-lg transform hover:scale-105">
                                Edit
                            </a>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this airplane?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-semibold rounded-full text-white bg-red-500 hover:bg-red-700 focus:outline-none transition ease-in-out duration-500 shadow-lg transform hover:scale-105">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection