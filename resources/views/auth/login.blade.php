<x-layout>
<x-slot:title>
    {{ $title }}
</x-slot:title>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">

            <h2 class="text-3xl font-semibold text-center">Login</h2>
            <form action="{{ route('login.post') }}" method="post">
                @csrf

                @if(session('error'))
                <p style="color: red;">{{ session('error') }}</p>
                @endif

                <div class="form-control">
                    <label for="nis">
                        <span class="label-text">{{ __('NIS') }}</span>

                    </label>
                    <div class="input-group">
                        <input type="text" class="w-full max-w-lg input input-bordered" name="nis" id="nis" required placeholder="Masukkan NIS">
                    </div>
                    @error('nis')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-3 form-control">
                    <span class="label-text">
                        {{ __('Password') }}
                    </span>
                    <div class="input-group">
                        <label for="password" class="flex items-center gap-2 input input-bordered">
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            class="w-4 h-4 opacity-70">
                            <path
                                fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                            </svg>
                            <input type="password" class="grow" name="password" id="password" required placeholder="Masukkan Password" />
                        </label>
                    </div>
                </div>

                <div class="mt-6 form-control">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
                <p>
                    Tidak punya akun?
                    <a href="{{ route('register') }}">Daftar</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>
