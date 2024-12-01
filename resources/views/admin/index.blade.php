<x-layout>
    <x-navbar>
        @include('components.navbar')
    </x-navbar>

    <div class="flex items-center justify-center min-h-screen mt-4 bg-transparent">
        <div class="w-full p-6 mx-6 bg-gray-100 rounded-lg shadow">
            <h1 class="mb-4 text-xl font-bold">Data Voting</h1>
            <p>Total Kandidat: {{ $results->count() }}</p>
            <p>Total Pemilih: {{ $totalVotes }}</p>

            {{-- tabel --}}
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr class="text-center bg-green-500">
                            <th class="w-16">No</th>
                            <th>Foto</th>
                            <th>Kandidat</th>
                            <th>Jumlah Suara</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $candidate)
                            <tr class="text-center bg-white hover">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="m-auto avatar">
                                        <div class="rounded-md w-14 h-14">
                                            @empty($candidate->photo)
                                                <img src="{{ url('image/nophoto.jpg') }}" alt="Foto Kandidat" />
                                            @else
                                                <img src="{{ url('image') }}/{{ $candidate->photo }}" alt="Foto Kandidat" />
                                            @endempty
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $candidate->name }}</td>
                                <td>{{ $candidate->votes_count }}</td>
                                <td>
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
            </div>
        </div>
    </div>
</x-layout>
