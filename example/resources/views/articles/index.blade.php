<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h1>Articles</h1>
<a href="{{ route('articles.create') }}">Create New</a>
@foreach($articles as $article)
    <h3>{{ $article->title }}</h3>
    <p>{{ $article->content }}</p>
    <a href="{{ route('articles.edit', $article->id) }}">Edit</a>
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endforeach


</body>
</html>