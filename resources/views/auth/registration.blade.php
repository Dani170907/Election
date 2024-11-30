<x-layout>
    <x-slot:title>
    </x-slot:title>
    <div class="flex items-center justify-center min-h-screen px-4 bg-gray-100 sm:px-6 lg:px-8">
        <div class="w-full max-w-md p-6 space-y-4 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 sm:text-3xl">Registrasi</h2>

            <form action="{{ route('register.post') }}" method="post" class="space-y-3">
                @csrf

                @if(session('error'))
                <div class="p-2 text-sm text-red-500 rounded alert alert-error bg-red-50">
                    {{ session('error') }}
                </div>
                @endif

                <div class="form-control">
                    <label for="name" class="label">
                        <span class="text-sm text-gray-700 label-text">{{ __('Nama Lengkap') }}</span>
                    </label>
                    <label class="flex items-center h-10 gap-2 input input-bordered">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input type="text" class="text-sm grow" name="name" id="name" required placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" />
                    </label>
                    @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control">
                    <label for="nis" class="label">
                        <span class="text-sm text-gray-700 label-text">{{ __('NIS') }}</span>
                    </label>
                    <label class="flex items-center h-10 gap-2 input input-bordered">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                            <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="text" class="text-sm grow" name="nis" id="nis" required placeholder="format NIS '12.3456'" value="{{ old('nis') }}" />
                    </label>
                    @error('nis')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control">
                    <label for="password" class="label">
                        <span class="text-sm text-gray-700 label-text">{{ __('Password') }}</span>
                    </label>
                    <label class="flex items-center h-10 gap-2 input input-bordered">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                            <path fillRule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clipRule="evenodd" />
                        </svg>
                        <input type="password" class="text-sm grow" name="password" id="password" required placeholder="Masukkan Password" />
                    </label>
                    @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control">
                    <label for="password_confirmation" class="label">
                        <span class="text-sm text-gray-700 label-text">{{ __('Konfirmasi Password') }}</span>
                    </label>
                    <label class="flex items-center h-10 gap-2 input input-bordered">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                            <path fillRule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clipRule="evenodd" />
                        </svg>
                        <input type="password" class="text-sm grow" name="password_confirmation" id="password_confirmation" required placeholder="Konfirmasi Password" />
                    </label>
                </div>

                <div class="mt-4 form-control">
                    <button type="submit" class="w-full text-sm transition duration-300 ease-in-out btn btn-primary hover:opacity-90">
                        {{ __('Daftar') }}
                    </button>
                </div>

                <div class="mt-2 text-xs text-center text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="ml-1 font-semibold text-blue-500 hover:text-blue-600">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
