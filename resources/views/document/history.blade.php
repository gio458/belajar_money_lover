<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; padding:20px;}
        h2 { color:#2F80ED; }
        table { width:100%; border-collapse: collapse; margin-top:20px;}
        table th, table td { border:1px solid #ddd; padding:8px; font-size: 13px;}
        th { background:#f1f1f1; }
    </style>
</head>
<body>

<h2>History {{ $from }} - {{ $to }}</h2>

<table>
    <tr>
        <th>Date</th>
        <th>Type</th>
        <th>Category</th>
        <th>Amount</th>
        <th>Note</th>
    </tr>

    @foreach($data as $row)
        <tr>
            <td>{{ $row->date }}</td>
            <td>{{ $row->type }}</td>
            <td>{{ $row->category }}</td>
            <td>Rp {{ number_format($row->amount) }}</td>
            <td>{{ $row->note }}</td>
        </tr>
    @endforeach

</table>

</body>
</html>
