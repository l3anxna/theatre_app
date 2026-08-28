<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-[#e4bd58]">Live theatre, Thailand</p>
            <h1 class="mt-1 text-3xl font-bold tracking-tight text-white">Discover what’s on stage</h1>
        </div>
    </x-slot>

    <div class="mx-auto max-w-6xl">
        <section class="mb-6 overflow-hidden rounded-2xl border border-stage-accent/40 bg-gradient-to-r from-stage-primary via-[#7d245f] to-stage-secondary px-5 py-4 shadow-lg shadow-black/25 sm:px-6 sm:py-5">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-stage-accent">Plan your next night out</p>
            <h2 class="mt-1 max-w-2xl text-2xl font-bold tracking-tight text-stage-text sm:text-3xl">Find a production, then make it yours.</h2>
            <p class="mt-2 max-w-2xl text-sm leading-6 text-white/95 sm:text-base">Explore productions, venues, and the people who make theatre happen. Save a show or log the performance you saw.</p>
        </section>

        <form method="GET" class="mb-8 rounded-2xl border border-white/10 bg-[#17191f] p-4" role="search">
            <label for="show-search" class="sr-only">Search productions, venues, or people</label>
            <div class="flex flex-col gap-3 sm:flex-row">
                <input id="show-search" name="q" value="{{ request('q') }}" placeholder="Search productions, venues, or people" class="min-h-12 flex-1 rounded-xl border-gray-700 bg-[#101114] px-4 text-white placeholder:text-gray-500 focus:border-[#e4bd58] focus:ring-[#e4bd58]">
                <select name="genre" aria-label="Filter by genre" class="min-h-12 rounded-xl border-gray-700 bg-[#101114] px-4 text-white focus:border-[#e4bd58] focus:ring-[#e4bd58]">
                    <option value="">All genres</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre }}" @selected(request('genre') === $genre)>{{ $genre }}</option>
                    @endforeach
                </select>
                <button class="min-h-12 rounded-xl bg-[#c93d3d] px-5 font-semibold text-white transition hover:bg-[#ae3030] focus:outline-none focus:ring-2 focus:ring-[#e4bd58] focus:ring-offset-2 focus:ring-offset-[#17191f]">Search</button>
            </div>
        </form>

        <div class="mb-5 flex items-end justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-white">Upcoming productions</h2>
                <p class="mt-1 text-sm text-gray-400">{{ $shows->total() }} {{ Str::plural('production', $shows->total()) }} to explore</p>
            </div>
            @if (request()->hasAny(['q', 'genre']))
                <a href="{{ route('shows.index') }}" class="text-sm font-medium text-[#e4bd58] underline underline-offset-4">Clear filters</a>
            @endif
        </div>

        <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
            @forelse ($shows as $show)
                <article class="group overflow-hidden rounded-2xl border border-white/10 bg-[#17191f] transition hover:-translate-y-0.5 hover:border-[#e4bd58]/70">
                    <a href="{{ route('shows.show', $show->slug) }}" class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-[#e4bd58]">
                        <div class="relative aspect-[2/3] overflow-hidden bg-gradient-to-br from-[#713331] via-[#34252a] to-[#18191d]">
                            @if ($show->poster_image)
                                <img src="{{ $show->poster_image }}" alt="Poster for {{ $show->title }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            @else
                                <div class="flex h-full flex-col justify-end p-6">
                                    <span class="mb-auto text-xs font-semibold uppercase tracking-[0.2em] text-[#e4bd58]">Stagebook</span>
                                    <span class="text-3xl font-bold leading-tight text-white">{{ $show->title }}</span>
                                </div>
                            @endif
                            <span class="absolute right-3 top-3 rounded-full bg-[#101114]/90 px-3 py-1 text-xs font-semibold text-white">{{ $show->start_date?->isFuture() ? 'Opening soon' : 'Now playing' }}</span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-white">{{ $show->title }}</h3>
                            <p class="mt-2 text-sm text-gray-300">{{ $show->venue?->name ?? 'Venue to be announced' }}</p>
                            <p class="mt-1 text-sm text-gray-400">
                                @if ($show->start_date)
                                    {{ $show->start_date->format('d M Y') }}@if ($show->end_date) – {{ $show->end_date->format('d M Y') }}@endif
                                @else
                                    Dates to be announced
                                @endif
                            </p>
                            <p class="mt-4 text-sm text-[#e4bd58]" aria-label="Rated {{ number_format($show->reviews_avg_rating ?? 0, 1) }} out of 5 from {{ $show->reviews_count }} reviews">★ {{ number_format($show->reviews_avg_rating ?? 0, 1) }} <span class="text-gray-500">{{ $show->reviews_count }} reviews</span></p>
                        </div>
                    </a>
                </article>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-white/15 bg-[#17191f] p-10 text-center">
                    <h2 class="text-xl font-bold text-white">No productions found</h2>
                    <p class="mt-2 text-gray-400">Try another search or clear your filters.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">{{ $shows->links() }}</div>
    </div>
</x-app-layout>
