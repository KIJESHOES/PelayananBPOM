<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @include('user.partials.head') {{-- Bisa berisi link CSS, meta tag, dll --}}
</head>
<body>


    <main>
        @yield('content') {{-- Isi konten utama tiap halaman --}}
    </main>

    @include('user.partials.scripts') {{-- JS scripts --}}
</body>
</html>
