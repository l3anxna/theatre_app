@php
    $isAdminArea = request()->routeIs('admin.*');
@endphp

<aside class="hidden min-h-screen w-72 flex-col border-r border-[#D8CEC1] bg-stage-surface lg:flex">
    <div class="px-8 py-8 border-b border-[#D8CEC1]">
        <a href="{{ $isAdminArea ? route('admin.dashboard') : route('home') }}" class="flex items-center gap-3">
            <span class="grid h-11 w-11 place-items-center rounded-xl bg-[#A34A3E] text-xl text-white" aria-hidden="true">S</span>
            <div>
                <h1 class="text-stage-text font-bold text-xl">Stagebook</h1>
                <p class="text-stage-muted text-sm">{{ $isAdminArea ? 'Administration' : 'Live theatre, Thailand' }}</p>
            </div>
        </a>
    </div>

    <nav class="flex-1 px-5 py-8 space-y-2">
        @if ($isAdminArea)
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-[#A34A3E] text-white' : 'text-stage-muted hover:bg-stage-elevated hover:text-stage-text' }}"><span>🏠</span><span>Dashboard</span></a>
            <a href="{{ route('admin.shows.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.shows.*') ? 'bg-[#A34A3E] text-white' : 'text-stage-muted hover:bg-stage-elevated hover:text-stage-text' }}"><span>🎬</span><span>Manage shows</span></a>
            <a href="{{ route('admin.actors.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.actors.*') ? 'bg-[#A34A3E] text-white' : 'text-stage-muted hover:bg-stage-elevated hover:text-stage-text' }}"><span>👥</span><span>Manage actors</span></a>
            <a href="{{ route('admin.venues.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.venues.*') ? 'bg-[#A34A3E] text-white' : 'text-stage-muted hover:bg-stage-elevated hover:text-stage-text' }}"><span>🏛️</span><span>Manage venues</span></a>
        @else
            <a href="{{ route('shows.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('shows.*', 'home') ? 'bg-[#A34A3E] text-white' : 'text-stage-muted hover:bg-stage-elevated hover:text-stage-text' }}"><span aria-hidden="true">✦</span><span>Discover</span></a>
            <a href="{{ route('actors.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('actors.*') ? 'bg-[#A34A3E] text-white' : 'text-stage-muted hover:bg-stage-elevated hover:text-stage-text' }}"><span aria-hidden="true">◎</span><span>People</span></a>
            <a href="{{ route('venues.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('venues.*') ? 'bg-[#A34A3E] text-white' : 'text-stage-muted hover:bg-stage-elevated hover:text-stage-text' }}"><span aria-hidden="true">⌖</span><span>Venues</span></a>
            @auth
                <a href="{{ route('bookings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('bookings.*') ? 'bg-[#A34A3E] text-white' : 'text-stage-muted hover:bg-stage-elevated hover:text-stage-text' }}"><span>🎟️</span><span>My bookings</span></a>
            @endauth
        @endif
    </nav>

    <div class="border-t border-[#D8CEC1] p-6">
        @auth
            <div class="mb-5">
                <a href="{{ route('profiles.show', Auth::user()) }}" class="font-semibold text-stage-text hover:text-stage-accent">{{ Auth::user()->name }}</a>
                <p class="text-stage-muted text-sm">{{ Auth::user()->email }}</p>
            </div>

            @if (Auth::user()->role === 'admin' && ! $isAdminArea)
                <a href="{{ route('admin.dashboard') }}" class="mb-3 block rounded-xl border border-[#A34A3E] px-4 py-3 text-center text-sm font-medium text-red-300 hover:bg-[#A34A3E] hover:text-white">Open admin dashboard</a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full rounded-xl bg-[#A34A3E] py-3 text-white transition hover:bg-[#8A3B32]">Logout</button>
            </form>
        @else
            <p class="text-center text-sm text-stage-muted">Log in from the header to save productions and write reviews.</p>
        @endauth
    </div>
</aside>

@unless ($isAdminArea)
    <nav aria-label="Mobile navigation" class="fixed inset-x-0 bottom-0 z-40 flex h-16 items-center justify-around border-t border-[#D8CEC1] bg-stage-surface/95 px-2 backdrop-blur lg:hidden">
        <a href="{{ route('shows.index') }}" class="rounded-lg px-3 py-2 text-center text-xs {{ request()->routeIs('shows.*', 'home') ? 'text-[#2D2926]' : 'text-stage-muted' }}"><span class="block text-base" aria-hidden="true">✦</span>Discover</a>
        <a href="{{ route('venues.index') }}" class="rounded-lg px-3 py-2 text-center text-xs {{ request()->routeIs('venues.*') ? 'text-[#2D2926]' : 'text-stage-muted' }}"><span class="block text-base" aria-hidden="true">⌖</span>Venues</a>
        @auth
            <a href="{{ route('bookings.index') }}" class="rounded-lg px-3 py-2 text-center text-xs {{ request()->routeIs('bookings.*') ? 'text-[#2D2926]' : 'text-stage-muted' }}"><span class="block text-base" aria-hidden="true">◫</span>Tickets</a>
        @else
            <a href="{{ route('login') }}" class="rounded-lg px-3 py-2 text-center text-xs text-stage-muted"><span class="block text-base" aria-hidden="true">◉</span>Log in</a>
        @endauth
        <a href="{{ route('actors.index') }}" class="rounded-lg px-3 py-2 text-center text-xs {{ request()->routeIs('actors.*') ? 'text-[#2D2926]' : 'text-stage-muted' }}"><span class="block text-base" aria-hidden="true">◎</span>People</a>
    </nav>
@endunless
