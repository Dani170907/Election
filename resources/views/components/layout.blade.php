<!DOCTYPE html>
<html lang="en" data-theme="light">{{-- pengaturan tema (light, dark, synthwave) --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Sistem Voting' }}</title>
</head>
<body class="text-gray-800 bg-gray-100">

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
