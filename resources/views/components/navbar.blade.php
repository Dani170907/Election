<div class="shadow-md navbar bg-base-100">
    <!-- Bagian Kiri -->
    <div class="navbar-start">
        <!-- Logo (Hanya muncul di desktop) -->
        <img src="{{ asset('image/SA.png') }}" alt="Logo" class="hidden object-cover w-10 h-10 lg:inline-block md:h-10 md:w-10">

        <!-- Hamburger Menu untuk layar kecil -->
        <details class="dropdown lg:hidden">
            <summary class="btn btn-ghost btn-sm btn-circle">
                <!-- Hamburger Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </summary>
            <ul class="menu dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a class="tooltip tooltip-right" data-tip="Beranda">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                      </svg>
                    </a>
                </li>
                <li>
                    <a>Kandidat</a>
                    <ul class="p-2">
                        <li><a href="{{ route('admin.candidate.index') }}">Daftar</a></li>
                        <li><a href="{{ route('admin.candidate.create') }}">Tambah</a></li>
                    </ul>
                </li>
                <li><a>Tentang</a></li>
                <li><a>Kontak</a></li>
                <li>
                    <a href="{{ route('logout') }}" class="btn">Log Out</a>
                </li>
            </ul>
        </details>
    </div>

    <!-- Bagian Tengah (Menu untuk layar besar) -->
    <div class="hidden navbar-center lg:flex">
        <ul class="px-1 menu menu-horizontal">
            <li><a href="{{ route('dashboard') }}">Beranda</a></li>
            <li class="relative group">
                <a class="inline-flex items-center">
                    Kandidat
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <ul class="absolute left-0 z-10 hidden p-2 mt-1 shadow-lg group-hover:block top-full w-52 bg-base-100 rounded-box">
                    <li><a href="{{ route('admin.candidate.index') }}">Daftar</a></li>
                    <li><a href="{{ route('admin.candidate.create') }}">Tambah</a></li>
                </ul>
            </li>
            <li><a>Data</a></li>
        </ul>
    </div>

    <!-- Bagian Kanan -->
    <div class="navbar-end">
        <img src="{{ asset('image/SA.png') }}" alt="Logo" class="object-cover w-10 h-10 lg:hidden md:h-10 md:w-10">
        <a href="{{ route('logout') }}" class="items-center justify-center hidden px-4 py-2 lg:inline-flex btn btn-md">
            Log Out
        </a>

    </div>
</div>
