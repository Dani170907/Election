<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-navbar>
        @include('components.navbar')
    </x-navbar>

    <div class="flex items-center justify-center min-h-screen bg-gray-100" style="background-image: url('{{ asset('image/bg.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">

        <div class="w-full max-w-6xl p-6 space-y-4 bg-white border border-white shadow-2xl bg-opacity-30 backdrop-blur-md rounded-2xl border-opacity-20 shadow-blue-100/50">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-semibold text-gray-900">Kelola Kandidat</h1>
                <a href="{{ route('admin.candidate.create') }}" class="btn btn-primary btn-sm">
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
                                <a href="{{ route('admin.candidate.edit', $candidate->id) }}" class="btn btn-warning btn-xs sm:btn-sm">
                                    Edit
                                </a>
                            </td>
                            <td class="p-1 sm:p-2">
                                <label for="delete-modal-{{ $candidate->id }}" class="btn btn-error btn-xs sm:btn-sm">
                                    Delete
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

