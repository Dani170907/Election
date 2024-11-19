{{-- @dd($results) --}}

<div>
    <h1>Hasil Voting Sementara</h1>
    @if(session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Kandidat</th>
                <th>Jumlah Suara</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->votes_count }}</td>
                    @if ($candidate->votes_count > 0)
                        <td>{{ $candidate->votes_count / $totalVotes * 100 }}%</td>
                    @else
                        <td>0%</td>
                    @endif

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
