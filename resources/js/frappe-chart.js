document.addEventListener("DOMContentLoaded", async () => {
    const chartContainer = document.getElementById("chart");

    if (!chartContainer) {
        console.error("Elemen chart tidak ditemukan.");
        return;
    }

    try {
        const response = await fetch(apiResultsUrl);
        const data = await response.json();

        if (!data.success) {
            console.error("Gagal mengambil data:", data.message);
            return;
        }

        const labels = data.data.map(candidate => candidate.name);
        const votes = data.data.map(candidate => candidate.votes_count);

        const chart = new frappe.Chart(chartContainer, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Votes",
                        data: votes,
                    },
                ],
            },
            colors: ["#21ba45"]
        });

    } catch (error) {
        console.error("Terjadi kesalahan:", error);
    }
});
