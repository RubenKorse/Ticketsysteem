<x-public-layout>
@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif
<div class="grid grid-cols-3 gap-4">
    @foreach($events as $event)
        <div class="bg-white p-4 shadow-md flex flex-col">
            <img src="https://picsum.photos/seed/{{ $event->id }}/800/600" alt="Event Image" class="w-full h-48 object-cover mb-4">

            <div class="flex flex-col flex-grow">
                <p class="font-bold text-xl mb-2">{{ $event->title }}</p>
                <p class="text-gray-600 text-lg mb-2">{{ $event->description }}</p>
                <p class="text-gray-600 text-lg"><i class="fa-solid fa-location-dot"></i> {{ $event->location }}</p>
                <div class="flex flex-row items-center justify-between mb-2">
                    <p class="text-gray-600 text-lg"><i class="fa-solid fa-calendar"></i> {{ $event->date->format('d-m-Y') }}</p>
                    <p class="text-gray-600 text-lg"><i class="fa-solid fa-clock"></i> {{ $event->time }}</p>
                    <p class="text-gray-600 text-lg"><i class="fa-solid fa-euro-sign"></i> {{ $event->price }}</p>
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out">Buy a ticket</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
</x-public-layout>
