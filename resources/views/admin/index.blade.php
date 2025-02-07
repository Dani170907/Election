<x-layout>
    @include('components.navbar')

    <div class="flex items-center justify-center min-h-screen pt-16 bg-gray-100"
    style="background-image: url('{{ asset('image/bg.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">



        <div class="w-full max-w-6xl p-6 space-y-4 bg-white border border-white shadow-2xl bg-opacity-30 backdrop-blur-md rounded-2xl border-opacity-20 shadow-blue-100/50">

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-2">
                <div class="p-4 text-center text-white bg-green-500 rounded-md shadow bg-opacity-80">
                    <p class="font-medium tect-sm">Total Kandidat:</p>
                    <p class="text-2xl font-bold">{{ $results->count() }}</p>
                </div>
                <div class="p-4 text-center text-white bg-green-500 rounded-md shadow bg-opacity-80">
                    <p class="font-medium tect-sm">Total Pemilih:</p>
                    <p class="text-2xl font-bold">{{ $totalVotes }}</p>
                </div>
            </div>

            <div class="overflow-x-auto rounded-md">
                <table class="table w-full text-xs sm:text-sm">
                    <thead>
                        <tr class="text-lg font-medium text-center text-white bg-green-500 bg-opacity-80">
                            <th class="w-16 p-1 sm:p-2">No</th>
                            <th class="p-1 sm:p-2">Foto</th>
                            <th class="p-1 sm:p-2">Kandidat</th>
                            <th class="p-1 sm:p-2">Jumlah Suara</th>
                            <th class="p-1 sm:p-2">Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $candidate)
                        <tr class="text-xs text-center bg-white bg-opacity-50 hover sm:text-sm">
                            <td class="p-1 sm:p-2">{{ $loop->iteration }}</td>
                            <td class="p-1 sm:p-2">
                                <div class="m-auto avatar">
                                    <div class="w-10 h-10 rounded-md sm:w-14 sm:h-14">
                                        @empty($candidate->photo)
                                        <img
                                            src="{{ url('image/nophoto.jpg') }}"
                                            alt="Foto Kandidat"
                                            class="object-cover rounded-md"/>
                                        @else
                                        <img
                                            src="{{ url('image') }}/{{ $candidate->photo }}"
                                            alt="Foto Kandidat"
                                            class="object-cover rounded-md"/>
                                        @endempty
                                    </div>
                                </div>
                            </td>
                            <td class="p-1 sm:p-2">{{ $candidate->name }}</td>
                            <td class="p-1 sm:p-2">{{ $candidate->votes_count }}</td>
                            <td class="p-1 sm:p-2">
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
