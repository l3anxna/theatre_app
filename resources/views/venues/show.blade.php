<x-app-layout>

    <x-slot name="header">
        <h1 class="text-3xl font-bold text-white">
            🏛 Venue Details
        </h1>
    </x-slot>

    <div class="max-w-6xl mx-auto">

        <!-- Venue Information -->
        <div class="bg-[#16161d] rounded-3xl border border-gray-800 p-8">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-4xl font-bold text-white">
                        {{ $venue->name }}
                    </h2>

                    <p class="mt-3 text-gray-400 flex items-center gap-2">
                        📍 {{ $venue->address }}
                    </p>

                </div>

                <div class="text-center bg-[#C62828] rounded-2xl px-6 py-4">

                    <p class="text-sm text-red-100">
                        Shows
                    </p>

                    <p class="text-3xl font-bold">
                        {{ $venue->shows->count() }}
                    </p>

                </div>

            </div>

            <div class="mt-8">

                <h3 class="text-xl font-semibold text-white mb-3">
                    About this Venue
                </h3>

                <p class="text-gray-300 leading-7">
                    {{ $venue->description ?: 'No description available.' }}
                </p>

            </div>

        </div>



        <!-- Shows -->

        <div class="mt-10">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-white">
                    🎭 Scheduled Shows
                </h2>

                <span class="text-gray-400">
                    {{ $venue->shows->count() }} show(s)
                </span>

            </div>


            @forelse($venue->shows as $show)

                <div class="bg-[#16161d] border border-gray-800 rounded-2xl p-6 mb-4 hover:border-[#D4AF37] transition">

                    <div class="flex justify-between items-center">

                        <div>

                            <h3 class="text-xl font-semibold text-white">
                                {{ $show->title }}
                            </h3>

                            @if(isset($show->genre))
                                <p class="text-gray-400 mt-2">
                                    🎬 {{ $show->genre }}
                                </p>
                            @endif

                        </div>

                        <a href="{{ route('shows.show', $show->slug) }}"
                           class="bg-[#C62828] hover:bg-red-700 transition px-5 py-2 rounded-xl">

                            View

                        </a>

                    </div>

                </div>

            @empty

                <div class="bg-[#16161d] border border-gray-800 rounded-2xl p-10 text-center">

                    <div class="text-6xl mb-4">
                        🎭
                    </div>

                    <h3 class="text-xl font-semibold text-white">
                        No Shows Yet
                    </h3>

                    <p class="text-gray-400 mt-2">
                        This venue doesn't have any scheduled performances.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>
