<x-admin-layout>
    <div class="flex justify-center items-center h-screen mt-20">
        <div class="bg-white p-8 rounded shadow-lg w-1/3 max-h-schreen">

            <form action="{{ route('admin.update', $event) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" class="form-input rounded-md w-full" value="{{ old('title', $event->title) }}">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <input id="description" type="hidden" name="description" value="{{ old('description', $event->description) }}">
                    <trix-editor input="description">{{ $event->description }}</trix-editor>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                    <input type="date" id="date" name="date" class="form-input rounded-md w-full" value="{{ old('date', $event->date) }}">
                    @error('date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time:</label>
                    <input type="time" id="time" name="time" class="form-input rounded-md w-full" value="{{ old('time', $event->time) }}">
                    @error('time')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" class="form-input rounded-md w-full" value="{{ old('location', $event->location) }}">
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                    <select id="category" name="category" class="form-select rounded-md w-full">
                        <option value="sports" {{ old('category', $event->category) == 'sports' ? 'selected' : '' }}>Sports</option>
                        <option value="festivals" {{ old('category', $event->category) == 'festivals' ? 'selected' : '' }}>Festivals</option>
                        <option value="films" {{ old('category', $event->category) == 'films' ? 'selected' : '' }}>Films</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                    <input type="number" step="0.01" id="price" name="price" class="form-input rounded-md w-full" value="{{ old('price', $event->price) }}" placeholder="Enter the price">
                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
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
