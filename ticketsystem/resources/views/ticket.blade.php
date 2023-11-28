<x-public-layout>
    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
    <div class="flex flex-col items-center">
        <div class="bg-white p-4 shadow-md w-1/2 w-3/5">
            <p class="font-bold text-3xl mb-4">{{ $event->title }}:</p>
            <img src="https://picsum.photos/seed/{{ $event->id }}/800/600" alt="Event Image" class="w-full">
            <div class="flex flex-row items-center justify-around mb-4 mt-4">
                <div class="flex flex-col items-center">
                    <p class="text-gray-600 text-lg mb-4">{!! $event->description !!}</p>
                    <p class="text-gray-600 text-lg"><i class="fa-solid fa-location-dot"></i> {{ $event->location }}</p>
                    <p class="text-gray-600 text-lg"><i class="fa-solid fa-calendar"></i> {{ $event->date->format('d-m-Y') }}</p>
                    <p class="text-gray-600 text-lg"><i class="fa-solid fa-clock"></i> {{ $event->time }}</p>
                    <p class="text-gray-600 text-lg"><i class="fa-solid fa-euro-sign"></i> {{ $event->price }}</p>
                </div>
                    <form class="flex flex-col gap-2 items-center" action="{{ route('ticket.store', ['event_id' => $event->id]) }}" method="POST">
                    @csrf
                        <label for="ticketQuantity" class="text-lg font-semibold mb-2">Selecteer het aantal tickets:</label>
                        <input type="number" id="ticketQuantity" name="ticketQuantity" class="border rounded-md px-3 py-2 w-16 text-center" value="1" min="1">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition duration-300 ease-in-out">Buy Tickets</button>
                    </form>
            </div>
        </div>
    </div>
</x-public-layout>
