<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Home</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<div class="container my-5">
		<h1 class="text-center">Welcome to Online Banking system</h1>
		<br><br><br><br><br><br><br><br>

		<div class="d-flex justify-content-center mt-4">
			<a href="{{ route('register') }}" class="btn btn-primary mx-3">Register</a>
			<a href="{{ route('login') }}" class="btn btn-secondary mx-3">Login</a>
		</div>
	</div>


</body>
</html>
