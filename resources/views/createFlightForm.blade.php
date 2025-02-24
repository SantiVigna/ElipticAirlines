@extends('layouts.index')
@section('content')

<div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24 mt-24 rounded-lg">
    <div class="flex flex-col items-center ">
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-800">Eliptic Airlines</h1>
            <p class="text-gray-600 text-center">Form for Flights creation</p>
        </div>
    <form action="{{route('flightsStore')}}" method="POST">
        @csrf
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="flight_number">
              Flight Number
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="flight_number" name="flight_number" type="text" placeholder="ES-Z82">
            <div>
              <span class="text-red-500 text-xs italic">
                Please fill out this field.
              </span>
            </div>
          </div>
          <div class="md:w-1/2 px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="price">
              Price (€)
            </label>
            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="price" name="price" type="number" placeholder="86">
          </div>
        </div>
        <div class="-mx-3 md:flex mb-2">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="departure">
              Departure
            </label>
            <div>
              <select class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="departure" name="departure">
                <option value="Madrid">Madrid</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Paris">Paris</option>
                <option value="Rome">Rome</option>
                <option value="Berlin">Berlin</option>
                <option value="London">London</option>
                <option value="Amsterdam">Amsterdam</option>
                <option value="New York">New York</option>
                <option value="Sydney">Sydney</option>
                <option value="Sao Paulo">Sao Paulo</option>
              </select>
            </div>
          </div>
          <div class="md:w-1/2 px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="arrival">
              Arrival
            </label>
            <div>
              <select class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="arrival" name="arrival">
                <option value="Barcelona">Barcelona</option>
                <option value="Paris">Paris</option>
                <option value="Rome">Rome</option>
                <option value="Berlin">Berlin</option>
                <option value="London">London</option>
                <option value="Amsterdam">Amsterdam</option>
                <option value="Madrid">Madrid</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Tokyo">Tokyo</option>
                <option value="Beijing">Beijing</option>
              </select>
            </div>
          </div>
          <div class="md:w-1/2  px-3">
            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="airplane">
              Airplane to Assign*
            </label>
            <div>
              <select class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="airplane_id" name="airplane_id" type="text">
                @for ($i = 1; $i <= $airplanes; $i++)
                  <option>{{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>
        </div>
        <div class="-mx-3 md:flex mb-2 mt-4">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="departure_time">
                Departure Time
              </label>
              <div>
                <select class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="departure_time" name="departure_time">
                    <option value="13/02/2025">13/02/2025</option>
                    <option value="14/02/2025">14/02/2025</option>
                    <option value="15/02/2025">15/02/2025</option>
                    <option value="16/02/2025">16/02/2025</option>
                    <option value="17/02/2025">17/02/2025</option>
                    <option value="18/02/2025">18/02/2025</option>
                    <option value="19/02/2025">19/02/2025</option>
                    <option value="20/02/2025">20/02/2025</option>
                    <option value="21/02/2025">21/02/2025</option>
                    <option value="22/02/2025">22/02/2025</option>
                    <option value="23/02/2025">23/02/2025</option>
                    <option value="24/02/2025">24/02/2025</option>
                    <option value="25/02/2025">25/02/2025</option>
                    <option value="26/02/2025">26/02/2025</option>
                    <option value="27/02/2025">27/02/2025</option>
                    <option value="28/02/2025">28/02/2025</option>
                    <option value="01/03/2025">01/03/2025</option>
                </select>
              </div>
            </div>
            <div class="md:w-1/2 px-3">
              <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="arrival_time">
                Arrival Time
              </label>
              <div>
                <select class="w-full bg-gray-200 border border-gray-200 text-black text-xs py-3 px-4 pr-8 mb-3 rounded" id="arrival_time" name="arrival_time">
                    <option value="13/02/2025">13/02/2025</option>
                    <option value="14/02/2025">14/02/2025</option>
                    <option value="15/02/2025">15/02/2025</option>
                    <option value="16/02/2025">16/02/2025</option>
                    <option value="17/02/2025">17/02/2025</option>
                    <option value="18/02/2025">18/02/2025</option>
                    <option value="19/02/2025">19/02/2025</option>
                    <option value="20/02/2025">20/02/2025</option>
                    <option value="21/02/2025">21/02/2025</option>
                    <option value="22/02/2025">22/02/2025</option>
                    <option value="23/02/2025">23/02/2025</option>
                    <option value="24/02/2025">24/02/2025</option>
                    <option value="25/02/2025">25/02/2025</option>
                    <option value="26/02/2025">26/02/2025</option>
                    <option value="27/02/2025">27/02/2025</option>
                    <option value="28/02/2025">28/02/2025</option>
                    <option value="01/03/2025">01/03/2025</option>
                </select>
              </div>
            </div>
            <div class="md:w-1/2 px-3">
                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="title">
                  Distance  (Km)
                </label>
                <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="distance" name="distance" type="number" placeholder="86">
            </div>
          </div>
        <div class="-mx-3 md:flex mt-2 flex flex-col flex-wrap justify-center items-center mg-0-auto">
          <div class="md:w-full px-3 flex justify-center space-x-4">
            <button action="{{route('flightsStore')}}" type="submit" class="md:w-1/3 bg-green-500 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-green-200 hover:border-green-100 rounded-full">
              Submit
            </button>
            <button type="reset" class="md:w-1/3 bg-red-500 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-red-300 hover:border-gray-100 rounded-full">
              Reset
            </button>
          </div>
          <div class="md:w-full px-3 flex justify-center space-x-4 mt-5">
            <a href="{{route('flightsIndex')}}" class="md:w-1/3 bg-blue-500 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-blue-200 hover:border-gray-100 rounded-full text-center">
                Back
            </a>
          </div>
        </div>
      </div>
      </form>
    </div>
</div>
   

@endsection