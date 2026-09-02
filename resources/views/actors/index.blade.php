<x-app-layout>

    <x-slot name="header">
        <h1 class="text-3xl font-bold text-[#2D2926]">
            👥 Actors
        </h1>
    </x-slot>

    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-8">

            <h2 class="text-2xl font-semibold">
                Cast Members
            </h2>

        </div>

        <div class="grid md:grid-cols-3 gap-6">

            @forelse($actors as $actor)

                <a href="{{ route('actors.show', $actor) }}"
                   class="bg-[#FFFCF7] border border-[#D8CEC1] rounded-2xl p-6 text-center hover:border-[#B7791F]">

                    <div class="w-20 h-20 rounded-full bg-[#A34A3E] flex items-center justify-center mx-auto text-3xl">

                        👤

                    </div>

                    <h2 class="mt-5 text-xl font-bold">

                        {{ $actor->name }}

                    </h2>

                    @if($actor->role)

                        <p class="text-[#746D64] mt-2">

                            {{ $actor->role }}

                        </p>

                    @endif

                </a>

            @empty

                <div class="col-span-3 bg-[#FFFCF7] rounded-2xl p-10 text-center">

                    No actors found

                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>