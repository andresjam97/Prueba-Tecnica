<!doctype html>
<html>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<body>
    <div class="container">
        @if ($transactions->count() == 0)
        <div class="alert alert-danger" role="alert">
            No transactions data aviable for this client
            <a href="{{route('index')}}">Back</a>
          </div>

        @else

        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th>Transaction ID</th>
                    <th>Created At</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th>Transation Detail</th>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{$transaction->created_at}}</td>
                        <td>{{$transaction->year}}</td>
                        <td>{{$transaction->month}}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{$transaction->transaction_detail}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $transactions->links() }}
        @endif
        </div>
    </div>
</body>
</html>
