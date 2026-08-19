<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-white">🎭 Upcoming Shows</h1>
    </x-slot>

    <div class="max-w-6xl mx-auto">
        <form method="GET" class="mb-8">
            <input
                name="q"
                value="{{ request('q') }}"
                placeholder="Search shows, venues, or actors"
                class="w-full rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-white"
            >
        </form>

        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-semibold text-white">Upcoming Shows</h2>

            <span class="text-gray-400">
                {{ $shows->total() }} show(s)
            </span>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            @forelse ($shows as $show)
                <a
                    href="{{ route('shows.show', $show->slug) }}"
                    class="block rounded-2xl border border-gray-800 bg-[#16161d] p-6 transition hover:border-[#D4AF37]"
                >
                    <div class="mb-4 text-4xl">🎭</div>

                    <h2 class="text-2xl font-bold text-white">
                        {{ $show->title }}
                    </h2>

                    <p class="mt-3 text-gray-400">
                        📍 {{ $show->venue?->name ?? 'No venue assigned' }}
                    </p>

                    <p class="mt-3 text-yellow-400">
                        ★ {{ number_format($show->reviews_avg_rating ?? 0, 1) }}
                        <span class="text-gray-500">
                            ({{ $show->reviews_count }})
                        </span>
                    </p>
                </a>
            @empty
                <div class="col-span-2 rounded-2xl bg-[#16161d] p-10 text-center">
                    <h2 class="text-2xl text-white">No shows found</h2>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $shows->links() }}
        </div>
    </div>
</x-app-layout>