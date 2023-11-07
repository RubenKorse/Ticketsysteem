<x-admin-layout>
    <div class="container mx-auto">
        <div class="bg-white p-8 rounded shadow-lg w-1/3">
        @if (session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
            <form action="{{ route('admin.update', $event) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" class="form-input rounded-md w-full" value="{{ $event->title }}">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <input id="description" type="hidden" name="description">
                    <trix-editor input="description">{{ $event->description }}</trix-editor>
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                    <input type="date" id="date" name="date" class="form-input rounded-md w-full" value="{{ $event->date }}">
                </div>

                <div class="mb-4">
                    <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time:</label>
                    <input type="time" id="time" name="time" class="form-input rounded-md w-full" value="{{ $event->time }}">
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" class="form-input rounded-md w-full" value="{{ $event->location }}">
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                    <select id="category" name="category" class="form-select rounded-md w-full">
                        <option value="sports" {{ $event->category == 'sports' ? 'selected' : '' }}>Sports</option>
                        <option value="festivals" {{ $event->category == 'festivals' ? 'selected' : '' }}>Festivals</option>
                        <option value="films" {{ $event->category == 'films' ? 'selected' : '' }}>Films</option>
                    </select>
                </div>
                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
