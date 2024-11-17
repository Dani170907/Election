<div>
    <h2>Daftar</h2>
    <form action="{{ route('register.post') }}" method="post">
        @csrf

        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <label for="name">{{ __('Nama') }}</label><br>
        <input type="text" name="name" id="name" required><br>
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="nis">{{ __('NIS') }}</label><br>
        <input type="text" name="nis" id="nis" required><br>
        @error('nis')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="password">{{ __('Password') }}</label><br>
        <input type="password" name="password" id="password" required><br>
        @error('password')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="password_confirmation">{{ __('Konfirmasi Password') }}</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br>
        @error('password_confirmation')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <button type="submit">
            {{ __('Daftar') }}
        </button><br>

        <p>
            Sudah memiliki akun?
            <a href="{{ route('login') }}">Masuk</a>
        </p>
    </form>
</div>
