<h1>Create Show</h1>

<form action="/admin/shows" method="POST">
    @csrf

    <input type="text" name="title" placeholder="Title">

    <textarea name="description"></textarea>

    <button type="submit">
        Save
    </button>
</form>