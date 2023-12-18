<x-public-layout>
    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <div class="max-w-3xl mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">Buy {{ $event->title }} Ticket</h1>

        <div class="bg-white p-8 shadow-md rounded-lg mb-8 flex flex-col md:flex-row items-stretch"> <!-- Aangepast: items-stretch toegevoegd voor hoogte-uitlijning -->

            <div class="relative mb-6 w-full md:w-2/3"> <!-- Aangepast: w-2/3 toegevoegd voor bredere witte achtergrond -->
                <img src="https://picsum.photos/seed/{{ $event->id }}/800/600" alt="Event Image" class="w-full h-full object-cover rounded-md">
            </div>

            <div class="w-full md:w-1/3 md:ml-6"> <!-- Aangepast: w-1/3 toegevoegd voor smallere witte achtergrond -->
                <h2 class="text-4xl font-bold mb-4">{{ $event->title }}</h2>
                <div class="flex flex-col items-start">
                    <p class="text-gray-700 text-lg mb-4">{!! $event->description !!}</p>
                    <p class="text-gray-700 text-lg"><i class="fa-solid fa-location-dot"></i> {{ $event->location }}</p>
                    <p class="text-gray-700 text-lg"><i class="fa-solid fa-calendar"></i> {{ $event->date->format('d-m-Y') }}</p>
                    <p class="text-gray-700 text-lg"><i class="fa-solid fa-clock"></i> {{ $event->time }}</p>
                    <p class="text-gray-700 text-lg"><i class="fa-solid fa-euro-sign"></i> <span id="totalPrice">{{ $event->price }}</span></p>
                </div>

                <form class="flex flex-col gap-4 items-start mt-4" id="ticketForm" action="{{ route('ticket.store', ['event_id' => $event->id]) }}" method="POST">
                    @csrf
                    <label for="ticketQuantity" class="text-lg font-semibold mb-2">Selecteer het aantal tickets:</label>
                    <div class="flex items-center">
                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out" onclick="decreaseQuantity()">-</button>
                        <input type="number" id="ticketQuantity" name="ticketQuantity" class="border rounded-md px-3 py-2 w-12 gap-3 m-1 text-center remove-arrow" value="1" min="1" onchange="updateTotalPrice()">
                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded hover-bg-blue-600 transition duration-300 ease-in-out" onclick="increaseQuantity()">+</button>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-8 py-3 rounded mt-4 hover:bg-blue-600 transition duration-300 ease-in-out">Buy Tickets</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        function updateTotalPrice() {
            const ticketQuantity = document.getElementById('ticketQuantity').value;
            const pricePerTicket = {{ $event->price }};
            const totalPrice = ticketQuantity * pricePerTicket;

            document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
        }

        function increaseQuantity() {
            const ticketQuantity = document.getElementById('ticketQuantity');
            ticketQuantity.value = parseInt(ticketQuantity.value) + 1;
            updateTotalPrice();
        }

        function decreaseQuantity() {
            const ticketQuantity = document.getElementById('ticketQuantity');
            if (parseInt(ticketQuantity.value) > 1) {
                ticketQuantity.value = parseInt(ticketQuantity.value) - 1;
                updateTotalPrice();
            }
        }
    </script>
</x-public-layout>
