<!DOCTYPE html>
<html>
<head>
    <title>Laporan Bulanan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Laporan Bulanan</h1>
    <h2>Bulan: {{ $laporan->first()->nama_bulan ?? '' }} Tahun: {{ $laporan->first()->tahun ?? '' }}</h2>
    <table>
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Nama Bulan</th>
                <th>Total Transaksi</th>
                <th>Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $item)
            <tr>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->bulan }}</td>
                <td>{{ $item->nama_bulan }}</td>
                <td>{{ $item->total_transaksi }}</td>
                <td>Rp {{ number_format($item->total_pendapatan, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
