<x-public-layout>
    <div class="max-w-2xl mx-auto mt-8">
        @if (session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-8 shadow-md rounded-lg">
            <h2 class="text-3xl font-bold mb-4">Confirmation Page</h2>

            <div class="mt-6">
                <div class="mt-6">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Reserveringsdetails:</h3>
                    <div class="bg-gray-100 p-4 rounded-md mb-4">
                        <p class="mb-2"><span class="font-bold text-blue-500">User:</span> {{ optional($reservation->user)->name }}</p>
                        <p class="mb-2"><span class="font-bold text-blue-500">Event:</span> {{ optional($reservation->event)->title }}</p>
                        <p class="mb-2"><span class="font-bold text-blue-500">Aantal tickets:</span> {{ $reservation->nr }}</p>
                    </div>

                    <div class="bg-gray-100 p-4 rounded-md mb-4">
                        <p class="mt-2 text-lg font-semibold"><span class="font-bold text-blue-500">Totale prijs:</span> &euro;{{ number_format($totalPrice, 2) }}</p>
                    </div>
                </div>


                <h3 class="text-2xl font-bold mt-6">Tickets:</h3>
                @if ($reservation->tickets)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($reservation->tickets as $ticket)
                            <div class="border p-4 rounded-md">
                                <p class="block text-gray-700 font-semibold">Event name: {{ optional($ticket)->type }}</p>
                                <p class="text-gray-700 mt-2">Ticket Number: {{ optional($ticket)->id }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600 mt-4">Geen tickets gevonden voor deze reservering.</p>
                @endif
                <div class="mt-8 flex justify-center">
                    <a href="{{ route('index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded transition duration-300 ease-in-out">
                        Continue Shoping
                    </a>
                </div>


            </div>
    </div>
</x-public-layout>
