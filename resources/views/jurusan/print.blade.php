<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cetak Data Jurusan</title>
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

    <h2>Data Jurusan</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jurusan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_jurusan }}</td>
                    <td>{{ $item->akreditasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
