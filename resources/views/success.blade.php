@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50">
        <div class="bg-white p-8 rounded-lg shadow-md text-center max-w-md">
            <i class="ti ti-circle-check text-emerald-500 text-6xl mb-4"></i>
            <h2 class="text-2xl font-bold text-gray-700 mb-2">Berhasil!</h2>
            <p class="text-gray-600 mb-6">
                {{ session('success') ?? 'Form konsultasi Anda sudah terkirim.' }}
            </p>
            <p class="text-sm text-gray-500">Anda akan diarahkan kembali ke form dalam 5 detik...</p>
        </div>
    </div>

    <script>
        // Setelah 5 detik auto redirect ke form
        setTimeout(() => {
            window.location.href = "{{ route('konsultasi.create') }}";
        }, 5000);

        // Kalau halaman ini di-refresh → langsung redirect ke form
        if (performance.navigation.type === performance.navigation.TYPE_RELOAD) {
            window.location.href = "{{ route('konsultasi.create') }}";
        }
    </script>
@endsection
