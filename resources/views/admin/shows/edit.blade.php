<h1>Edit Show</h1>

<form action="/admin/shows/{{ $show->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $show->title }}">

    <textarea name="description">{{ $show->description }}</textarea>

    <button type="submit">
        Update
    </button>
</form>