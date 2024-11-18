<div>
    <a href="{{ route('candidate.create') }}">Tambah Kandidat</a>
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

        @foreach ($candidates as $candidate)
            <tr>
            <td>{{ $loop->iteration }}</td>
                <td>{{ $candidate->name }}</td>
                <td>{{ $candidate->description }}</td>
                <td>
                    @empty($candidate->photo)
                        <img src="{{ url('image/nophoto.jpg') }}" alt="Foto Kandidat"
                        style="width: 100%; max-width: 100px; height: auto;">
                    @else
                        <img src="{{ url('image') }}/{{ $candidate->photo }}" alt="Foto Kandidat"
                        style="width: 100%; max-width: 100px; height: 100px; object-fit: cover;">
                    @endempty
                </td>
                <td><a href="{{ route('candidate.edit', $candidate->id) }}">Edit</a></td>
                <td>
                    <form action="{{ route('candidate.destroy', $candidate->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <a href="{{ route('logout') }}">logout</a>
</div>
