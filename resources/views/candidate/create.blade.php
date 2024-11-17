<div>
    <h1>Tambah Data</h1><br>

    <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
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
</div>
