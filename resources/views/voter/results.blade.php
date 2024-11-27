{{-- @dd($results) --}}
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Halaman Home</title>
</head>

    <h1 class="mt-10 text-2xl font-extrabold text-center">Hasil Voting Sementara</h1>
    @if(session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Kandidat</th>
                <th>Jumlah Suara</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->votes_count }}</td>
                    @if ($candidate->votes_count > 0)
                        <td>{{ Str::limit(($candidate->votes_count / $totalVotes * 100), 4) }}%</td>
                    @else
                        <td>0%</td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <form action="{{ route('voter.reset', $candidate->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Reset Data Vote</button>
    </form> --}}
</div>
