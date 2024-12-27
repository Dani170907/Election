<!DOCTYPE html>
<html lang="en" data-theme="light">{{-- pengaturan tema (light, dark, synthwavem) --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Sistem Voting' }}</title>
</head>
<body>

    <!-- Navigasi-->
    <x-header>
        {{-- {{ $title }} --}}
    </x-header>

    <!-- Konten -->
    <main>
        {{ $slot }}
    </main>

</body>
</html>
