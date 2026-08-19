<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-white">Create show</h1>
    </x-slot>

    <div class="mx-auto max-w-3xl">
        <form action="{{ route('admin.shows.store') }}" method="POST" class="space-y-6 rounded-2xl border border-gray-800 bg-[#16161d] p-6 text-white">
            @csrf

            <div>
                <label for="title" class="mb-2 block font-medium">Title</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-lg border-gray-700 bg-gray-900 text-white">
                @error('title')<p class="mt-2 text-sm text-red-400">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="description" class="mb-2 block font-medium">Description</label>
                <textarea id="description" name="description" rows="5" required class="w-full rounded-lg border-gray-700 bg-gray-900 text-white">{{ old('description') }}</textarea>
                @error('description')<p class="mt-2 text-sm text-red-400">{{ $message }}</p>@enderror
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label for="start_date" class="mb-2 block font-medium">Start date</label>
                    <input id="start_date" type="date" name="start_date" value="{{ old('start_date') }}" class="w-full rounded-lg border-gray-700 bg-gray-900 text-white">
                </div>
                <div>
                    <label for="end_date" class="mb-2 block font-medium">End date</label>
                    <input id="end_date" type="date" name="end_date" value="{{ old('end_date') }}" class="w-full rounded-lg border-gray-700 bg-gray-900 text-white">
                    @error('end_date')<p class="mt-2 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label for="venue_id" class="mb-2 block font-medium">Venue</label>
                <select id="venue_id" name="venue_id" class="w-full rounded-lg border-gray-700 bg-gray-900 text-white">
                    <option value="">Choose a venue</option>
                    @foreach ($venues as $venue)
                        <option value="{{ $venue->id }}" @selected(old('venue_id') == $venue->id)>{{ $venue->name }}</option>
                    @endforeach
                </select>
            </div>

            <fieldset>
                <legend class="mb-3 font-medium">Cast</legend>
                <div class="grid gap-3 sm:grid-cols-2">
                    @foreach ($actors as $actor)
                        <label class="flex cursor-pointer items-center gap-3 rounded-lg border border-gray-700 p-3 hover:border-yellow-500">
                            <input type="checkbox" name="actors[]" value="{{ $actor->id }}" @checked(in_array($actor->id, old('actors', [])))>
                            <span>{{ $actor->name }}</span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.shows.index') }}" class="rounded-lg bg-gray-700 px-5 py-3">Cancel</a>
                <button type="submit" class="rounded-lg bg-yellow-500 px-6 py-3 font-semibold text-black">Save show</button>
            </div>
        </form>
    </div>
</x-app-layout>
