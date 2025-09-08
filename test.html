{{-- filepath: resources/views/form.blade.php --}}
@extends('layouts.app')

@section('title', 'Formulir Permohonan Konsultasi - BPOM Bogor')

@section('content')
    <div class="flex items-center justify-center p-4 sm:p-12">
        <div class="w-full max-w-2xl rounded-lg bg-white p-6 shadow-lg sm:p-10">
            <img src="{{ asset('assets/img/contact.png') }}" alt="Survey Form Illustration" class="w-64 h-auto mx-auto" />

            {{-- Pesan sukses --}}
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('konsultasi.store') }}" method="POST" id="wizardForm">
                @csrf

                <!-- Progress -->
                <div class="flex items-center justify-between mb-8">
                    <div id="step1Indicator" class="flex-1 text-center font-medium text-indigo-600">1. Data Diri</div>
                    <div class="flex-1 border-t border-gray-300 mx-2"></div>
                    <div id="step2Indicator" class="flex-1 text-center text-gray-400">2. Detail Konsultasi</div>
                </div>

                <!-- Step 1 -->
                <div id="step1" class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800">Data Diri & Instansi</h2>

                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email <span
                                class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    </div>

                    <!-- No HP -->
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor Handphone <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" required
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    </div>

                    <!-- Instansi -->
                    <div>
                        <label for="instansi" class="block text-sm font-medium text-gray-700">Instansi/Perusahaan <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="instansi" id="instansi" value="{{ old('instansi') }}" required
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat <span
                                class="text-red-500">*</span></label>
                        <textarea name="alamat" id="alamat" required rows="2"
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('alamat') }}</textarea>
                    </div>
                </div>

                <!-- Step 2 -->
                <div id="step2" class="space-y-6 hidden">
                    <h2 class="text-xl font-semibold text-gray-800">Detail Konsultasi</h2>

                    <!-- Tanggal Konsultasi -->
                    <div class="mb-6">
                        <label for="tanggal_konsultasi" class="mb-2 block text-sm font-medium text-gray-700">
                            Tanggal Konsultasi <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_konsultasi" id="tanggal_konsultasi"
                            value="{{ old('tanggal_konsultasi') }}"
                            class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm
                    focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                            required />
                    </div>

                    <!-- Perihal -->
                    <div class="mb-6">
                        <label for="perihal" class="mb-2 block text-sm font-medium text-gray-700">
                            Perihal <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="perihal" id="perihal" value="{{ old('perihal') }}" required
                            class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm
                    focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none" />
                    </div>

                    <!-- Loket -->
                    <div class="mb-6">
                        <label for="loket_id" class="mb-2 block text-sm font-medium text-gray-700">
                            Pilih Loket <span class="text-red-500">*</span>
                        </label>
                        <select name="loket_id" id="loket_id" required
                            class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm
                    focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                            <option value="">-- Pilih Loket --</option>
                            @foreach ($lokets as $loket)
                                <option value="{{ $loket->id }}">{{ $loket->nama_loket }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Komoditas -->
                    <div class="mb-6">
                        <label for="komoditas_id" class="mb-2 block text-sm font-medium text-gray-700">
                            Jenis Usaha/Komoditas <span class="text-red-500">*</span>
                        </label>
                        <select name="komoditas_id" id="komoditas_id" required
                            class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm
                    focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                            <option value="">-- Pilih Komoditas --</option>
                            @foreach ($komoditas as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('komoditas_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_komoditas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jenis Layanan -->
                    <div class="mb-6">
                        <label for="jenis_layanan_id" class="mb-2 block text-sm font-medium text-gray-700">
                            Jenis Layanan <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis_layanan_id" id="jenis_layanan_id" required
                            class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm
                    focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                            <option value="">-- Pilih Jenis Layanan --</option>
                            @foreach ($jenisLayanan as $layanan)
                                <option value="{{ $layanan->id }}"
                                    {{ old('jenis_layanan_id') == $layanan->id ? 'selected' : '' }}>
                                    {{ $layanan->nama_layanan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Petugas -->
                    <div class="mb-6">
                        <label for="petugas_id" class="mb-2 block text-sm font-medium text-gray-700">
                            Petugas <span class="text-red-500">*</span>
                        </label>

                        <select name="petugas_id" id="petugas_id"
                            class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm
        focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                            <option value="">-- Pilih Petugas --</option>
                            @foreach ($petugas as $p)
                                <option value="{{ $p->id }}" {{ old('petugas_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama_petugas }}
                                </option>
                            @endforeach
                            <option value="manual" class="text-gray-400 italic" style="color:#9ca3af; font-style:italic;"
                                {{ old('petugas_id') == 'manual' ? 'selected' : '' }}>
                                Lainnya...
                            </option>
                        </select>

                        <!-- Input manual hanya muncul kalau pilih "manual" -->
                        <input type="text" name="nama_petugas_manual" id="nama_petugas_manual"
                            placeholder="Masukkan nama petugas" value="{{ old('nama_petugas_manual') }}"
                            class="mt-3 hidden w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm
        focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none" />

                        @error('petugas_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <!-- Navigation Buttons -->
                <div class="mt-8 flex justify-between">
                    <button type="button" id="prevBtn"
                        class="hidden rounded-md bg-gray-300 px-4 py-2 text-gray-700">Sebelumnya</button>
                    <button type="button" id="nextBtn"
                        class="rounded-md bg-indigo-600 px-4 py-2 text-white">Lanjut</button>
                    <button type="submit" id="submitBtn"
                        class="hidden rounded-md bg-green-600 px-4 py-2 text-white">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection
