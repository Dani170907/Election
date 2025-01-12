<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @include('components.navbar')

    <div class="flex items-center justify-center min-h-screen pt-16 bg-gray-100"
    style="background-image: url('{{ asset('image/bg.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">


        <div class="w-full max-w-6xl p-6 space-y-4 bg-white border border-white shadow-2xl bg-opacity-30 backdrop-blur-md rounded-2xl border-opacity-20 shadow-blue-100/50">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-semibold text-gray-900">Kelola Kandidat</h1>
                <a href="{{ route('admin.candidate.create') }}" class="text-white bg-green-500 btn btn-sm">
                    + Tambah Kandidat
                </a>
            </div>

            <div class="overflow-x-auto rounded-md">
                <table class="table w-full text-xs sm:text-sm">
                    <thead>
                        <tr class="text-center text-white bg-green-500 bg-opacity-80">
                            <th class="w-12 p-1 sm:p-2">No</th>
                            <th class="w-20 p-1 sm:p-2">Foto</th>
                            <th class="p-1 sm:p-2">Nama Kandidat</th>
                            <th class="hidden p-1 sm:table-cell sm:p-2">Deskripsi</th>
                            <th class="p-1 sm:p-2" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidates as $candidate)
                        <tr class="text-xs text-center bg-white bg-opacity-50 hover sm:text-sm">
                            <td class="p-1 sm:p-2">{{ $loop->iteration }}</td>
                            <td class="p-1 sm:p-2">
                                <div class="mx-auto avatar">
                                    <div class="w-10 h-10 rounded-md sm:w-14 sm:h-14">
                                        @empty($candidate->photo)
                                        <img src="{{ url('image/nophoto.jpg') }}" alt="Foto Kandidat" class="object-cover rounded-md" />
                                        @else
                                        <img src="{{ url('image') }}/{{ $candidate->photo }}" alt="Foto Kandidat" class="object-cover rounded-md" />
                                        @endempty
                                    </div>
                                </div>
                            </td>
                            <td class="p-1 sm:p-2">{{ $candidate->name }}</td>
                            <td class="hidden p-1 sm:table-cell sm:p-2">
                                {{ Str::limit($candidate->description, 50) }}
                            </td>
                            <td class="p-1 sm:p-2">
                                <a href="{{ route('admin.candidate.edit', $candidate->id) }}" class="tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                            </td>
                            <td class="p-1 sm:p-2">
                                <label for="delete-modal-{{ $candidate->id }}" class="tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                      </svg>
                                </label>

                                <input type="checkbox" id="delete-modal-{{ $candidate->id }}" class="modal-toggle" />
                                <div class="modal">
                                    <div class="bg-white modal-box bg-opacity-80 backdrop-blur-md">
                                        <h3 class="text-lg font-bold">Konfirmasi Hapus</h3>
                                        <p class="py-4">
                                            Apakah Anda yakin ingin menghapus kandidat
                                            <strong>{{ $candidate->name }}</strong>?
                                        </p>
                                        <div class="modal-action">
                                            <label for="delete-modal-{{ $candidate->id }}" class="btn btn-ghost">
                                                Batal
                                            </label>
                                            <form action="{{ route('admin.candidate.destroy', $candidate->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-error">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>

