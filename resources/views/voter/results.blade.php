<x-layout>
    {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}

    @if(session('error'))
    {{ session('error') }}
    @endif
    <table class="w-full mt-4 table-auto">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">Kandidat</th>
                <th class="px-4 py-2">Jumlah Suara</th>
                <th class="px-4 py-2">Persentase</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $candidate)
            <tr>
                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 border">{{ $candidate->name }}</td>
                <td class="px-4 py-2 border">{{ $candidate->votes_count }}</td>
                <td class="px-4 py-2 border">
                    @if ($candidate->votes_count > 0)
                    {{ round(($candidate->votes_count / $totalVotes) * 100, 2) }}%
                    @else
                    0%
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
