<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bank Details</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card shadow-sm">
					<div class="card-header bg-primary text-white text-center">
						<h4 class="mb-0">Bank Details</h4>
					</div>
					<div class="card-body">
						<p><strong>Bank Name:</strong> {{ $bank->bank_name }}</p>
						<p><strong>Bank Location:</strong> {{ $bank->bank_location }}</p>
						<a href="{{ route('banks.index') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
