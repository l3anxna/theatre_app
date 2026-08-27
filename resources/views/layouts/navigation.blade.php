@php
    $isAdminArea = request()->routeIs('admin.*');
@endphp

<aside class="hidden min-h-screen w-72 flex-col border-r border-white/10 bg-[#17191f] lg:flex">
    <div class="px-8 py-8 border-b border-gray-800">
        <a href="{{ $isAdminArea ? route('admin.dashboard') : route('home') }}" class="flex items-center gap-3">
            <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#c93d3d] text-xl" aria-hidden="true">S</span>
            <div>
                <h1 class="text-white font-bold text-xl">Stagebook</h1>
                <p class="text-gray-400 text-sm">{{ $isAdminArea ? 'Administration' : 'Live theatre, Thailand' }}</p>
            </div>
        </a>
    </div>

    <nav class="flex-1 px-5 py-8 space-y-2">
        @if ($isAdminArea)
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-[#C62828] text-white' : 'text-gray-400 hover:bg-[#22222b] hover:text-white' }}"><span>🏠</span><span>Dashboard</span></a>
            <a href="{{ route('admin.shows.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.shows.*') ? 'bg-[#C62828] text-white' : 'text-gray-400 hover:bg-[#22222b] hover:text-white' }}"><span>🎬</span><span>Manage shows</span></a>
            <a href="{{ route('admin.actors.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.actors.*') ? 'bg-[#C62828] text-white' : 'text-gray-400 hover:bg-[#22222b] hover:text-white' }}"><span>👥</span><span>Manage actors</span></a>
            <a href="{{ route('admin.venues.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.venues.*') ? 'bg-[#C62828] text-white' : 'text-gray-400 hover:bg-[#22222b] hover:text-white' }}"><span>🏛️</span><span>Manage venues</span></a>
        @else
            <a href="{{ route('shows.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('shows.*', 'home') ? 'bg-[#C62828] text-white' : 'text-gray-400 hover:bg-[#22222b] hover:text-white' }}"><span aria-hidden="true">✦</span><span>Discover</span></a>
            <a href="{{ route('actors.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('actors.*') ? 'bg-[#C62828] text-white' : 'text-gray-400 hover:bg-[#22222b] hover:text-white' }}"><span aria-hidden="true">◎</span><span>People</span></a>
            <a href="{{ route('venues.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('venues.*') ? 'bg-[#C62828] text-white' : 'text-gray-400 hover:bg-[#22222b] hover:text-white' }}"><span aria-hidden="true">⌖</span><span>Venues</span></a>
            @auth
                <a href="{{ route('bookings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('bookings.*') ? 'bg-[#C62828] text-white' : 'text-gray-400 hover:bg-[#22222b] hover:text-white' }}"><span>🎟️</span><span>My bookings</span></a>
            @endauth
        @endif
    </nav>

    <div class="border-t border-gray-800 p-6">
        @auth
            <div class="mb-5">
                <a href="{{ route('profiles.show', Auth::user()) }}" class="font-semibold text-white hover:text-[#e4bd58]">{{ Auth::user()->name }}</a>
                <p class="text-gray-400 text-sm">{{ Auth::user()->email }}</p>
            </div>

            @if (Auth::user()->role === 'admin' && ! $isAdminArea)
                <a href="{{ route('admin.dashboard') }}" class="mb-3 block rounded-xl border border-[#C62828] px-4 py-3 text-center text-sm font-medium text-red-300 hover:bg-[#C62828] hover:text-white">Open admin dashboard</a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full bg-[#C62828] hover:bg-red-700 rounded-xl py-3 transition">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block w-full rounded-xl bg-[#C62828] py-3 text-center font-medium hover:bg-red-700">Log in</a>
        @endauth
    </div>
</aside>

@unless ($isAdminArea)
    <nav aria-label="Mobile navigation" class="fixed inset-x-0 bottom-0 z-40 flex h-16 items-center justify-around border-t border-white/10 bg-[#17191f]/95 px-2 backdrop-blur lg:hidden">
        <a href="{{ route('shows.index') }}" class="rounded-lg px-3 py-2 text-center text-xs {{ request()->routeIs('shows.*', 'home') ? 'text-white' : 'text-gray-400' }}"><span class="block text-base" aria-hidden="true">✦</span>Discover</a>
        <a href="{{ route('venues.index') }}" class="rounded-lg px-3 py-2 text-center text-xs {{ request()->routeIs('venues.*') ? 'text-white' : 'text-gray-400' }}"><span class="block text-base" aria-hidden="true">⌖</span>Venues</a>
        @auth
            <a href="{{ route('bookings.index') }}" class="rounded-lg px-3 py-2 text-center text-xs {{ request()->routeIs('bookings.*') ? 'text-white' : 'text-gray-400' }}"><span class="block text-base" aria-hidden="true">◫</span>Tickets</a>
        @else
            <a href="{{ route('login') }}" class="rounded-lg px-3 py-2 text-center text-xs text-gray-400"><span class="block text-base" aria-hidden="true">◉</span>Log in</a>
        @endauth
        <a href="{{ route('actors.index') }}" class="rounded-lg px-3 py-2 text-center text-xs {{ request()->routeIs('actors.*') ? 'text-white' : 'text-gray-400' }}"><span class="block text-base" aria-hidden="true">◎</span>People</a>
    </nav>
@endunless
