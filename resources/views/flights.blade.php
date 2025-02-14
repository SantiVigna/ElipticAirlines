@extends('layouts.index')
@section('content')

<div class="flex flex-col items-center ">
    <div class="mt-10">
        <h1 class="text-4xl font-bold text-gray-800 text-center">Welcome to Eliptic Airlines</h1>
        <p class="text-gray-600 text-center">The best airline to reach your destination</p>
    </div>
</div>
@auth
    @if (Auth::user()->isAdmin == 1)
    <div class="flex flex-row justify-center mt-10">
      <a href="{{route('flightsForm')}}">
        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-gray-400 bg-blue-400 dark:bg-gray-800 hover:bg-black dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-500 bg m-4">
          New Flight
        </button>
      </a>
    </div>
    @endif
@endauth

<div class="flex flex-wrap flex-row items-center justify-center row mt-10 w-full">
    @foreach ($flights as $flight)
          <div class="p-5 w-sm md:w-1/2 lg:w-1/3 xl:w-2/5">
            <div class="max-w-full  bg-white flex flex-col rounded overflow-hidden shadow-lg">
              <div class="flex flex-row items-baseline flex-nowrap bg-gray-100 p-2">
                <svg viewBox="0 0 64 64" data-testid="tripDetails-bound-plane-icon" pointer-events="all" aria-hidden="true" class="mt-2 mr-1" role="presentation" style="fill: rgb(102, 102, 102); height: 0.9rem; width: 0.9rem;">
                  <path d="M43.389 38.269L29.222 61.34a1.152 1.152 0 01-1.064.615H20.99a1.219 1.219 0 01-1.007-.5 1.324 1.324 0 01-.2-1.149L26.2 38.27H11.7l-3.947 6.919a1.209 1.209 0 01-1.092.644H1.285a1.234 1.234 0 01-.895-.392l-.057-.056a1.427 1.427 0 01-.308-1.036L1.789 32 .025 19.656a1.182 1.182 0 01.281-1.009 1.356 1.356 0 01.951-.448l5.4-.027a1.227 1.227 0 01.9.391.85.85 0 01.2.252L11.7 25.73h14.5L19.792 3.7a1.324 1.324 0 01.2-1.149A1.219 1.219 0 0121 2.045h7.168a1.152 1.152 0 011.064.615l14.162 23.071h8.959a17.287 17.287 0 017.839 1.791Q63.777 29.315 64 32q-.224 2.685-3.807 4.478a17.282 17.282 0 01-7.84 1.793h-9.016z"></path>
                </svg>
                <h1 class="ml-2 uppercase font-bold text-black-500">departure</h1>
                <p class="ml-2 font-normal text-black-500">{{$flight->departure_time}}</p>
              </div>
              
                @auth
                    @if (Auth::user()->isAdmin == 1)    
                        <div class="mt-2 flex justify-start bg-white p-2">
                            <div class="flex mx-2 ml-6 h8 px-2 flex-row items-baseline rounded-full bg-gray-100 p-1">
                                <svg viewBox="0 0 64 64" pointer-events="all" aria-hidden="true" class="etiIcon css-jbc4oa" role="presentation" style="fill: rgb(102, 102, 102); height: 12px; width: 12px;">
                                    <path d="M43.389 38.269L29.222 61.34a1.152 1.152 0 01-1.064.615H20.99a1.219 1.219 0 01-1.007-.5 1.324 1.324 0 01-.2-1.149L26.2 38.27H11.7l-3.947 6.919a1.209 1.209 0 01-1.092.644H1.285a1.234 1.234 0 01-.895-.392l-.057-.056a1.427 1.427 0 01-.308-1.036L1.789 32 .025 19.656a1.182 1.182 0 01.281-1.009 1.356 1.356 0 01.951-.448l5.4-.027a1.227 1.227 0 01.9.391.85.85 0 01.2.252L11.7 25.73h14.5L19.792 3.7a1.324 1.324 0 01.2-1.149A1.219 1.219 0 0121 2.045h7.168a1.152 1.152 0 011.064.615l14.162 23.071h8.959a17.287 17.287 0 017.839 1.791Q63.777 29.315 64 32q-.224 2.685-3.807 4.478a17.282 17.282 0 01-7.84 1.793h-9.016z"></path>
                                </svg>
                                <p class="font-normal text-sm ml-1 text-black-500">{{$flight->airplane->registration}}</p>
                            </div>
                        </div>  
                    @endif
                @endauth
                
              <div class="mt-2 flex sm:flex-row mx-6 sm:justify-between flex-wrap ">
                <div class="flex flex-row place-items-center p-2">
                  <img alt="Qatar Airways" class="w-10 h-10" src="https://res.cloudinary.com/dq2kswexq/image/upload/v1738074889/ElipticAirlines/sfghzdhlqpbfzfkgpztr.jpg" style="opacity: 1; transform-origin: 0% 50% 0px; transform: none;" />
                  <div class="flex flex-col ml-2">
                    <p class="text-xs text-black-500 font-bold">Eliptic Airlines</p>
                    <p class="text-xs text-black-500">{{$flight->flight_number}}</p>
                  </div>
                </div>
          
                <div class="flex flex-col p-2">
                  <p class="font-bold">{{$flight->departure_time}}</p>
                  <p class="text-black-500 text-xl">{{$flight->departure}}</p>
                </div>
                <div class="flex flex-col flex-wrap p-2">
                  <p class="font-bold">{{$flight->arrival_time}}</p>
                  <p class="text-black-500 text-xl">Zambia</p>
                </div>
              </div>
              <div class="mt-4 bg-gray-100 flex flex-row flex-wrap md:flex-nowrap justify-between items-baseline">
                <div class="flex mx-6 py-4 flex-row flex-wrap">
                  <svg class="w-12 h-10 p-2 mx-2 self-center bg-blue-400 rounded-full fill-current text-white" viewBox="0 0 64 64" pointer-events="all" aria-hidden="true" role="presentation"><path d="M43.389 38.269L29.222 61.34a1.152 1.152 0 01-1.064.615H20.99a1.219 1.219 0 01-1.007-.5 1.324 1.324 0 01-.2-1.149L26.2 38.27H11.7l-3.947 6.919a1.209 1.209 0 01-1.092.644H1.285a1.234 1.234 0 01-.895-.392l-.057-.056a1.427 1.427 0 01-.308-1.036L1.789 32 .025 19.656a1.182 1.182 0 01.281-1.009 1.356 1.356 0 01.951-.448l5.4-.027a1.227 1.227 0 01.9.391.85.85 0 01.2.252L11.7 25.73h14.5L19.792 3.7a1.324 1.324 0 01.2-1.149A1.219 1.219 0 0121 2.045h7.168a1.152 1.152 0 011.064.615l14.162 23.071h8.959a17.287 17.287 0 017.839 1.791Q63.777 29.315 64 32q-.224 2.685-3.807 4.478a17.282 17.282 0 01-7.84 1.793h-9.016z"></path></svg>
                  <div class="text-sm mx-2 flex flex-col w-30">
                    <p class="">Standard Ticket</p>
                    <p class="font-bold">{{$flight->price}} €</p>
                    <p class="text-xs text-black-500">Price per adult</p>
                  </div>
                  <div class="sm:ml-8 xl:ml-10">
                    <button class="w-24 h-16 rounded flex border-solid border bg-blue-400 text-white font-bold mx-2 justify-center place-items-center">Book</button>
                  </div>
                </div>
                {{-- <div class="md:border-l-2 mx-6 md:border-dotted flex flex-row py-4 mr-6 flex-wrap">
                  <svg class="w-12 h-10 p-2 mx-2 self-center bg-blue-700 rounded-full fill-current text-white" viewBox="0 0 64 64" pointer-events="all" aria-hidden="true" class="etiIcon css-ecvhkc" role="presentation" style="fill: rgb(255, 255, 255);"><path d="M62.917 38.962C59.376 53.71 47.207 64 31.833 64a31.93 31.93 0 01-21.915-8.832l-5.376 5.376a2.65 2.65 0 01-1.874.789A2.685 2.685 0 010 58.668V40a2.687 2.687 0 012.667-2.667h18.666A2.687 2.687 0 0124 40a2.645 2.645 0 01-.793 1.877L17.5 47.58a21.244 21.244 0 0032.665-4.414 33.706 33.706 0 002.208-4.873 1.292 1.292 0 011.25-.96h8a1.342 1.342 0 011.333 1.337.738.738 0 01-.041.293M64 24a2.687 2.687 0 01-2.667 2.668H42.667A2.687 2.687 0 0140 24a2.654 2.654 0 01.793-1.877l5.749-5.746a21.336 21.336 0 00-32.706 4.457 33.224 33.224 0 00-2.208 4.873 1.293 1.293 0 01-1.25.96H2.085A1.342 1.342 0 01.752 25.33v-.293C4.334 10.247 16.626 0 32 0a32.355 32.355 0 0122.041 8.832l5.419-5.376a2.644 2.644 0 011.872-.789A2.685 2.685 0 0164 5.333z"></path></svg>
                  <div class="text-sm mx-2 flex flex-col">
                    <p>Flexible Ticket</p>
                    <p class="font-bold"></p>
                    <p class="text-xs text-black-500">Price per adult</p>
                  </div>
                  <button class="w-32 h-11 rounded flex border-solid border text-white bg-blue-700 mx-2 justify-center place-items-center"><div class="">Book</div></button>
                </div> --}}
              </div>
            </div>
          </div>
    @endforeach
</div>


  

@endsection