{{-- filepath: resources/views/form.blade.php --}}
@extends('layouts.app')

@section('title', 'Formulir Permohonan Konsultasi - BPOM Bogor')

@section('content')
    <section class="py-20 px-4 min-h-screen flex items-center justify-center">
        <div class="container">
            <div class="max-w-3xl mx-auto rounded-xl border border-gray-200 overflow-hidden shadow-2xl bg-white">
                <div class="bg-white p-8 flex items-center justify-center gap-4">
                    <img src="{{ asset('assets/img/logo-filament.png') }}" class="h-12" alt="Logo Filament" />
                </div>

                <form action="{{ route('konsultasi.store') }}" method="POST" id="wizardForm">
                    @csrf
                    <div class="bg-white space-y-8">
                        <div class="w-full text-center">
                            <span class="text-2xl font-bold text-gray-700">Formulir Konsultasi</span>
                        </div>

                        <!-- Data diri -->
                        <div id="slide-1" class="slide">
                            <div class="md:px-10 px-6">
                                <!-- Judul Data Diri di atas -->
                                <h2 class="font-semibold text-gray-700 mb-6 md:text-left">
                                    Data Diri
                                </h2>
                                <!-- Kolom form full di card pada desktop -->
                                <div class="space-y-5">
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Nama</label>
                                        <div class="w-full inline-flex border border-gray-200">
                                            <div class="w-12 pt-2 text-center bg-gray-100">
                                                <i class="ti ti-user text-xl"></i>
                                            </div>
                                            <input type="text" name="nama"
                                                class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2"
                                                placeholder="Nama Lengkap" required />
                                            <span class="text-sm text-red-500 mt-1 hidden" id="error-nama">Nama wajib
                                                diisi</span>
                                        </div>

                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Email</label>
                                        <div class="w-full inline-flex border border-gray-200">
                                            <div class="w-12 pt-2 text-center bg-gray-100">
                                                <i class="ti ti-mail text-xl"></i>
                                            </div>
                                            <input type="email" name="email"
                                                class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2"
                                                placeholder="email@example.com" required />
                                            <span class="text-sm text-red-500 mt-1 hidden" id="error-email">Email wajib
                                                diisi</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Nomor HP</label>
                                        <div class="w-full inline-flex border border-gray-200">
                                            <div class="w-12 pt-2 text-center bg-gray-100">
                                                <i class="ti ti-phone text-xl"></i>
                                            </div>
                                            <input type="text" name="no_hp"
                                                class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2"
                                                placeholder="08xxxxxxxxxx" required />
                                            <span class="text-sm text-red-500 mt-1 hidden" id="error-no.hp">Nomor HP
                                                wajib diisi</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label
                                            class="text-sm font-medium text-gray-600 block mb-2">Instansi/Perusahaan</label>
                                        <div class="w-full inline-flex border border-gray-200">
                                            <div class="w-12 pt-2 text-center bg-gray-100">
                                                <i class="ti ti-building-skyscraper text-xl"></i>
                                            </div>
                                            <input type="text" name="instansi"
                                                class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2"
                                                placeholder="Nama Instansi/Perusahaan" required />
                                            <span class="text-sm text-red-500 mt-1 hidden" id="error-instansi">Instansi
                                                Wajib diisi</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Alamat</label>
                                        <div class="w-full inline-flex border border-gray-200">
                                            <div class="w-12 pt-2 text-center bg-gray-100">
                                                <i class="ti ti-map-pin text-xl"></i>
                                            </div>
                                            <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap"
                                                class="flex-1 border-0 p-2 focus:outline-none focus:ring-0 resize-none" required></textarea>
                                            <span class="text-sm text-red-500 mt-1 hidden" id="error-alamat">Alamat
                                                wajib diisi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 md:p-10 pt-6 flex justify-end text-gray-500">
                                <button type="button" id="next1"
                                    class="inline-flex items-center justify-center gap-2 py-2 px-6 rounded-md text-white bg-sky-500 hover:bg-sky-600 transition-all duration-300"
                                    disabled>
                                    Lanjut
                                    <i class="ti ti-arrow-right text-xl"></i>
                                </button>
                            </div>
                        </div>
                        <!-- end data diri -->

                        <!-- Data Konsultasi -->
                        <div id="slide-2" class="slide hidden">
                            <div class="md:px-10 px-6">
                                <h2 class="font-semibold text-gray-700 mb-6 md:text-left">
                                    Data Konsultasi
                                </h2>
                                <div class="space-y-5">
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Perihal</label>
                                        <div class="w-full inline-flex border border-gray-200">
                                            <div class="w-12 pt-2 text-center bg-gray-100">
                                                <i class="ti ti-user text-xl"></i>
                                            </div>
                                            <input type="text" name="perihal"
                                                class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2"
                                                placeholder="Perihal" required />
                                            <span class="text-sm text-red-500 mt-1 hidden" id="error-perihal">Perihal
                                                wajib diisi</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="tanggal_konsultasi"
                                            class="text-sm font-medium text-gray-600 block mb-2">
                                            Tanggal Konsultasi
                                        </label>
                                        <div class="flex items-center border border-gray-200 rounded-md overflow-hidden">
                                            <div class="w-12 flex items-center justify-center">
                                                <i class="ti ti-calendar-event text-xl text-gray-500"></i>
                                            </div>
                                            <input type="date" id="tanggal_konsultasi" name="tanggal_konsultasi"
                                                class="flex-1 border-0 p-2 focus:outline-none focus:ring-0" />
                                            <span class="text-sm text-red-500 mt-1 hidden" id="error-nama">Tanggal Wajib
                                                diisi</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Pilih Loket</label>
                                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                                            <div class="w-12 flex items-center justify-center">
                                                <i class="ti ti-building text-xl text-gray-900"></i>
                                            </div>
                                            <select name="loket_id" id="loket_id" required
                                                class="tom-select flex-1 border-0 bg-white">
                                                <option value="">-- Pilih Loket --</option>
                                                @foreach ($lokets as $loket)
                                                    <option value="{{ $loket->id }}">{{ $loket->nama_loket }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Jenis Usaha /
                                            Komoditas</label>
                                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                                            <div class="w-12 flex items-center justify-center">
                                                <i class="ti ti-package text-xl text-gray-900"></i>
                                            </div>
                                            <select id="komoditas_id" name="komoditas_id" required
                                                class="tom-select flex-1 border-0 bg-white">
                                                <option value="">-- Pilih Komoditas --</option>
                                                @foreach ($komoditas as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('komoditas_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_komoditas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Jenis
                                            Layanan</label>
                                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                                            <div class="w-12 flex items-center justify-center">
                                                <i class="ti ti-briefcase text-xl text-gray-900"></i>
                                            </div>
                                            <select id="jenis_layanan_id" name="jenis_layanan_id" required
                                                class="tom-select flex-1 border-0 bg-white">
                                                <option value="">-- Pilih Jenis Layanan --</option>
                                                @foreach ($jenisLayanan as $layanan)
                                                    <option value="{{ $layanan->id }}"
                                                        {{ old('jenis_layanan_id') == $layanan->id ? 'selected' : '' }}>
                                                        {{ $layanan->nama_layanan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Petugas</label>
                                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                                            <div class="w-12 flex items-center justify-center">
                                                <i class="ti ti-users text-xl text-gray-900"></i>
                                            </div>
                                            <select id="petugas_id" name="petugas_id"
                                                class="tom-select flex-1 border-0 bg-white">
                                                <option value="">-- Pilih Petugas --</option>
                                                @foreach ($petugas as $p)
                                                    <option value="{{ $p->id }}"
                                                        {{ old('petugas_id') == $p->id ? 'selected' : '' }}>
                                                        {{ $p->nama_petugas }}
                                                    </option>
                                                @endforeach
                                                <option value="manual" class="text-gray-400 italic"
                                                    style="color:#9ca3af; font-style:italic;"
                                                    {{ old('petugas_id') == 'manual' ? 'selected' : '' }}>
                                                    Lainnya...
                                                </option>
                                            </select>
                                        </div>
                                        <!-- Input manual -->
                                        <input type="text" name="nama_petugas_manual" id="nama_petugas_manual"
                                            placeholder="Masukkan nama petugas"
                                            class="mt-3 hidden w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none" />
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 md:p-10 pt-6 flex justify-between text-gray-500">
                                <button type="button" id="back2"
                                    class="inline-flex items-center justify-center gap-2 py-2 px-6 rounded-md text-white bg-gray-400 hover:bg-gray-500 transition-all duration-300">
                                    <i class="ti ti-arrow-left text-xl"></i>
                                    Kembali
                                </button>
                                <button type="button" id="next2"
                                    class="inline-flex items-center justify-center gap-2 py-2 px-6 rounded-md text-white bg-sky-500 hover:bg-sky-600 transition-all duration-300"
                                    disabled>
                                    Lanjut
                                    <i class="ti ti-arrow-right text-xl"></i>
                                </button>
                            </div>
                        </div>
                        <!-- end data konsultasi -->

                        <!-- konfirmasi -->
                        <div id="slide-3" class="slide hidden">
                            <div class="md:px-10 px-6">
                                <h2 class="font-semibold text-gray-700 mb-6 md:text-left">
                                    Konfirmasi
                                </h2>
                                <div class="space-y-5">
                                    <div
                                        class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 rounded-lg p-4">
                                        <span class="mt-1 text-emerald-600">
                                            <i class="ti ti-info-circle text-2xl"></i>
                                        </span>
                                        <div>
                                            <p class="text-gray-700">
                                                Pastikan seluruh data yang Anda isi sudah benar.
                                                Dengan menekan tombol di bawah, Anda menyatakan
                                                <span class="font-semibold text-emerald-700">siap dihubungi</span>
                                                oleh petugas bila diperlukan.
                                            </p>
                                            <label class="flex items-center mt-4 select-none">
                                                <input type="checkbox" id="confirmCheck"
                                                    class="form-checkbox h-5 w-5 text-emerald-600 rounded focus:ring-emerald-500"
                                                    required />
                                                <span class="ml-2 text-gray-700">Saya sudah yakin dan siap dihubungi
                                                    jika
                                                    diperlukan</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 md:p-10 pt-6 flex justify-between text-gray-500">
                                <button type="button" id="back3"
                                    class="inline-flex items-center justify-center gap-2 py-2 px-6 rounded-md text-white bg-gray-400 hover:bg-gray-500 transition-all duration-300">
                                    <i class="ti ti-arrow-left text-xl"></i>
                                    Kembali
                                </button>
                                <button type="button" id="submit" disabled
                                    class="inline-flex items-center justify-center gap-2 py-2 px-6 rounded-md text-white bg-emerald-500 hover:bg-emerald-600 transition-all duration-300">
                                    Kirim
                                    <i class="ti ti-arrow-right text-xl"></i>
                                </button>
                            </div>
                        </div>
                        <!-- end data diri -->
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full text-center">
            <h3 class="text-lg font-bold mb-4">Konfirmasi</h3>
            <p class="mb-6">Apakah Anda yakin ingin mengirim formulir konsultasi?</p>
            <div class="flex justify-center gap-4">
                <button id="cancelBtn" type="button"
                    class="px-4 py-2 rounded-md bg-gray-300 hover:bg-gray-400 transition">Batal</button>
                <button id="confirmBtn" type="button"
                    class="px-4 py-2 rounded-md bg-emerald-500 text-white hover:bg-emerald-600 transition">Ya,
                    Kirim</button>
            </div>
        </div>
    </div>
@endsection
