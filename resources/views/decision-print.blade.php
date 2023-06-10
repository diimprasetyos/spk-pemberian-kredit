<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak Decision Matrix</title>
  <style>
    .table-data {
      border-collapse: collapse;
      width: 100%;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 11pt;
      padding: 10px 20px;
      text-align: center;
    }

    .table-data tr th {
      background-color: #2c3e50;
      color: white;
    }

    .table-data tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-data tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <h3>Decision Matrix</h3>
  <table class="table-data">
    <thead>
        <tr>
            <th>#</th>
            <th>Alternative</th>
            @foreach ($criteriaweights as $c)
            <th>{{$c->name}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @forelse ($alternatives as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{$a->name}}</td>
            @php
            $scr = $scores->where('ida', $a->id)->all();
            @endphp
            @foreach ($scr as $s)
            <td>{{$s->rating}}</td>
            @endforeach
        </tr>
      @empty
      <tr>
        <td colspan="4" align="center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
</body>

</html>
