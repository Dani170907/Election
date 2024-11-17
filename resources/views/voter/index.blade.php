<div>
    <h1>Pilih Kandidat</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <ul>
        @foreach($candidates as $candidate)
            <li>
                <strong>{{ $candidate->name }}</strong><br>
                {{ $candidate->description }}<br>
                @empty($candidate->photo)
                    <img src="{{ url('image/nophoto.jpg') }}" alt="Foto Kandidat"
                    style="width: 100%; max-width: 100px; height: auto;">
                @else
                    <img src="{{ url('image') }}/{{ $candidate->photo }}" alt="Foto Kandidat"
                    style="width: 100%; max-width: 100px; height: 100px;">
                @endempty
            <br>

                @if(!$userVote)
                    <form action="{{ route('voter.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                        <button type="submit">Vote</button>
                    </form>
                @else
                    @if($userVote->candidate_id == $candidate->id)
                        <span style="color: green;">Anda memilih kandidat ini</span>
                    @endif
                @endif
            </li>
        @endforeach
    </ul>
    <ul>
        <li><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
</div>
