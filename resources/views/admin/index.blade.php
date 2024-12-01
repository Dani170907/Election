<x-layout>
    <x-navbar>
        @include('components.navbar')
    </x-navbar>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full p-6 mx-6 bg-white rounded-lg shadow">
            <h1 class="mb-4 text-xl font-bold">Data Voting</h1>
            <p>Total Kandidat: {{ $results->count() }}</p>
            <p>Total Pemilih: {{ $totalVotes }}</p>

            {{-- tabel --}}
            <div class="mt-4 overflow-x-auto">
                @include('voter.results')
            </div>
        </div>
    </div>
</x-layout>

