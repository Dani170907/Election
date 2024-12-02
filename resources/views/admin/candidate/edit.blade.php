<x-layout>

    <div class="flex items-center justify-center min-h-screen bg-gray-100" style="background-image: url('{{ asset('image/bg.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">

        <div class="w-full max-w-md p-6 space-y-4 bg-white border border-white shadow-2xl bg-opacity-30 backdrop-blur-md rounded-2xl border-opacity-20 shadow-blue-100/50">
            <h1 class="mb-6 text-3xl font-semibold text-center">Edit Kandidat</h1>

            <form action="{{ route('admin.candidate.update', $id->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="form-control">
                    <span class="text-lg label-text">Nama Kandidat</span>
                    <div class="input-group">
                        <label for="name" class="flex items-center gap-2 input input-bordered">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                            </svg>
                            <input type="text" name="name" id="name" placeholder="Masukkan nama kandidat" class="grow @error('name') input-error @enderror" value="{{ old('name', $id->name) }}" required />
                        </label>
                    </div>
                    @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control">
                    <span class="text-lg label-text">Deskripsi</span>
                    <div class="input-group">
                        <textarea name="description" id="description" placeholder="Masukkan deskripsi kandidat" class="textarea textarea-bordered w-full h-24 @error('description') textarea-error @enderror" required>
                        {{ old('description', $id->description) }}
                        </textarea>
                    </div>
                    @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control">
                    <span class="text-lg label-text">Foto Kandidat Saat Ini</span>
                    <div class="mx-auto mb-4 avatar">
                        <div class="w-24 h-24 rounded-md">
                            @if (!empty($id->photo))
                            <img src="{{ url('image/' . $id->photo) }}" alt="Foto Kandidat" class="object-cover" />
                            @else
                            <img src="{{ url('image/nophoto.jpg') }}" alt="Foto Kandidat" class="object-cover" />
                            @endif
                        </div>
                    </div>

                    <span class="text-lg label-text">Ubah Foto</span>
                    <input type="file" id="photo" name="photo" class="file-input file-input-bordered file-input-primary w-full @error('photo') @enderror" />
                    @error('photo')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between mt-6 form-control">
                    <button type="submit" class="w-full mb-4 text-white btn btn-primary">
                        Update Kandidat
                    </button>
                    <a href="{{ route('admin.candidate.index') }}" class="btn btn-outline">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>

