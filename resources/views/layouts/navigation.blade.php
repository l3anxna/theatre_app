<aside class="w-72 min-h-screen bg-[#16161d] border-r border-gray-800 flex flex-col">

    <!-- Logo -->
    <div class="px-8 py-8 border-b border-gray-800">

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3">

            <span class="text-4xl">🎭</span>

            <div>
                <h1 class="text-white font-bold text-xl">
                    Theatre Manager
                </h1>

                <p class="text-gray-400 text-sm">
                    Administration
                </p>
            </div>

        </a>

    </div>


    <!-- Navigation -->

    <nav class="flex-1 px-5 py-8 space-y-2">

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           {{ request()->routeIs('admin.dashboard')
                ? 'bg-[#C62828] text-white'
                : 'text-gray-400 hover:bg-[#22222b] hover:text-white' }}">

            <span>🏠</span>
            <span>Dashboard</span>

        </a>

        <a href="{{ route('shows.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-[#22222b] hover:text-white">

            <span>🎬</span>
            <span>Shows</span>

        </a>

        <a href="{{ route('actors.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-[#22222b] hover:text-white">

            <span>👥</span>
            <span>Actors</span>

        </a>

        <a href="{{ route('venues.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-[#22222b] hover:text-white">

            <span>🏛️</span>
            <span>Venues</span>

        </a>

        <a href="{{ route('bookings.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-[#22222b] hover:text-white">

            <span>🎟️</span>
            <span>Bookings</span>

        </a>

    </nav>


    <!-- User -->

    <div class="border-t border-gray-800 p-6">

        @auth

            <div class="mb-5">

                <h3 class="text-white font-semibold">
                    {{ Auth::user()->name }}
                </h3>

                <p class="text-gray-400 text-sm">
                    {{ Auth::user()->email }}
                </p>

            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    class="w-full bg-[#C62828] hover:bg-red-700
                    rounded-xl py-3 transition">

                    Logout

                </button>

            </form>

        @endauth

    </div>

</aside>