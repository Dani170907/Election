<div>
    <h2>halaman Login</h2>
    <form action="{{ route('login.post') }}" method="post">
        @csrf
        @session('error')
            {{ $value }}
        @endsession

        <label for="email">{{ __('Alamat Email') }}</label><br>
        <input type="email" name="email" id="email" required><br><br>
        @error('email')
            {{ $massage }}
        @enderror
        
        <label for="password">{{ __('Password') }}</label><br>
        <input type="password" name="password" id="password" required><br><br>
        @error('password')
            {{ $massage }}
        @enderror

        <button type="submit">
            {{ __('Login') }}
        </button><br>
        <p>
            tidak punya akun?
            <a href="{{ route('register') }}">Daftar</a>
        </p>
    </form>
</div>
