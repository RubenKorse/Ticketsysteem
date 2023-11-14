<x-admin-layout>
    @if (session('success'))
        <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-10">
    <div class="flex justify-between items-center m-5">
        <p class="text-3xl font-bold text-white transition duration-300">Events</p>
        <a href="{{ route('admin.create') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            Make a new event
        </a>
    </div>
    <div class="bg-gray-800 h-0.5">
    </div>


        <div class="bg-white dark:bg-gray-900 shadow-md overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-left text-xs leading-4 font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-left text-xs leading-4 font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-left text-xs leading-4 font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">category</th>
                        <th class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-left text-xs leading-4 font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-left text-xs leading-4 font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Time</th>
                        <th class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-left text-xs leading-4 font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-left text-xs leading-4 font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-left text-xs leading-4 font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Edit</th>
                        <th class="px-6 py-3 bg-gray-200 dark:bg-gray-600 text-left text-xs leading-4 font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Delet</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $event->title }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{!! $event->description !!}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $event->category }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $event->date->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $event->time }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $event->location }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $event->price }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap"><a href="{{ route('admin.edit', $event->id) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td class="px-6 py-4 whitespace-no-wrap"><a href="{{ route('admin.destroy', $event->id) }}" class="text-red-600 hover:text-red-900"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
