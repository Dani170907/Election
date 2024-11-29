
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

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
                <td>{{ Str::limit(($candidate->votes_count / $totalVotes * 100), 4) }}%</td>
                @else
                <td>0%</td>
                @endif

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<button class="w-64 rounded-full btn">Button</button>

</x-layout>
