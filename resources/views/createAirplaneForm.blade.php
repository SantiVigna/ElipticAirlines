@extends('layouts.index')
@section('content')

<div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24 mt-24 rounded-lg">
    <div class="flex flex-col items-center ">
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-800">Eliptic Airlines</h1>
            <p class="text-gray-600 text-center">Form for Airplanes creation</p>
        </div>
    <form action="{{route('airplanesStore')}}" method="POST">
        @csrf
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="registration">
              Registration Number
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="registration" name="registration" type="text" placeholder="ES-A19">
            <div>
              <span class="text-red-500 text-xs italic">
                Please fill out this field.
              </span>
            </div>
          </div>
          <div class="md:w-1/2 px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="model">
              Model
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="model" name="model" type="text" placeholder="Boeing 737">
          </div>
        </div>
        <div class="-mx-3 md:flex mb-2">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="capacity">
              Capacity
            </label>
            <div>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="capacity" name="capacity" type="number" placeholder="25">
            </div>
          </div>
          <div class="md:w-1/2 px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="autonomy">
              Autonomy
            </label>
            <div>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="autonomy" name="autonomy" type="number" placeholder="1000">
            </div>
          </div>
        </div>
        <div class="md:full px-3 mt-5">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="image">
              Image URL
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="image" name="image" type="text" placeholder="Enter the URL... ">
        </div>
        <div class="-mx-3 md:flex mt-2 flex flex-col flex-wrap justify-center items-center mg-0-auto">
          <div class="md:w-full px-3 flex justify-center space-x-4">
            <button action="{{route('airplanesStore')}}" type="submit" class="md:w-1/3 bg-green-500 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-green-200 hover:border-green-100 rounded-full">
              Submit
            </button>
            <button type="reset" class="md:w-1/3 bg-red-500 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-red-300 hover:border-gray-100 rounded-full">
              Reset
            </button>
          </div>
          <div class="md:w-full px-3 flex justify-center space-x-4 mt-5">
            <a href="{{route('airplanesIndex')}}" class="md:w-1/3 bg-blue-500 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-blue-200 hover:border-gray-100 rounded-full text-center">
                Back
            </a>
          </div>
        </div>
    </div>
    </form>
</div>

@endsection