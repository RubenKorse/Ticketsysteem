<x-admin-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded shadow-lg w-1/3 max-h-full">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" class="form-input rounded-md w-full">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <input id="description" type="hidden" name="description">
                    <trix-editor input="description"></trix-editor>
                </div>

                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                    <input type="date" id="date" name="date" class="form-input rounded-md w-full">
                </div>

                <div class="mb-4">
                    <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Time:</label>
                    <input type="time" id="time" name="time" class="form-input rounded-md w-full">
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" class="form-input rounded-md w-full">
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                    <select id="category" name="category" class="form-select rounded-md w-full">
                        <option value="Sport">Sport</option>
                        <option value="Festivals">Festivals</option>
                        <option value="Films">Films</option>
                    </select>
                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Create Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
