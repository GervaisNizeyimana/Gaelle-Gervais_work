<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<!-- ✅ Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		body {
			background-color: #f8f9fa;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.login-box {
			background: white;
			padding: 30px;
			border-radius: 8px;
			box-shadow: 0 0 15px rgba(0,0,0,0.1);
			width: 100%;
			max-width: 400px;
		}
	</style>
</head>
<body>

	<div class="login-box">
		<h2 class="mb-4 text-center">Customer Login</h2>

		<!-- Session Error -->
		@if(session('loginfail'))
			<div class="alert alert-danger">{{ session('loginfail') }}</div>
		@endif

		<!-- Validation Errors -->
		@error('fname')
			<div class="alert alert-danger">{{ $message }}</div>
		@enderror

		@error('password')
			<div class="alert alert-danger">{{ $message }}</div>
		@enderror

		<!-- Login Form -->
		<form method="POST" action="{{ route('dashboard') }}">
			@csrf

			<div class="mb-3">
				<label class="form-label">First Name</label>
				<input type="text" name="fname" class="form-control">
			</div>

			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" name="password" class="form-control">
			</div>

			<button type="submit" name="login" value="login" class="btn btn-primary w-100">Login</button>
		</form>

		<!-- Back Button -->
		<div class="mt-3">
			<a href="{{ route('register') }}" class="btn btn-secondary w-100">Back to Register</a>
		</div>
	</div>

</body>
</html>
