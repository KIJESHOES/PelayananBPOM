<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @include('partials.head') {{-- Bisa berisi link CSS, meta tag, dll --}}
</head>

<body>


    <main>
        @yield('content') {{-- Isi konten utama tiap halaman --}}
        @include('partials.scripts') {{-- JS scripts --}}
    </main>


</body>

</html>
