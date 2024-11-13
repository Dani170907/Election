<div>
    <a href="{{ route('index.create') }}">Tambah Kandidat</a>
    <table border="1px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kandidat</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($candidate as $calon)
            <tr>
            <td>{{ $loop->iteration }}</td>
                <td>{{ $calon->name }}</td>
                <td>{{ $calon->description }}</td>
                <td>
                    @empty($calon->photo)
                        <img src="{{ url('image/nophoto.jpg') }}" alt="Foto Kandidat"
                        style="width: 100%; max-width: 100px; height: auto;">
                    @else
                        <img src="{{ url('image') }}/{{ $calon->photo }}" alt="Foto Kandidat"
                        style="width: 100%; max-width: 100px; height: auto;">
                    @endempty
                </td>
                <td><a href="{{ route('index.edit', $calon->id) }}">Edit</a></td>
                <td>
                    <form action="{{ route('index.destroy', $calon->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
