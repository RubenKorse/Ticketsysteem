<!-- resources/views/reservations.blade.php -->

<x-public-layout>
    <div class="max-w-2xl mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">All Your Reservations</h1>

        @forelse ($sortedReservations as $index => $reservation)
            <div class="bg-white p-8 shadow-md rounded-lg mb-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-800">Reservation {{ $index + 1 }}</h2>

                <div class="mt-6">
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Reservation Details:</h3>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-gray-100 p-4 rounded-md">
                            <p class="mb-2"><span class="font-bold text-blue-500">Event Name:</span> {{ optional($reservation->event)->title }}</p>
                            <p class="mb-2"><span class="font-bold text-blue-500">Date:</span> {{ $reservation->event->date->format('d-m-Y') }}</p>
                            <p class="mb-2"><span class="font-bold text-blue-500">Status:</span> {{ $reservation->event->date->isToday() && $reservation->tickets->isNotEmpty() ? 'Today\'s reservations with tickets scanned' : ($reservation->event->date > now() ? 'Future reservations' : 'Historical reservations') }}</p>
                        </div>
                        <div>
                            <img src="https://picsum.photos/seed/{{ $reservation->event->id }}/800/600" alt="Event Image" class="w-full h-full object-cover rounded-md">
                        </div>
                    </div>

                    <h3 class="text-xl font-bold mt-4 text-gray-800">Tickets:</h3>
                    @if ($reservation->tickets->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($reservation->tickets as $ticket)
                                <div class="border p-4 rounded-md">
                                    <p class="block text-gray-700 font-semibold">Event name: {{ optional($ticket)->type }}</p>
                                    <p class="text-gray-700 mt-2">Ticket Number: {{ optional($ticket)->id }}</p>
                                    <div class="mt-4">
                                        <a href="" class="text-blue-500 hover:underline" target="_blank">
                                            Generate QR Code
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-600 mt-4">No tickets found for this reservation.</p>
                    @endif

                    <!-- Link to generate QR code for the reservation -->
                </div>
            </div>
        @empty
            <p class="text-gray-600 mt-4">No reservations found.</p>
        @endforelse
    </div>
</x-public-layout>
