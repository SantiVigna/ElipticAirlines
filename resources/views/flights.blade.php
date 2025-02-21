@extends('layouts.index')
@section('content')

<div class="flex flex-col items-center">
  <div class="mt-8 text-center">
    <h2 class="text-3xl font-bold text-blue-500">Discover Our Exclusive Offers</h2>
    <p class="text-lg text-gray-600 mt-2">Book now and enjoy special aiscounts on selected flights.</p>
  </div>
</div>
@auth
    @if (Auth::user()->isAdmin == 1)
    <div class="flex flex-row justify-center mt-10">
      <a href="{{route('flightsForm')}}">
        <button class="inline-flex items-center px-6 py-3 border border-transparent text-lg leading-4 font-semibold rounded-full text-white bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-600 hover:to-blue-800 focus:outline-none transition ease-in-out duration-500 shadow-lg transform hover:scale-105 m-4">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          New Flight
        </button>
      </a>
    </div>
    @endif
@endauth

<div class="flex flex-wrap flex-row items-center justify-center row mt-10 w-full">
    @foreach ($flights as $flight)
      <div class="p-5 w-full md:w-1/2 lg:w-1/3 xl:w-2/5">
        <div class="max-w-full bg-gradient-to-r from-blue-50 to-blue-100 flex flex-col rounded overflow-hidden shadow-lg">
          <div class="flex flex-row items-baseline flex-nowrap bg-gradient-to-r from-blue-800 to-blue-600 p-2">
            <svg viewBox="0 0 64 64" data-testid="tripDetails-bound-plane-icon" pointer-events="all" aria-hidden="true" class="mt-2 mr-1" role="presentation" style="fill: rgb(255, 255, 255); height: 0.9rem; width: 0.9rem;">
              <path d="M43.389 38.269L29.222 61.34a1.152 1.152 0 01-1.064.615H20.99a1.219 1.219 0 01-1.007-.5 1.324 1.324 0 01-.2-1.149L26.2 38.27H11.7l-3.947 6.919a1.209 1.209 0 01-1.092.644H1.285a1.234 1.234 0 01-.895-.392l-.057-.056a1.427 1.427 0 01-.308-1.036L1.789 32 .025 19.656a1.182 1.182 0 01.281-1.009 1.356 1.356 0 01.951-.448l5.4-.027a1.227 1.227 0 01.9.391.85.85 0 01.2.252L11.7 25.73h14.5L19.792 3.7a1.324 1.324 0 01.2-1.149A1.219 1.219 0 0121 2.045h7.168a1.152 1.152 0 011.064.615l14.162 23.071h8.959a17.287 17.287 0 017.839 1.791Q63.777 29.315 64 32q-.224 2.685-3.807 4.478a17.282 17.282 0 01-7.84 1.793h-9.016z"></path>
            </svg>
            <h1 class="ml-2 uppercase font-bold text-white">Departure</h1>
            <p class="ml-2 font-normal text-white">{{$flight->departure_time}}</p>
          </div>
            
          @auth
            @if (Auth::user()->isAdmin == 1)    
                <div class="mt-2 flex justify-start p-2">
                <a href="" class="flex mx-2 ml-6 h-8 px-2 flex-row items-baseline rounded-full bg-gradient-to-r from-blue-400 to-blue-600 text-white p-1 hover:from-blue-600 hover:to-blue-800 transition duration-300 shadow-lg transform hover:scale-105">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit" style="height: 12px; width: 12px;">
                  <path d="M11 4h2a2 2 0 0 1 2 2v2M16.24 7.76l-9.19 9.19a2 2 0 0 1-1.06.56l-3.51.88a1 1 0 0 1-1.21-1.21l.88-3.51a2 2 0 0 1 .56-1.06l9.19-9.19a2 2 0 0 1 2.83 0l1.41 1.41a2 2 0 0 1 0 2.83z"></path>
                  </svg>
                  <p class="font-normal text-sm ml-1 text-white">Edit Flight</p>
                </a>
                <a href="" class="flex mx-2 ml-6 h-8 px-2 flex-row items-baseline rounded-full bg-gradient-to-r from-red-400 to-red-600 text-white p-1 hover:from-red-600 hover:to-red-800 transition duration-300 shadow-lg transform hover:scale-105">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2" style="height: 12px; width: 12px;">
                  <path d="M3 6h18M9 6v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V6M10 6V4a2 2 0 0 1 2-2h0a2 2 0 0 1 2 2v2"></path>
                  <path d="M18 6l-1 14a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2L6 6"></path>
                  <path d="M10 11v6M14 11v6"></path>
                  </svg>
                  <p class="font-normal text-sm ml-1 text-white">Delete Flight</p>
                </a>
                </div>  
            @endif
          @endauth
            
          <div class="mt-2 flex sm:flex-row mx-6 sm:justify-between flex-wrap ">
            <div class="flex flex-row place-items-center p-2">
              <img alt="Eliptic Airlines" class="w-10 h-10" src="https://res.cloudinary.com/dq2kswexq/image/upload/v1738074889/ElipticAirlines/sfghzdhlqpbfzfkgpztr.jpg" style="opacity: 1; transform-origin: 0% 50% 0px; transform: none;" />
              <div class="flex flex-col ml-2">
                <p class="text-xs text-black font-bold">Eliptic Airlines</p>
                <p class="text-xs text-black">{{$flight->flight_number}}</p>
              </div>
            </div>
            <div class="flex flex-row">
              <div class="flex flex-col p-2">
                <p class="font-bold">{{$flight->departure_time}}</p>
                <p class="text-black text-xl">{{$flight->departure}}</p>
              </div>
                <div class="flex items-center justify-center p-2">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                </div>
              <div class="flex flex-col flex-wrap p-2">
                <p class="font-bold">{{$flight->arrival_time}}</p>
                <p class="text-black text-xl">{{$flight->arrival}}</p>
              </div>
            </div>
          </div>
          <div class="mt-4 bg-gray-200 flex flex-col md:flex-row justify-between items-center p-4 rounded-lg shadow-md">
            <div class="flex items-center">
              <svg class="w-12 h-12 p-2 mx-2 bg-blue-400 rounded-full fill-current text-white" viewBox="0 0 64 64" pointer-events="all" aria-hidden="true" role="presentation">
                <path d="M43.389 38.269L29.222 61.34a1.152 1.152 0 01-1.064.615H20.99a1.219 1.219 0 01-1.007-.5 1.324 1.324 0 01-.2-1.149L26.2 38.27H11.7l-3.947 6.919a1.209 1.209 0 01-1.092.644H1.285a1.234 1.234 0 01-.895-.392l-.057-.056a1.427 1.427 0 01-.308-1.036L1.789 32 .025 19.656a1.182 1.182 0 01.281-1.009 1.356 1.356 0 01.951-.448l5.4-.027a1.227 1.227 0 01.9.391.85.85 0 01.2.252L11.7 25.73h14.5L19.792 3.7a1.324 1.324 0 01.2-1.149A1.219 1.219 0 0121 2.045h7.168a1.152 1.152 0 011.064.615l14.162 23.071h8.959a17.287 17.287 0 017.839 1.791Q63.777 29.315 64 32q-.224 2.685-3.807 4.478a17.282 17.282 0 01-7.84 1.793h-9.016z"></path>
              </svg>
              <div class="text-sm mx-2 flex flex-col">
                <p class="font-semibold">Standard Ticket</p>
                <p class="font-bold text-lg">{{$flight->price}} €</p>
                <p class="text-xs text-black">Price per adult</p>
              </div>
            </div>
            <div class="mt-4 md:mt-0 md:ml-auto">
              <button class="w-32 h-12 xl:mr-10 rounded-full flex border-solid border bg-gradient-to-r from-blue-400 to-blue-600 text-white font-bold justify-center items-center hover:from-blue-600 hover:to-blue-800 transition duration-300 shadow-lg transform hover:scale-105">Book</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>


  

@endsection