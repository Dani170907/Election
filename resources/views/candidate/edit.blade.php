<div>
    <h1>Edit Data</h1>
    <form action="{{ route('candidate.update', $id->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <label for="name">Nama: </label><br>
        <input type="text" id="name" name="name" value="{{ $id->name }}"><br>

        <label for="description">Deskripsi: </label><br>
        <input type="text" id="description" name="description" value="{{ $id->description }}"><br>

        <label for="photo">Foto: </label><br>
        <input type="file" id="photo" name="photo"><br>
        @error('photo')
            {{ $message }}
        @enderror

        @if (!empty($id->photo))
            <img src="{{ url('image/' . $id->photo) }}" alt="Foto Kandidat"
            style="width: 100%; max-width: 100px; height: auto;">
        @else
            <img src="{{ url('image/nophoto.jpg') }}" alt="Foto Kandidat"
            style="width: 100%; max-width: 100px; height: auto;">
        @endif

        <input type="submit" value="Update">
    </form>
</div>
