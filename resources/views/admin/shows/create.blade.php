<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white shadow rounded-2xl p-8">

        <h1 class="text-3xl font-bold mb-6">
            Create Show
        </h1>

        <form action="/admin/shows" method="POST" class="space-y-6">

            @csrf

            <div>
                <label class="block mb-2 font-medium">
                    Title
                </label>

                <input type="text"
                       name="title"
                       placeholder="Enter show title"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block mb-2 font-medium">
                    Description
                </label>

                <textarea name="description"
                          rows="5"
                          placeholder="Write show description..."
                          class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block mb-2 font-medium">
                    Venue
                </label>

                <select name="venue_id"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">

                    @foreach($venues as $venue)

                        <option value="{{ $venue->id }}">
                            {{ $venue->name }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div>
                <label class="block mb-3 font-medium">
                    Actors
                </label>

                <div class="grid grid-cols-2 gap-3">

                    @foreach($actors as $actor)

                        <label class="flex items-center gap-3 border rounded-lg p-3 hover:bg-gray-50 cursor-pointer">

                            <input type="checkbox"
                                   name="actors[]"
                                   value="{{ $actor->id }}"
                                   class="w-4 h-4">

                            <span>
                                {{ $actor->name }}
                            </span>

                        </label>

                    @endforeach

                </div>

            </div>

            <div class="flex justify-end gap-3">

                <a href="/admin/shows"
                   class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-lg">
                    Cancel
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
                    Save Show
                </button>

            </div>

        </form>

    </div>

</div>