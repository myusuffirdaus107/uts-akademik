<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Jurusan</th>
            <th>Akreditasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jurusan as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_jurusan }}</td>
                <td>{{ $item->akreditasi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
