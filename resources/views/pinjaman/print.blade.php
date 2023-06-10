<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cetak Data Pinjaman</title>
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
  <h3>Data Pinjaman</h3>
  <table class="table-data">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Tanggal Pinjaman</th>
        <th>Besar Pinjaman</th>
        <th>Bunga</th>
        <th>Angsuran</th>
        <th>Jangka Waktu</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($pinjaman as $p)
      <tr>
        <td>{{ $p->id }}</td>
        @foreach ($pemohons as $c)
        <td>{{$c->nama}}</td>
        @endforeach
        <td>{{ $p->tanggal_pinjaman}}</td>
        <td>{{ $p->besar_pinjaman}}</td>
        <td>{{ $p->bunga}}</td>
        <td>{{ $p->angsuran}}</td>
        <td>{{ $p->jangka_waktu}}</td>
    </tr>
      @empty
      <tr>
        <td colspan="4" align="center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
</body>

</html>
