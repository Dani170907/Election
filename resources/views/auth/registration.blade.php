<div>
    <h2>Daftar</h2>
    <form action="{{ route('register.post') }}" method="post">
        @csrf
        @session('error')
            {{ $value }}
        @endsession

        <label for="name">{{ __('Name') }}</label>
        <input type="text" name="name" id="name" required>
        {{-- @error('name')
            {{ $massage }}
        @enderror --}}
        
        <label for="email">{{ __('Email Address') }}</label>
        <input type="email" name="email" id="email" required>
        {{-- @error('email')
        {{ $massage }}
        @enderror --}}

        <label for="password">{{ __('password') }}</label>
        <input type="password" name="password" id="password" required>
        {{-- @error('password')
            {{ $massage }}
        @enderror --}}

        <label for="password_confirmation">{{ __('Konfirmasi Password') }}</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        {{-- @error('password_confirmation')
            {{ $massage }}
        @enderror --}}
        
        <button type="submit">
            {{ __('Register') }}
        </button><br>

        <p>Sudah memiliki Akun <a href="{{ route('login') }}">Masuk</a></p>

    </form>
</div>