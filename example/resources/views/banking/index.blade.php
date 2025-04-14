<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Banking System</a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white border-0">
                        <h3 class="mb-0 text-center text-primary">Welcome To Dashboard</h3>
                    </div>

                    <div class="card-body">

                        {{-- Success Message --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Link to create new bank --}}
                        <div class="d-grid mb-4">
                            <a href="{{ route('banks.create') }}" class="btn btn-outline-primary">
                                <i class="bi bi-plus-circle"></i> Create New Bank
                            </a>
                        </div>
                        
                        {{-- Bank List --}}
                        @if($banks && count($banks) > 0)
                            <h5 class="text-muted">List of Banks</h5>
                            <ul class="list-group">
                                @foreach($banks as $bank)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $bank->bank_name }}

                                        <div class="d-flex">
                                            {{-- Edit Button --}}
                                            <a href="{{ route('banks.edit', $bank) }}" class="btn btn-outline-warning btn-sm me-2">
                                                <i class="bi bi-pencil-square me-1"></i> Edit
                                            </a>

                                            {{-- Delete Form --}}
                                            <form action="{{ route('banks.destroy', $bank) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this bank?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted text-center mt-3">No bank found.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
