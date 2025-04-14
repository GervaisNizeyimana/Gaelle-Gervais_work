<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Article</title>
</head>
<body>

    <h1>Create a New Article</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        
        <div>
            <label for="title">Title:</label><br>
            <input type="text" name="title" id="title" placeholder="Title">
        </div>
        <br>

        <div>
            <label for="content">Content:</label><br>
            <textarea name="content" id="content" placeholder="Content"></textarea>
        </div>
        <br>

        <button type="submit">Save</button>
    </form>

</body>
</html>
