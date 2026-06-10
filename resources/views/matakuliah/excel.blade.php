<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Nama Jurusan</th>
            <th>Akreditasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($matakuliah as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_matakuliah }}</td>
                <td>{{ $item->sks }}</td>
                <td>{{ $item->jurusan->nama_jurusan }}</td>
                <td>{{ $item->jurusan->akreditasi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
