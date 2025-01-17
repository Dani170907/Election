{{-- <x-layout>

    <div class="container">
        <h1>Detail Kandidat</h1>
        <div id="candidateDetail">
            <p>Loading...</p>
        </div>
    </div>

    <script>
        // Ambil detail kandidat dari API
        const candidateId = @json($id); // ID kandidat dari route parameter
        const apiUrl = `/api/candidate/${candidateId}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const candidate = data.data;
                    document.getElementById('candidateDetail').innerHTML = `
                <div class="card">
                    <img src="${candidate.photo}" alt="${candidate.name}" class="card-img-top" style="max-height: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">${candidate.name}</h5>
                        <p>Total Votes: ${candidate.total_votes}</p>
                        <p>Percentage: ${candidate.persentage}</p>
                        </div>
                        </div>
                        `;
                } else {
                    document.getElementById('candidateDetail').innerText = data.message;
                }
            })
            .catch(error => {
                console.error('Error fetching candidate details:', error);
                document.getElementById('candidateDetail').innerText = 'Failed to load candidate details.';
            });

    </script>

</x-layout>
 --}}
