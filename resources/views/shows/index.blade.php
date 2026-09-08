<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-[#B7791F]">Live theatre, Thailand</p>
            <h1 class="mt-1 text-3xl font-bold tracking-tight text-[#2D2926]">Discover what’s on stage</h1>
        </div>
    </x-slot>

    <div class="mx-auto max-w-6xl">
        <section class="mb-8 overflow-hidden rounded-3xl border border-[#B7791F]/20 bg-gradient-to-br from-[#F1D8D3] via-[#EEE6DB] to-[#FFFCF7] p-6 sm:p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#B7791F]">Plan your next night out</p>
            <h2 class="mt-3 max-w-2xl text-3xl font-bold tracking-tight text-[#2D2926] sm:text-4xl">Find a production, then make it yours.</h2>
            <p class="mt-3 max-w-xl text-[#554E47]">Explore productions, venues, and the people who make theatre happen. Save a show or log the performance you saw.</p>
        </section>

        <form method="GET" class="mb-8 rounded-2xl border border-[#D8CEC1] bg-[#FFFCF7] p-4" role="search">
            <label for="show-search" class="sr-only">Search productions, venues, or people</label>
            <div class="flex flex-col gap-3 sm:flex-row">
                <input id="show-search" name="q" value="{{ request('q') }}" placeholder="Search productions, venues, or people" class="min-h-12 flex-1 rounded-xl border-[#CFC4B6] bg-[#F4F0EA] px-4 text-[#2D2926] placeholder:text-[#746D64] focus:border-[#B7791F] focus:ring-[#B7791F]">
                <select name="genre" aria-label="Filter by genre" class="min-h-12 rounded-xl border-[#CFC4B6] bg-[#F4F0EA] px-4 text-[#2D2926] focus:border-[#B7791F] focus:ring-[#B7791F]">
                    <option value="">All genres</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre }}" @selected(request('genre') === $genre)>{{ $genre }}</option>
                    @endforeach
                </select>
                <button class="min-h-12 rounded-xl bg-[#A34A3E] px-5 font-semibold text-white transition hover:bg-[#8A3B32] focus:outline-none focus:ring-2 focus:ring-[#B7791F] focus:ring-offset-2 focus:ring-offset-[#FFFCF7]">Search</button>
            </div>
        </form>

        <div class="mb-5 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-[#2D2926]">Upcoming productions</h2>
                <p class="mt-1 text-sm text-[#746D64]">{{ $shows->total() }} {{ Str::plural('production', $shows->total()) }} to explore</p>
            </div>
            @if (request()->hasAny(['q', 'genre']))
                <a href="{{ route('shows.index') }}" class="text-sm font-medium text-[#B7791F] underline underline-offset-4">Clear filters</a>
            @endif
        </div>

        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
            @forelse ($shows as $show)
                <article class="group overflow-hidden rounded-2xl border border-[#D8CEC1] bg-[#FFFCF7] transition hover:-translate-y-0.5 hover:border-[#B7791F]/70">
                    <a href="{{ route('shows.show', $show->slug) }}" class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-[#B7791F]">
                        <div class="relative aspect-[2/3] overflow-hidden bg-gradient-to-br from-[#F1D8D3] via-[#F1D8D3] to-[#EEE6DB]">
                            @if ($show->poster_image)
                                <img src="{{ $show->poster_image }}" alt="Poster for {{ $show->title }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            @else
                                <div class="flex h-full flex-col justify-end p-6">
                                    <span class="mb-auto text-xs font-semibold uppercase tracking-[0.2em] text-[#B7791F]">Stagebook</span>
                                    <span class="text-3xl font-bold leading-tight text-[#2D2926]">{{ $show->title }}</span>
                                </div>
                            @endif
                            <span class="absolute right-3 top-3 rounded-full bg-[#F4F0EA]/90 px-3 py-1 text-xs font-semibold text-[#2D2926]">{{ $show->start_date?->isFuture() ? 'Opening soon' : 'Now playing' }}</span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-[#2D2926]">{{ $show->title }}</h3>
                            <p class="mt-2 text-sm text-[#554E47]">{{ $show->venue?->name ?? 'Venue to be announced' }}</p>
                            <p class="mt-1 text-sm text-[#746D64]">
                                @if ($show->start_date)
                                    {{ $show->start_date->format('d M Y') }}@if ($show->end_date) – {{ $show->end_date->format('d M Y') }}@endif
                                @else
                                    Dates to be announced
                                @endif
                            </p>
                            <p class="mt-4 text-sm text-[#B7791F]" aria-label="Rated {{ number_format($show->reviews_avg_rating ?? 0, 1) }} out of 5 from {{ $show->reviews_count }} reviews">★ {{ number_format($show->reviews_avg_rating ?? 0, 1) }} <span class="text-[#746D64]">{{ $show->reviews_count }} reviews</span></p>
                        </div>
                    </a>
                </article>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-[#D8CEC1] bg-[#FFFCF7] p-10 text-center">
                    <h2 class="text-xl font-bold text-[#2D2926]">No productions found</h2>
                    <p class="mt-2 text-[#746D64]">Try another search or clear your filters.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">{{ $shows->links() }}</div>
    </div>
</x-app-layout>
