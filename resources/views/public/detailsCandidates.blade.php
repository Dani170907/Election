<x-layout>
    <div class="container px-4 py-4 mx-auto bg-gray-100">
        <div class="mb-8 text-center">

            @if(session('success'))
            <div role="alert" class="w-full max-w-md mx-auto alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            @if(session('error'))
            <div role="alert" class="w-full max-w-md mx-auto alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('error') }}</span>
            </div>
            @endif
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 sm:gap-6">
            @foreach($candidates as $candidate)
            <div class="w-full shadow-xl card bg-base-100">
                <figure class="px-4 pt-4">
                    @empty($candidate->photo)
                    <img src="{{ url('image/nophoto.jpg') }}" alt="Foto Kandidat" class="object-cover w-full max-w-xs mx-auto rounded-xl aspect-square" />
                    @else
                    <img src="{{ url('image') }}/{{ $candidate->photo }}" alt="Foto Kandidat" class="object-cover w-full max-w-xs mx-auto rounded-xl aspect-square" />
                    @endempty
                </figure>

                <div class="items-center p-4 text-center card-body">
                    <h2 class="text-base card-title md:text-lg">
                        No Urut {{ $loop->iteration }}: {{ $candidate->name }}
                    </h2>
                    <p class="text-sm md:text-base">{{ $candidate->description }}</p>
                    <div class="justify-center w-full mt-2 card-actions">

                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="flex flex-col items-center justify-center mt-6 space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
            <a href="{{ route('logout') }}" class="w-full btn btn-error btn-sm sm:btn-md sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Keluar
            </a>
        </div>
    </div>
</x-layout>
