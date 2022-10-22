<!doctype html>
<html>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th>Identification Number</th>
                    <th>Created At</th>
                    <th>Transactions</th>
                </thead>
                <tbody>
                    @foreach ($info as $item)
                    <tr>
                        <td>{{$item->identification_number}}</td>
                        <td>{{$item->created_at}}</td>
                        <td><a href="{{route('getUserTransactions',$item->id)}}"><button class="btn btn-sm btn-primary">Transactions</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $info->links() }}
        </div>
    </div>
</body>
</html>
