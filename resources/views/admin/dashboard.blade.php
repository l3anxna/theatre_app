<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Theatre Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-900 min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <a href="/admin/shows"
                   class="bg-gray-800 p-6 rounded-xl hover:bg-gray-700 transition">
                    <h3 class="text-2xl font-bold mb-2">
                        Shows
                    </h3>

                    <p>
                        Manage theatre shows
                    </p>
                </a>

                <a href="/admin/actors"
                   class="bg-gray-800 p-6 rounded-xl hover:bg-gray-700 transition">
                    <h3 class="text-2xl font-bold mb-2">
                        Actors
                    </h3>

                    <p>
                        Manage actors
                    </p>
                </a>

                <a href="/admin/venues"
                   class="bg-gray-800 p-6 rounded-xl hover:bg-gray-700 transition">
                    <h3 class="text-2xl font-bold mb-2">
                        Venues
                    </h3>

                    <p>
                        Manage theatre venues
                    </p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>