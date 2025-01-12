<div class="fixed top-0 left-0 z-50 w-full h-16 shadow-md navbar bg-base-100">

    <!-- bagian kiri -->
    <div class="navbar-start">
        <img src="{{ asset('image/SA.png') }}" alt="Logo" class="hidden object-cover w-12 h-12 lg:inline-block md:h-12 md:w-12">

        <!-- tampilan mobile -->
        <details class="dropdown lg:hidden">
            <summary class="btn btn-ghost btn-sm btn-circle">
                <!-- Hamburger Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </summary>
            <ul class="menu dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <!-- Beranda Icon -->
                    <a href="{{ route('dashboard') }}" class="tooltip tooltip-right" data-tip="Beranda">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>

                    </a>

                <li>
                    <a href="{{ route('admin.candidate.index') }}" class="tooltip tooltip-right" data-tip="Kelola">
                        <!-- Candidates Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </a>

                    <ul class="p-2">
                        <li>
                            <!-- Add Candidate Icon -->
                            <a href="{{ route('admin.candidate.create') }}" class="tooltip tooltip-right" data-tip="Tambah Kandidat">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('public.results') }}" class="tooltip tooltip-right" data-tip="Data">
                        <!-- Candidates Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                          </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="btn">Log Out</a>
                </li>
            </ul>
        </details>
    </div>

    <!-- bagian tengah tampilan desktop -->
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
                    <li><a href="{{ route('admin.candidate.index') }}">Kelola</a></li>
                    <li><a href="{{ route('admin.candidate.create') }}">Tambah</a></li>
                </ul>
            </li>
            <li><a href="{{ route('public.results') }}">Data</a></li>
        </ul>
    </div>

    <!-- bagian kanan -->
    <div class="navbar-end">
        <img src="{{ asset('image/SA.png') }}" alt="Logo" class="object-cover w-10 h-10 lg:hidden md:h-10 md:w-10">
        <a href="{{ route('logout') }}" class="items-center justify-center hidden px-4 py-2 lg:inline-flex btn btn-md">
            Log Out
        </a>
    </div>
</div>

