<h2>Edit Article</h2>

<form action="{{ route('articles.update', $article->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $article->title }}" placeholder="Title"><br>
    <textarea name="content" placeholder="Content">{{ $article->content }}</textarea><br>
    <button type="submit">Update</button>
</form>

<a href="{{ route('articles.index') }}">Back to list</a>
