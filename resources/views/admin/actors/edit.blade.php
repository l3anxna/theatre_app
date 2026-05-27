<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white shadow rounded-2xl p-8">

        <h1 class="text-3xl font-bold mb-6">
            Edit Actor
        </h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">

                <ul class="list-disc list-inside">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        <form action="/admin/actors/{{ $actor->id }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            <div>

                <label class="block mb-2 font-medium">
                    Actor Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $actor->name) }}"
                       class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">

            </div>

            <div class="flex justify-end gap-3">

                <a href="/admin/actors"
                   class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-lg">
                    Cancel
                </a>

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
                    Update Actor
                </button>

            </div>

        </form>

    </div>

</div>