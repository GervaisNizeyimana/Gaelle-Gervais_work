<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Welcome to Bank legistration</h1>

    <form action="{{ route('banks.store') }}" method="POST">
        @csrf
        
        <div>
            <label for="title">Bank name:</label><br>
            <input type="text" name="bank_name" id="title" placeholder="bank name">
        </div>
        <br>

        <div>
            <label for="content">Bank location:</label><br>
            <textarea name="bank_location" id="content" placeholder="bank location"></textarea>
        </div>
        <br>

        <button type="submit">Save</button>
    </form>

</body>
</html>