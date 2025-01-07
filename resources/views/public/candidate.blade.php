{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Voting Kandidat</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h1>Hasil Voting Sementara</h1>
    <canvas id="voteChart" width="400" height="200"></canvas>

    <script>
        const candidateId = {{ $id }};
        const apiUrl = `/api/public-results/${candidateId}`; // URL API publik untuk data kandidat

        // ambil data api dari url
        fetch(apiUrl)
            .then(response => response.json()) // Konversi response ke JSON
            .then(data => {
                // Ambil data dari response API
                const label = data.name; // Nama kandidat
                const votes = data.votes_count; // Jumlah suara

                // Buat chart
                const ctx = document.getElementById('voteChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [label], // Nama kandidat sebagai label
                        datasets: [{
                            label: 'Jumlah Suara',
                            data: [votes], // Jumlah suara kandidat
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
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
</body>
</html>
 --}}
