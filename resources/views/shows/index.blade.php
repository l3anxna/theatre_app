<x-app-layout>

    <x-slot name="header">
        <h1 class="text-3xl font-bold text-white">
            🎭 Shows
        </h1>
    </x-slot>

    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-8">

            <h2 class="text-2xl font-semibold text-white">
                Upcoming Shows
            </h2>

            <span class="text-gray-400">
                {{ $shows->count() }} show(s)
            </span>

        </div>

        <div class="grid md:grid-cols-2 gap-6">

            @forelse($shows as $show)

                <a href="{{ route('shows.show', $show) }}">
                   class="bg-[#16161d] border border-gray-800 rounded-2xl p-6 hover:border-[#D4AF37] transition">

                    <div class="text-4xl mb-4">
                        🎭
                    </div>

                    <h2 class="text-2xl font-bold text-white">
                        {{ $show->title }}
                    </h2>

                    <p class="text-gray-400 mt-3">
                        📍 {{ $show->venue?->name ?? 'No venue assigned' }}
                    </p>

                </a>

            @empty

                <div class="col-span-2 bg-[#16161d] rounded-2xl p-10 text-center">

                    <h2 class="text-2xl text-white">
                        No shows found
                    </h2>

                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>