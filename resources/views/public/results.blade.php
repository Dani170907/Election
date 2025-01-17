<x-layout>
    <div class="container p-6 mx-auto">
        <div class="mb-8 text-center">
            <h1 class="mb-4 text-3xl font-bold">Hasil Voting Sementara</h1>
        </div>

        <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-md">
            <div class="relative">
                <canvas id="voteChart" class="w-full h-96"></canvas>
            </div>

            <div class="flex flex-wrap justify-center gap-20 mt-6 ml-7">
                @foreach ($results as $candidate)
                <div class="text-center">
                    <a href="../api/candidate/{{ $candidate->id }}" class="text-blue-500 hover:underline">
                        <img src="{{ url('image') }}/{{ $candidate->photo }}" alt="{{ $candidate->name }}" class="object-cover w-16 h-16 mx-auto mb-2 rounded-full">
                        {{ $candidate->name }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // ambil data api dari url
        fetch("{{ route('api.results') }}")
            .then(response => response.json())
            .then(data => {
                const labels = data.data.map(candidate => candidate.name);
                const votes = data.data.map(candidate => candidate.votes_count);

                const ctx = document.getElementById('voteChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar'
                    , data: {
                        labels: labels
                        , datasets: [{
                            label: 'Jumlah Suara'
                            , data: votes
                            , backgroundColor: [
                                'rgba(255, 99, 132, 0.2)'
                                , 'rgba(54, 162, 235, 0.2)'
                                , 'rgba(255, 206, 86, 0.2)'
                                , 'rgba(75, 192, 192, 0.2)'
                                , 'rgba(153, 102, 255, 0.2)'
                                , 'rgba(255, 159, 64, 0.2)'
                            ]
                            , borderColor: [
                                'rgba(255, 99, 132, 1)'
                                , 'rgba(54, 162, 235, 1)'
                                , 'rgba(255, 206, 86, 1)'
                                , 'rgba(75, 192, 192, 1)'
                                , 'rgba(153, 102, 255, 1)'
                                , 'rgba(255, 159, 64, 1)'
                            ]
                            , borderWidth: 1
                        }]
                    }
                    , options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });

    </script>
</x-layout>

