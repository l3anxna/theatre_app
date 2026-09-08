<x-app-layout>

    <x-slot name="header">
        <h1 class="text-3xl font-bold text-[#2D2926]">
            Booking Details
        </h1>
    </x-slot>

    <div class="max-w-4xl mx-auto">

        <div class="bg-[#FFFCF7] rounded-2xl border border-[#D8CEC1] overflow-hidden">

            <div class="p-8 border-b border-[#D8CEC1]">

                <h2 class="text-3xl font-bold text-[#2D2926]">
                    {{ $booking->show->title }}
                </h2>

                <p class="text-[#746D64] mt-2">
                    {{ $booking->show->venue->name }}
                </p>

            </div>

            <div class="grid md:grid-cols-2 gap-8 p-8">

                <div>

                    <h3 class="text-xl font-semibold text-[#2D2926] mb-4">
                        Customer
                    </h3>

                    <div class="space-y-3 text-[#554E47]">

                        <p>
                            <strong>Name:</strong>
                            {{ $booking->customer_name }}
                        </p>

                        <p>
                            <strong>Email:</strong>
                            {{ $booking->customer_email }}
                        </p>

                    </div>

                </div>

                <div>

                    <h3 class="text-xl font-semibold text-[#2D2926] mb-4">
                        Ticket Information
                    </h3>

                    <div class="space-y-3 text-[#554E47]">

                        <p>
                            <strong>Seat:</strong>
                            {{ $booking->seat_number }}
                        </p>

                        <p>
                            <strong>Tickets:</strong>
                            {{ $booking->tickets }}
                        </p>

                        <p>
                            <strong>Status:</strong>

                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm">
                                Confirmed
                            </span>

                        </p>

                    </div>

                </div>

            </div>

            <div class="border-t border-[#D8CEC1] p-8 flex justify-between">

                <a href="{{ route('bookings.index') }}"
                   class="text-[#746D64] hover:text-[#2D2926]">

                    ← Back to Bookings

                </a>

                <a href="{{ route('shows.show', $booking->show->slug) }}"
                   class="bg-[#A34A3E] hover:bg-red-700 text-white px-5 py-3 rounded-xl">

                    View Show

                </a>

            </div>

        </div>

    </div>

</x-app-layout>