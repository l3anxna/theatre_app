<x-app-layout>

    <x-slot name="header">
        <h1 class="text-3xl font-bold text-white">
            My Bookings
        </h1>
    </x-slot>

    <div class="max-w-6xl mx-auto">

        @if($bookings->isEmpty())

            <div class="bg-[#16161d] rounded-2xl p-12 text-center">

                <h2 class="text-2xl font-semibold text-white mb-2">
                    No Bookings Yet
                </h2>

                <p class="text-gray-400 mb-8">
                    You haven't booked any theatre shows.
                </p>

                <a href="{{ route('shows.index') }}"
                   class="inline-block bg-[#C62828] hover:bg-red-700 text-white px-6 py-3 rounded-xl transition">

                    Browse Shows

                </a>

            </div>

        @else

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($bookings as $booking)

                    <a href="{{ route('bookings.show', $booking->id) }}"
                       class="bg-[#16161d] rounded-2xl p-6 border border-gray-800 hover:border-[#C62828] transition">

                        <div class="flex justify-between items-start">

                            <div>

                                <h2 class="text-xl font-bold text-white">
                                    {{ $booking->show->title }}
                                </h2>

                                <p class="text-gray-400 mt-1">
                                    {{ $booking->show->venue->name }}
                                </p>

                            </div>

                            <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full">
                                Confirmed
                            </span>

                        </div>

                        <div class="mt-6 space-y-2 text-gray-300">

                            <p>
                                🎫 {{ $booking->tickets }} Ticket(s)
                            </p>

                            <p>
                                💺 Seat {{ $booking->seat_number }}
                            </p>

                            <p>
                                👤 {{ $booking->customer_name }}
                            </p>

                        </div>

                    </a>

                @endforeach

            </div>

        @endif

    </div>

</x-app-layout>