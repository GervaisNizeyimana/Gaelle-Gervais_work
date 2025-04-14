

@if (!session('customer'))
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Dashboard</title>

    <!-- ✅ Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Optional Custom Styling -->
    <style>
        body {
            padding: 30px;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        h1 {
            margin-bottom: 20px;
        }
        .form-box {
            padding: 20px;
            border: 1px solid #ddd;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        table {
            margin-top: 20px;
            background-color: white;
        }
        th, td {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Logout Button at the Top -->
        <div class="text-end mb-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <h1 class="text-primary">Welcome to Customer Dashboard</h1>
        <p><strong>Balance:</strong> {{ $customer->balance }} Frw</p>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Deposit -->
        <div class="form-box">
            <form method="POST" action="{{ route('dashboard.action') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Deposit Amount</label>
                    <input type="number" name="deposit" class="form-control">
                </div>
                <button type="submit" name="action" value="deposit" class="btn btn-success">Deposit</button>
            </form>
        </div>

        <!-- Withdraw -->
        <div class="form-box">
            <form method="POST" action="{{ route('dashboard.action') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Withdraw Amount</label>
                    <input type="number" name="withdraw" class="form-control">
                </div>
                <button type="submit" name="action" value="withdraw" class="btn btn-warning">Withdraw</button>
            </form>
        </div>

        <!-- Transfer -->
        <div class="form-box">
            <form method="POST" action="{{ route('dashboard.action') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Recipient name</label>
                    <input type="text" name="fname" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount to transfer</label>
                    <input type="number" name="transfer" class="form-control">
                </div>
                <button type="submit" name="action" value="transfer" class="btn btn-primary">Transfer</button>
            </form>
        </div>

        <h4 class="mt-4">Transaction History</h4>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Recipient</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <td>{{ ucfirst($transaction->type) }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>
                            @if ($transaction->type === 'transfer' && $transaction->recipient_id)
                                {{ \App\Models\Customer::find($transaction->recipient_id)?->fname ?? 'Unknown' }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No transactions yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
