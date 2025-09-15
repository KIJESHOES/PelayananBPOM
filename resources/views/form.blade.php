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

                <div class="w-full text-center mb-10">
                    <span class="text-2xl font-bold text-gray-700 ">Formulir Konsultasi</span>
                </div>

                <!-- Stepper -->
                <div class="flex items-center justify-between mb-8">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center w-full">
                        <div id="step-1" class="flex items-center justify-center w-10 h-10 rounded-full border-2 font-bold
                       text-gray-400 border-gray-300">
                            1
                        </div>
                        <span id="label-1" class="mt-2 text-sm text-gray-500 font-medium">Data Diri</span>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col items-center w-full">
                        <div id="step-2" class="flex items-center justify-center w-10 h-10 rounded-full border-2 font-bold
                       text-gray-400 border-gray-300">
                            2
                        </div>
                        <span id="label-2" class="mt-2 text-sm text-gray-500 font-medium">Data Konsultasi</span>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col items-center w-full">
                        <div id="step-3" class="flex items-center justify-center w-10 h-10 rounded-full border-2 font-bold
                       text-gray-400 border-gray-300">
                            3
                        </div>
                        <span id="label-3" class="mt-2 text-sm text-gray-500 font-medium">Konfirmasi</span>
                    </div>
                </div>


                <form action="{{ route('konsultasi.store') }}" method="POST" id="wizardForm">
                    @csrf

                    <div class="bg-white space-y-8">

                        <!-- Data diri -->
                        <div id="slide-1" class="slide">
                            <div class="md:px-10 px-6">
                                <!-- Kolom form full di card pada desktop -->
                                <div class="space-y-5">
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Nama</label>
                                        <div class="w-full inline-flex border border-gray-200">
                                            <div class="w-12 pt-2 text-center bg-gray-100">
                                                <i class="ti ti-user text-xl"></i>
                                            </div>
                                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
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
                                            <input type="email" name="email" id="email" value="{{ old('email') }}"
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
                                            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                                                class="w-full border-0 focus:outline-none focus:text-gray-600 focus:border-gray-200 focus:ring-gray-200 p-2"
                                                placeholder="08xxxxxxxxxx" required />
                                            <span class="text-sm text-red-500 mt-1 hidden" id="error-no_hp">Nomor HP wajib
                                                diisi</span>

                                        </div>
                                    </div>
                                    <div>
                                        <label
                                            class="text-sm font-medium text-gray-600 block mb-2">Instansi/Perusahaan</label>
                                        <div class="w-full inline-flex border border-gray-200">
                                            <div class="w-12 pt-2 text-center bg-gray-100">
                                                <i class="ti ti-building-skyscraper text-xl"></i>
                                            </div>
                                            <input type="text" name="instansi" id="instansi" value="{{ old('instansi') }}"
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
                                            <textarea id="alamat" name="alamat" rows="3"
                                                placeholder="Masukkan alamat lengkap"
                                                class="flex-1 border-0 p-2 focus:outline-none focus:ring-0 resize-none"
                                                required>{{ old('alamat') }}</textarea>

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
                                <div class="space-y-5">
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Perihal</label>
                                        <div class="w-full inline-flex border border-gray-200">
                                            <div class="w-12 pt-2 text-center bg-gray-100">
                                                <i class="ti ti-notes text-xl"></i>
                                            </div>
                                            <input type="text" name="perihal" id="perihal" value="{{ old('perihal') }}"
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
                                                <i class="ti ti-calendar-event text-xl text-gray-900"></i>
                                            </div>
                                            <input type="date" name="tanggal_konsultasi" id="tanggal_konsultasi"
                                                value="{{ old('tanggal_konsultasi') }}"
                                                class="flex-1 border-0 p-2 focus:outline-none focus:ring-0" required/>
                                            <span class="text-sm text-red-500 mt-1 hidden"
                                                id="error-tanggal_konsultasi">Tanggal wajib diisi</span>

                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-600 block mb-2">Pilih Loket</label>
                                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                                            <div class="w-12 flex items-center justify-center">
                                                <i class="ti ti-building text-xl text-gray-900"></i>
                                            </div>
                                            <select name="loket_id" id="loket_id" required
                                                class="flex-1 border-0 bg-white px-2 py-2 outline-none">
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
                                                class="flex-1 border-0 bg-white px-2 py-2 outline-none">
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
                                                class="flex-1 border-0 bg-white px-2 py-2 outline-none">
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
                                                <span class="ml-2 text-gray-700">Saya sudah yakin dan siap dihubungi jika diperlukan</span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 🖊️ Tanda Tangan Digital (hanya tampil di slide-3) -->
                                    <div class="mt-6">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanda Tangan:</label>
                                        <canvas id="signature-pad" width="400" height="200"
                                            class="border border-gray-300 rounded-md bg-white"></canvas>
                                        <div class="mt-2 flex gap-3">
                                            <button type="button" id="clear"
                                                class="px-4 py-2 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">
                                                Hapus
                                            </button>
                                        </div>
                                        <input type="hidden" name="ttd" id="ttdInput">
                                    </div>
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
                                <button type="submit" id="submitBtn" disabled class="inline-flex items-center justify-center gap-2 py-2 px-6 rounded-md text-white
                                   bg-emerald-500 hover:bg-emerald-600 transition-all duration-300
                                   disabled:opacity-50 disabled:cursor-not-allowed">
                                    Kirim
                                    <i class="ti ti-arrow-right text-xl"></i>
                                </button>


                            </div>
                        </div>
                        <!-- end konfirmasi -->
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Overlay -->
    <div id="confirmModal"
        class="fixed inset-0 z-50 hidden opacity-0 items-center justify-center bg-black/40 transition-opacity duration-200">
        <!-- Box -->
        <div id="confirmBox"
            class="bg-white rounded-2xl shadow-2xl p-6 max-w-sm w-full text-center transform transition-all duration-200 scale-95 opacity-0">
            <h3 class="text-lg font-bold text-gray-800 mb-3">Konfirmasi</h3>
            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin mengirim formulir konsultasi?</p>
            <div class="flex justify-center gap-4">
                <button id="cancelBtn" type="button"
                    class="px-4 py-2 rounded-md bg-gray-200 text-gray-800 hover:bg-gray-300 transition">Batal</button>
                <button id="confirmBtn" type="button"
                    class="px-4 py-2 rounded-md bg-emerald-500 text-white hover:bg-emerald-600 transition">Ya,
                    Kirim</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script>
        const canvas = document.getElementById('signature-pad');
        const signaturePad = new SignaturePad(canvas);
        const ttdInput = document.getElementById('ttdInput');

        // simpan base64 ke hidden input
        document.getElementById("wizardForm").addEventListener("submit", function (e) {
            if (!signaturePad.isEmpty()) {
                ttdInput.value = signaturePad.toDataURL("image/png");
            }
        });

        // tombol clear
        document.getElementById("clear").addEventListener("click", () => {
            signaturePad.clear();
            ttdInput.value = "";
        });
    </script>
@endsection
