<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Data Matakuliah</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">

    <h2>Data Matakuliah</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Matakuliah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matakuliah as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_matakuliah }}</td>
                    <td>{{ $item->sks }}</td>
                    <td>{{ $item->jurusan->nama_jurusan }}</td>
                    <td>{{ $item->jurusan->akreditasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
