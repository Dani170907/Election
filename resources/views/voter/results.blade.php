<x-layout>
    <div class="container px-4 py-8 mx-auto">
        <div class="mb-8 text-center">
            <h1 class="mb-3 text-2xl font-bold md:text-3xl">Hasil Sementara</h1>

            @if(session('error'))
            <div role="alert" class="w-full max-w-md mx-auto alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
            @endif
        </div>

        <div class="overflow-x-auto">
            <table class="table w-full table-zebra">
                <thead>
                    <tr class="text-center">
                        <th class="w-16">No</th>
                        <th>Foto</th>
                        <th>Kandidat</th>
                        <th>Jumlah Suara</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $candidate)
                    <tr class="text-center hover">
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

        <div class="flex justify-center mt-6">
            <a href="{{ route('voter.index') }}" class="btn btn-primary btn-sm sm:btn-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Voting
            </a>
        </div>
    </div>
    <canvas id="myChart" width="400" height="400"></canvas>
</x-layout>

