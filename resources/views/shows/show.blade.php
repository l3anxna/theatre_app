<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 space-y-8">

        @if (session('status'))
            <div class="rounded-lg bg-green-900/40 p-4 text-green-200">
                {{ session('status') }}
            </div>
        @endif

        <section>
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h1 class="text-4xl font-bold text-white">{{ $show->title }}</h1>

                    <p class="mt-3 text-gray-300">{{ $show->description }}</p>

                    <p class="mt-4 text-yellow-400">
                        ★ {{ number_format($show->reviews_avg_rating ?? 0, 1) }}
                        <span class="text-gray-400">
                            ({{ $show->reviews_count }} reviews)
                        </span>
                    </p>
                </div>

                @auth
                    <form method="POST" action="{{ route('shows.favorite', $show->slug) }}">
                        @csrf

                        <button
                            type="submit"
                            class="rounded-lg px-4 py-2 font-semibold {{ $show->is_favorited ? 'bg-yellow-500 text-black' : 'bg-gray-800 text-white' }}"
                        >
                            {{ $show->is_favorited ? '★ Favorited' : '☆ Favorite' }}
                        </button>
                    </form>
                @endauth
            </div>
        </section>

        <section class="border-t border-gray-800 pt-6">
            <h2 class="font-bold text-white">Venue</h2>
            <p class="mt-2 text-gray-300">{{ $show->venue?->name }}</p>
        </section>

        <section class="border-t border-gray-800 pt-6">
            <h2 class="font-bold text-white">Cast</h2>

            <ul class="mt-3 space-y-2 text-gray-300">
                @foreach ($show->actors as $actor)
                    <li>{{ $actor->name }}</li>
                @endforeach
            </ul>
        </section>

        <section class="border-t border-gray-800 pt-6">
            <h2 class="text-2xl font-bold text-white">Reviews</h2>

            @auth
                @php
                    $myReview = $show->reviews->firstWhere('user_id', auth()->id());
                @endphp

                <form
                    method="POST"
                    action="{{ route('shows.reviews.store', $show->slug) }}"
                    class="mt-5 rounded-xl bg-gray-900 p-5"
                >
                    @csrf

                    <label for="rating" class="block font-medium text-white">
                        Your rating
                    </label>

                    <select
                        id="rating"
                        name="rating"
                        class="mt-2 w-full rounded-lg bg-gray-800 text-white"
                        required
                    >
                        <option value="">Choose a rating</option>

                        @for ($rating = 1; $rating <= 5; $rating++)
                            <option
                                value="{{ $rating }}"
                                @selected(old('rating', $myReview?->rating) == $rating)
                            >
                                {{ $rating }} star{{ $rating > 1 ? 's' : '' }}
                            </option>
                        @endfor
                    </select>

                    @error('rating')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror

                    <label for="comment" class="mt-4 block font-medium text-white">
                        Review (optional)
                    </label>

                    <textarea
                        id="comment"
                        name="comment"
                        rows="4"
                        maxlength="2000"
                        class="mt-2 w-full rounded-lg bg-gray-800 text-white"
                    >{{ old('comment', $myReview?->comment) }}</textarea>

                    @error('comment')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror

                    <button
                        type="submit"
                        class="mt-4 rounded-lg bg-yellow-500 px-4 py-2 font-semibold text-black"
                    >
                        {{ $myReview ? 'Update review' : 'Post review' }}
                    </button>
                </form>
            @else
                <p class="mt-4 text-gray-400">
                    <a href="{{ route('login') }}" class="text-yellow-400 underline">Log in</a>
                    to rate or review this show.
                </p>
            @endauth

            <div class="mt-6 space-y-4">
                @forelse ($show->reviews as $review)
                    <article class="rounded-xl bg-gray-900 p-5">
                        <div class="flex items-center justify-between">
                            <p class="font-semibold text-white">
                                {{ $review->user->name }}
                            </p>

                            <p class="text-yellow-400">
                                ★ {{ $review->rating }}/5
                            </p>
                        </div>

                        @if ($review->comment)
                            <p class="mt-3 text-gray-300">
                                {{ $review->comment }}
                            </p>
                        @endif

                        @auth
                            @if ($review->user_id === auth()->id())
                                <form
                                    method="POST"
                                    action="{{ route('reviews.destroy', $review) }}"
                                    class="mt-4"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-sm text-red-400">
                                        Delete my review
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </article>
                @empty
                    <p class="mt-4 text-gray-400">
                        No reviews yet. Be the first to review this show.
                    </p>
                @endforelse
            </div>
        </section>
    </div>
</x-app-layout>