<x-app-layout>

    <x-slot name="header">
        <h1 class="text-3xl font-bold text-[#2D2926]">
            My Bookings
        </h1>
    </x-slot>

    <div class="max-w-6xl mx-auto">

        @if($bookings->isEmpty())

            <div class="bg-[#FFFCF7] rounded-2xl p-12 text-center">

                <h2 class="text-2xl font-semibold text-[#2D2926] mb-2">
                    No Bookings Yet
                </h2>

                <p class="text-[#746D64] mb-8">
                    You haven't booked any theatre shows.
                </p>

                <a href="{{ route('shows.index') }}"
                   class="inline-block bg-[#A34A3E] hover:bg-red-700 text-white px-6 py-3 rounded-xl transition">

                    Browse Shows

                </a>

            </div>

        @else

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($bookings as $booking)

                    <a href="{{ route('bookings.show', $booking->id) }}"
                       class="bg-[#FFFCF7] rounded-2xl p-6 border border-[#D8CEC1] hover:border-[#A34A3E] transition">

                        <div class="flex justify-between items-start">

                            <div>

                                <h2 class="text-xl font-bold text-[#2D2926]">
                                    {{ $booking->show->title }}
                                </h2>

                                <p class="text-[#746D64] mt-1">
                                    {{ $booking->show->venue->name }}
                                </p>

                            </div>

                            <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full">
                                Confirmed
                            </span>

                        </div>

                        <div class="mt-6 space-y-2 text-[#554E47]">

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