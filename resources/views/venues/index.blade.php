<x-app-layout>

    <x-slot name="header">
        <h1 class="text-3xl font-bold text-white">
            🏛 Venues
        </h1>
    </x-slot>

    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-8">

            <h2 class="text-2xl font-semibold">
                All Venues
            </h2>

        </div>

        <div class="grid md:grid-cols-2 gap-6">

            @forelse($venues as $venue)

                <a href="{{ route('venues.show', $venue) }}"
                   class="bg-[#16161d] border border-gray-800 rounded-2xl p-6 hover:border-[#D4AF37]">

                    <div class="text-4xl mb-4">
                        🏛️
                    </div>

                    <h2 class="text-2xl font-bold">
                        {{ $venue->name }}
                    </h2>

                    <p class="text-gray-400 mt-2">
                        📍 {{ $venue->address }}
                    </p>

                    <p class="mt-4 text-gray-500">
                        {{ $venue->shows->count() }} shows
                    </p>

                </a>

            @empty

                <div class="col-span-2 bg-[#16161d] rounded-2xl p-10 text-center">

                    No venues available

                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>