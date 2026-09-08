<x-app-layout>

<div class="min-h-screen bg-[#F4F0EA] text-[#2D2926] py-10">

<div class="max-w-7xl mx-auto px-6">

    <!-- Header -->

    <div class="mb-10">

        <h1 class="text-4xl font-bold">
            Welcome back, {{ Auth::user()->name }} 👋
        </h1>

        <p class="text-[#746D64] mt-2">
            Manage your theatre operations from one place.
        </p>

    </div>

    <!-- Statistics -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-[#FFFCF7] rounded-3xl p-6 border border-[#D8CEC1]">

            <div class="text-4xl mb-4">
                🎭
            </div>

            <h3 class="text-[#746D64]">
                Shows
            </h3>

            <p class="text-4xl font-bold mt-2">
                24
            </p>

            <p class="text-sm text-green-400 mt-2">
                Active productions
            </p>

        </div>

        <div class="bg-[#FFFCF7] rounded-3xl p-6 border border-[#D8CEC1]">

            <div class="text-4xl mb-4">
                👥
            </div>

            <h3 class="text-[#746D64]">
                Actors
            </h3>

            <p class="text-4xl font-bold mt-2">
                128
            </p>

            <p class="text-sm text-[#746D64] mt-2">
                Registered artists
            </p>

        </div>

        <div class="bg-[#FFFCF7] rounded-3xl p-6 border border-[#D8CEC1]">

            <div class="text-4xl mb-4">
                🏛️
            </div>

            <h3 class="text-[#746D64]">
                Venues
            </h3>

            <p class="text-4xl font-bold mt-2">
                6
            </p>

            <p class="text-sm text-[#746D64] mt-2">
                Available locations
            </p>

        </div>

        <div class="bg-[#FFFCF7] rounded-3xl p-6 border border-[#D8CEC1]">

            <div class="text-4xl mb-4">
                🎟️
            </div>

            <h3 class="text-[#746D64]">
                Bookings
            </h3>

            <p class="text-4xl font-bold mt-2">
                542
            </p>

            <p class="text-sm text-yellow-400 mt-2">
                This month
            </p>

        </div>


    </div>
    <!-- Quick Actions -->

    <div class="mt-12">


        <h2 class="text-2xl font-semibold mb-6">
            Quick Actions
        </h2>


        <div class="grid md:grid-cols-3 gap-6">

            <a href="{{ route('shows.create') }}"
               class="bg-[#A34A3E] hover:bg-red-700
               rounded-2xl p-6 transition">


                <div class="text-3xl mb-3">
                    🎬
                </div>

                <h3 class="text-xl font-semibold">
                    Create Show
                </h3>

                <p class="text-red-100 mt-2">
                    Add a new theatre production
                </p>


            </a>

            <a href="{{ route('actors.create') }}"
               class="bg-[#FFFCF7] border border-[#D8CEC1]
               hover:border-[#B7791F]
               rounded-2xl p-6 transition">


                <div class="text-3xl mb-3">
                    👤
                </div>

                <h3 class="text-xl font-semibold">
                    Add Actor
                </h3>

                <p class="text-[#746D64] mt-2">
                    Register new performers
                </p>


            </a>

            <a href="{{ route('venues.create') }}"
               class="bg-[#FFFCF7] border border-[#D8CEC1]
               hover:border-[#B7791F]
               rounded-2xl p-6 transition">


                <div class="text-3xl mb-3">
                    🏛️
                </div>

                <h3 class="text-xl font-semibold">
                    Manage Venues
                </h3>

                <p class="text-[#746D64] mt-2">
                    Update theatre locations
                </p>


            </a>


        </div>


    </div>





    <!-- Recent Shows -->


    <div class="mt-12">


        <h2 class="text-2xl font-semibold mb-6">
            Recent Shows
        </h2>



        <div class="bg-[#FFFCF7] border border-[#D8CEC1] rounded-3xl overflow-hidden">


            @foreach([
                ['Hamlet','Drama','Royal Theatre'],
                ['Macbeth','Tragedy','Grand Hall'],
                ['Wicked','Musical','City Theatre']
            ] as $show)


            <div class="flex justify-between items-center
                        p-6 border-b border-[#D8CEC1]">


                <div>

                    <h3 class="font-semibold text-lg">
                        {{ $show[0] }}
                    </h3>

                    <p class="text-[#746D64]">
                        {{ $show[1] }}
                    </p>

                </div>


                <span class="text-[#B7791F]">
                    {{ $show[2] }}
                </span>


            </div>


            @endforeach


        </div>


    </div>




</div>


</div>


</x-app-layout>