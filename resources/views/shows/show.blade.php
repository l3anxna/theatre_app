<x-app-layout>
    <div class="mx-auto max-w-6xl space-y-10">
        @if (session('status'))
            <div class="rounded-xl border border-green-500/30 bg-green-900/30 p-4 text-green-100" role="status" aria-live="polite">{{ session('status') }}</div>
        @endif

        <section class="grid gap-7 lg:grid-cols-[minmax(220px,300px)_1fr]">
            <div class="aspect-[2/3] overflow-hidden rounded-2xl bg-gradient-to-br from-[#713331] via-[#34252a] to-[#18191d] shadow-2xl shadow-black/30">
                @if ($show->poster_image)
                    <img src="{{ $show->poster_image }}" alt="Poster for {{ $show->title }}" class="h-full w-full object-cover">
                @else
                    <div class="flex h-full flex-col justify-end p-7"><span class="mb-auto text-xs font-semibold uppercase tracking-[0.2em] text-[#e4bd58]">Stagebook</span><span class="text-3xl font-bold leading-tight">{{ $show->title }}</span></div>
                @endif
            </div>
            <div class="py-2">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#e4bd58]">{{ $show->genre ?? 'Theatre production' }}</p>
                <h1 class="mt-2 text-4xl font-bold tracking-tight text-white sm:text-5xl">{{ $show->title }}</h1>
                <p class="mt-4 text-lg leading-8 text-gray-300">{{ $show->description }}</p>
                <div class="mt-6 flex flex-wrap items-center gap-x-5 gap-y-3 text-sm">
                    <p class="font-semibold text-[#e4bd58]" aria-label="Rated {{ number_format($show->reviews_avg_rating ?? 0, 1) }} out of 5 from {{ $show->reviews_count }} reviews">★ {{ number_format($show->reviews_avg_rating ?? 0, 1) }}/5 <span class="font-normal text-gray-400">{{ $show->reviews_count }} reviews</span></p>
                    <p class="text-gray-300">⌖ {{ $show->venue?->name ?? 'Venue to be announced' }}</p>
                    <p class="text-gray-300">◷ {{ $show->start_date ? $show->start_date->format('d M Y') : 'Dates TBA' }}@if ($show->end_date) – {{ $show->end_date->format('d M Y') }}@endif</p>
                </div>
                <div class="mt-7 flex flex-wrap gap-3">
                    @auth
                        <form method="POST" action="{{ route('shows.favorite', $show->slug) }}">@csrf
                            <button type="submit" class="min-h-11 rounded-xl border border-[#e4bd58]/60 px-4 font-semibold text-[#f4d77f] transition hover:bg-[#e4bd58] hover:text-black">{{ $show->is_favorited ? 'Saved to watchlist' : 'Save to watchlist' }}</button>
                        </form>
                        <a href="#review" class="inline-flex min-h-11 items-center rounded-xl bg-[#c93d3d] px-4 font-semibold text-white hover:bg-[#ae3030]">Log / review</a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex min-h-11 items-center rounded-xl bg-[#c93d3d] px-4 font-semibold text-white hover:bg-[#ae3030]">Log in to log this show</a>
                    @endauth
                </div>
            </div>
        </section>

        <section class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-white/10 bg-[#17191f] p-6"><h2 class="text-xl font-bold">Venue & run</h2><p class="mt-3 text-gray-300">{{ $show->venue?->name ?? 'Venue to be announced' }}</p><p class="mt-2 text-gray-400">Performance times and ticket links will appear here as they are announced.</p></div>
            <div class="rounded-2xl border border-white/10 bg-[#17191f] p-6"><h2 class="text-xl font-bold">Cast</h2><ul class="mt-4 grid gap-3 sm:grid-cols-2">@forelse ($show->actors as $actor)<li><a class="font-medium text-white hover:text-[#e4bd58]" href="{{ route('actors.show', $actor->slug) }}">{{ $actor->name }}</a>@if ($actor->pivot->character_name)<p class="text-sm text-gray-400">{{ $actor->pivot->character_name }}</p>@endif</li>@empty<li class="text-gray-400">Cast to be announced.</li>@endforelse</ul></div>
        </section>

        <section id="review" class="border-t border-white/10 pt-8"><h2 class="text-2xl font-bold text-white">Community reviews</h2>
            @auth
                @php($myReview = $show->reviews->firstWhere('user_id', auth()->id()))
                <form method="POST" action="{{ route('shows.reviews.store', $show->slug) }}" class="mt-5 rounded-2xl border border-white/10 bg-[#17191f] p-5">@csrf
                    <div class="grid gap-5 sm:grid-cols-[180px_1fr]"><div><label for="rating" class="block font-medium">Your rating</label><select id="rating" name="rating" required class="mt-2 min-h-11 w-full rounded-xl border-gray-700 bg-[#101114] text-white focus:border-[#e4bd58] focus:ring-[#e4bd58]"><option value="">Choose rating</option>@for ($rating = 1; $rating <= 5; $rating++)<option value="{{ $rating }}" @selected(old('rating', $myReview?->rating) == $rating)>{{ $rating }} / 5</option>@endfor</select>@error('rating')<p class="mt-2 text-sm text-red-400">{{ $message }}</p>@enderror</div><div><label for="comment" class="block font-medium">Your review <span class="font-normal text-gray-400">(optional)</span></label><textarea id="comment" name="comment" rows="4" maxlength="2000" class="mt-2 w-full rounded-xl border-gray-700 bg-[#101114] text-white focus:border-[#e4bd58] focus:ring-[#e4bd58]">{{ old('comment', $myReview?->comment) }}</textarea>@error('comment')<p class="mt-2 text-sm text-red-400">{{ $message }}</p>@enderror</div></div><button type="submit" class="mt-4 min-h-11 rounded-xl bg-[#e4bd58] px-5 font-semibold text-black hover:bg-[#f4d77f]">{{ $myReview ? 'Update review' : 'Post review' }}</button>
                </form>
            @else <p class="mt-3 text-gray-400"><a href="{{ route('login') }}" class="font-medium text-[#e4bd58] underline underline-offset-4">Log in</a> to rate or review this production.</p>@endauth
            <div class="mt-6 space-y-4">@forelse ($show->reviews as $review)<article class="rounded-2xl border border-white/10 bg-[#17191f] p-5"><div class="flex items-start justify-between gap-4"><div><p class="font-semibold text-white">{{ $review->user->name }}</p><p class="mt-1 text-sm text-gray-500">{{ $review->created_at->format('d M Y') }}</p></div><p class="font-semibold text-[#e4bd58]">★ {{ $review->rating }}/5</p></div>@if ($review->comment)<p class="mt-4 leading-7 text-gray-300">{{ $review->comment }}</p>@endif</article>@empty<p class="text-gray-400">No reviews yet. Be the first to log this production.</p>@endforelse</div>
        </section>
    </div>
</x-app-layout>
