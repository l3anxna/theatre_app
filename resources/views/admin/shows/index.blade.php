<h1>Shows</h1>

<a href="/admin/shows/create">Create Show</a>

@foreach($shows as $show)
    <div>
        <h3>{{ $show->title }}</h3>

        <a href="/admin/shows/{{ $show->id }}/edit">
            Edit
        </a>

        <form action="/admin/shows/{{ $show->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>
        </form>
    </div>
@endforeach