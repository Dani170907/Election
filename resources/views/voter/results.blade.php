@dd($results)

<div>
    <h1>Hasil Voting Sementara</h1>
    <table>
        <thead>
            <tr>
                <th>Kandidat</th>
                <th>Jumlah Suara</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->votes_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <form action="{{ route('voter.reset', $candidate->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Reset Data Vote</button>
    </form> --}}

</div>
