<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Suara Kandidat</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h1>Hasil Voting Sementara</h1>
    <canvas id="voteChart" width="400" height="200"></canvas>

    <script>
        // ambil data api dari url
        fetch("{{ route('api.results') }}")
            // ubah response api ke format json
            .then(response => response.json())

            // data json dari response api diterima, kemudian proses
            .then(data => {
                // ambil data array candidate dari response api
                // ambil nama kandidat dan jumlah suara menggunakan map
                const labels = data.data.map(candidate => candidate.name); // nama kandidat digunakan sebagai label di grafik
                const votes = data.data.map(candidate => candidate.votes_count); // jumlah suara digunakan sebagai data di grafik

                // buat chart
                const ctx = document.getElementById('voteChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        // ambil nama kandidat
                        labels: labels, // nama kandidat
                        datasets: [{
                            label: 'Jumlah Suara', // label untuk dataset
                            data: votes, // data jumlah suara
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)'
                                , 'rgba(54, 162, 235, 0.2)'
                                , 'rgba(255, 206, 86, 0.2)'
                                , 'rgba(75, 192, 192, 0.2)'
                                , 'rgba(153, 102, 255, 0.2)'
                                , 'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)'
                                , 'rgba(54, 162, 235, 1)'
                                , 'rgba(255, 206, 86, 1)'
                                , 'rgba(75, 192, 192, 1)'
                                , 'rgba(153, 102, 255, 1)'
                                , 'rgba(255, 159, 64, 1)'
                            ],
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
                })
            })

            // jika terjadi error
            .catch(error => {
                console.error('Error:', error);
            });

    </script>
</body>
</html>

