<div class="max-w-5xl mx-auto p-6">

    <div class="flex items-center justify-between mb-6">

        <h1 class="text-3xl font-bold">
            Actors
        </h1>

        <a href="/admin/actors/create"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Create Actor
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($actors->count() > 0)

        <div class="grid gap-4">

            @foreach($actors as $actor)

                <div class="bg-white shadow rounded-xl p-5 border">

                    <div class="flex items-center justify-between">

                        <div>
                            <h3 class="text-xl font-semibold">
                                {{ $actor->name }}
                            </h3>
                        </div>

                        <div class="flex gap-2">

                            <a href="/admin/actors/{{ $actor->id }}/edit"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
                                Edit
                            </a>

                            <form action="/admin/actors/{{ $actor->id }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this actor?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-gray-100 rounded-xl p-10 text-center">
            <p class="text-gray-500 text-lg">
                No actors created yet.
            </p>
        </div>

    @endif

</div>