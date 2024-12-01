<x-layout>
    <x-navbar>
        @include('components.navbar')
    </x-navbar>
    <h1>Tambah kandidat</h1><br>

    <form action="{{ route('admin.candidate.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nama kandidat</label><br>
        <input type="text" name="name" id="name"><br>
        @error('name')
        {{ $massage }}
        @enderror

        <label for="description">Deskripsi</label><br>
        <input type="text" name="description" id="description"><br>
        @error('description')
        {{ $massage }}
        @enderror

        <label for="photo">Foto</label><br>
        <input type="file" id="photo" name="photo"><br>

        <button type="submit">Tambah</button>
    </form>
</x-layout>
