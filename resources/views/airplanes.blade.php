@extends('layouts.index')
@section('content')

<div class="min-h-screen py-5">
    <div class='overflow-x-auto w-full'>
        <table class='mx-auto max-w-4xl w-full rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Registration </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Model </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Autonomy </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Capacity </th>
                    {{-- <th class="font-semibold text-sm uppercase px-6 py-4"> </th> --}}
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($airplanes as $airplane)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://res.cloudinary.com/dq2kswexq/image/upload/v1738074889/ElipticAirlines/sfghzdhlqpbfzfkgpztr.jpg' /> </div>
                                <div>
                                    <p> {{$airplane->registration}} </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class=""> {{$airplane->model}} </p>
                        </td>
                        <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> {{$airplane->autonomy}} KM </span> </td>
                        <td class="px-6 py-4 text-center"> {{$airplane->capacity}} </td>
                        {{-- <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection