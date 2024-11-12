<div>
    <table>
        <thead>
            <tr>
<th>No</th>
                <th>Nama Kandidat</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
@foreach ($candidate as $cdt)

<tr>
<td>{{ $loop->iteration }}</td>
    <td>{{ $cdt->name }}</td>
    <td>{{ $cdt->description }}</td>
    <td><a href="">Edit</a></td>
    <td><a href="">Hapus</a></td>
</tr>
@endforeach
</tbody>
    </table>
</div>
