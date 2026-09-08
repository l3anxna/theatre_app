<x-app-layout>
    <div class="mx-auto max-w-5xl">
        <section class="rounded-3xl border border-[#D8CEC1] bg-[#FFFCF7] p-6 sm:p-8">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div class="grid h-20 w-20 shrink-0 place-items-center rounded-full bg-[#A34A3E] text-3xl font-bold">{{ Str::upper(Str::substr($user->name, 0, 1)) }}</div>
                <div class="min-w-0 flex-1"><h1 class="text-3xl font-bold">{{ $user->name }}</h1><p class="mt-1 text-[#746D64]">{{ $user->username ? '@'.$user->username : 'Stagebook member' }}@if($user->city) · {{ $user->city }}@endif</p>@if($user->bio)<p class="mt-4 max-w-2xl leading-7 text-[#554E47]">{{ $user->bio }}</p>@endif</div>
                @auth @if(auth()->id() === $user->id)<a href="{{ route('profile.edit') }}" class="inline-flex min-h-11 items-center justify-center rounded-xl border border-[#D8CEC1] px-4 font-semibold hover:border-[#B7791F]">Edit profile</a>@endif @endauth
            </div>
            <dl class="mt-7 grid grid-cols-3 gap-3 border-t border-[#D8CEC1] pt-6 text-center"><div><dt class="text-2xl font-bold">{{ $user->reviews->count() }}</dt><dd class="text-sm text-[#746D64]">Reviews</dd></div><div><dt class="text-2xl font-bold">{{ $user->favoriteShows->count() }}</dt><dd class="text-sm text-[#746D64]">Watchlist</dd></div><div><dt class="text-2xl font-bold">{{ $user->reviews->where('created_at', '>=', now()->startOfYear())->count() }}</dt><dd class="text-sm text-[#746D64]">This year</dd></div></dl>
        </section>
        <section class="mt-10"><div class="flex items-baseline justify-between"><h2 class="text-2xl font-bold">Recent diary</h2><span class="text-sm text-[#746D64]">Reviews are public</span></div><div class="mt-5 space-y-4">@forelse($user->reviews as $review)<article class="rounded-2xl border border-[#D8CEC1] bg-[#FFFCF7] p-5"><div class="flex items-start justify-between gap-4"><div><a href="{{ route('shows.show', $review->show->slug) }}" class="text-lg font-bold hover:text-[#B7791F]">{{ $review->show->title }}</a><p class="mt-1 text-sm text-[#746D64]">Logged {{ $review->created_at->format('d M Y') }}</p></div><span class="font-semibold text-[#B7791F]">★ {{ $review->rating }}/5</span></div>@if($review->comment)<p class="mt-4 leading-7 text-[#554E47]">{{ $review->comment }}</p>@endif</article>@empty<p class="rounded-2xl border border-dashed border-[#D8CEC1] p-8 text-[#746D64]">No public diary entries yet.</p>@endforelse</div></section>
    </div>
</x-app-layout>
