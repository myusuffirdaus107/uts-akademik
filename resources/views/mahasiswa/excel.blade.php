<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Mahasiswa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jurusan->nama_jurusan }}</td>
                <td>{{ $item->jurusan->akreditasi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
