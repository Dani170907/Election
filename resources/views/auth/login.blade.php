<div>
    <h2>halaman Login</h2>
    <form action="{{ route('login.post') }}" method="post">
        @csrf

        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <label for="nis">{{ __('NIS') }}</label><br>
        <input type="text" name="nis" id="nis" required><br><br>
        @error('nis')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="password">{{ __('Password') }}</label><br>
        <input type="password" name="password" id="password" required><br><br>
        @error('password')
            <p style="color: red;">{{ $message }}</p>
        @enderror


        <button type="submit">
            {{ __('Login') }}
        </button><br>
        <p>
            Tidak punya akun?
            <a href="{{ route('register') }}">Daftar</a>
        </p>
    </form>
</div>
