<x-app-layout>

    <x-slot name="header">
        <h1 class="text-3xl font-bold text-[#2D2926]">
            🏛 Venue Details
        </h1>
    </x-slot>

    <div class="max-w-6xl mx-auto">

        <!-- Venue Information -->
        <div class="bg-[#FFFCF7] rounded-3xl border border-[#D8CEC1] p-8">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-4xl font-bold text-[#2D2926]">
                        {{ $venue->name }}
                    </h2>

                    <p class="mt-3 text-[#746D64] flex items-center gap-2">
                        📍 {{ $venue->address }}
                    </p>

                </div>

                <div class="text-center bg-[#A34A3E] rounded-2xl px-6 py-4">

                    <p class="text-sm text-red-100">
                        Shows
                    </p>

                    <p class="text-3xl font-bold">
                        {{ $venue->shows->count() }}
                    </p>

                </div>

            </div>

            <div class="mt-8">

                <h3 class="text-xl font-semibold text-[#2D2926] mb-3">
                    About this Venue
                </h3>

                <p class="text-[#554E47] leading-7">
                    {{ $venue->description ?: 'No description available.' }}
                </p>

            </div>

        </div>



        <!-- Shows -->

        <div class="mt-10">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-[#2D2926]">
                    🎭 Scheduled Shows
                </h2>

                <span class="text-[#746D64]">
                    {{ $venue->shows->count() }} show(s)
                </span>

            </div>


            @forelse($venue->shows as $show)

                <div class="bg-[#FFFCF7] border border-[#D8CEC1] rounded-2xl p-6 mb-4 hover:border-[#B7791F] transition">

                    <div class="flex justify-between items-center">

                        <div>

                            <h3 class="text-xl font-semibold text-[#2D2926]">
                                {{ $show->title }}
                            </h3>

                            @if(isset($show->genre))
                                <p class="text-[#746D64] mt-2">
                                    🎬 {{ $show->genre }}
                                </p>
                            @endif

                        </div>

                        <a href="{{ route('shows.show', $show->slug) }}"
                           class="bg-[#A34A3E] hover:bg-red-700 transition px-5 py-2 rounded-xl">

                            View

                        </a>

                    </div>

                </div>

            @empty

                <div class="bg-[#FFFCF7] border border-[#D8CEC1] rounded-2xl p-10 text-center">

                    <div class="text-6xl mb-4">
                        🎭
                    </div>

                    <h3 class="text-xl font-semibold text-[#2D2926]">
                        No Shows Yet
                    </h3>

                    <p class="text-[#746D64] mt-2">
                        This venue doesn't have any scheduled performances.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>
