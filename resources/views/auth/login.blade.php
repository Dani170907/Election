<x-layout>

    <div class="flex items-center justify-center min-h-screen bg-gray-100"
        style="background-image: url('{{ asset('image/latar.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">

            <div class="w-full max-w-md p-6 space-y-4 bg-white border border-white shadow-2xl bg-opacity-30 backdrop-blur-md rounded-2xl border-opacity-20 shadow-blue-100/50">

            <h2 class="text-3xl font-semibold text-center">Login</h2>
            <form action="{{ route('login.post') }}" method="post">
                @csrf

                @if(session('error'))
                    <div class="p-2 text-sm text-red-500 bg-opacity-50 rounded alert alert-error bg-red-50">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="form-control">
                    <span class="text-lg label-text">{{ __('NIS') }}</span>
                    <div class="input-group">
                        <label for="nis" class="flex items-center gap-2 input input-bordered">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                            </svg>
                            <input type="text" class="grow" name="nis" id="nis" required placeholder="Masukkan NIS" />
                        </label>
                    </div>
                    @error('nis')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-3 form-control">
                    <span class="text-lg label-text">{{ __('Password') }}</span>
                    <div class="input-group">
                        <label for="password" class="flex items-center gap-2 input input-bordered">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                                <path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                            </svg>
                            <input type="password" class="grow" name="password" id="password" required placeholder="Masukkan Password" />
                        </label>
                    </div>
                </div>

                <div class="mt-6 form-control">
                    <button type="submit" class="text-white btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="mt-4 text-sm text-center text-gray-900">
                    Tidak punya akun?
                    <a href="{{ route('register') }}" class="ml-1 font-semibold text-blue-500 hover:text-blue-600">
                        Daftar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
