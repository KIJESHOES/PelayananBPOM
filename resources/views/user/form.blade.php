{{-- filepath: c:\xampp\htdocs\coba\resources\views\beranda.blade.php --}}
@extends('user.layouts.app')

@section('title', 'Formulir Permohonan Konsultasi - BPOM Bogor')

@section('content')
    <div class="flex items-center justify-center p-4 sm:p-12">
        <div class="w-full max-w-2xl rounded-lg bg-white p-6 shadow-lg sm:p-10">
            <img src="{{ asset('assets/img/contact.png') }}" alt="Survey Form Illustration" class="w-64 h-auto mx-auto" />

            <form action="https://formbold.com/s/FORM_ID" method="POST">
                <!-- Title and Description -->
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-semibold text-gray-800 sm:text-3xl">
                        Formulir Permohonan Konsultasi
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 sm:text-base">
                        Silakan isi form berikut untuk melakukan konsultasi. Pastikan data
                        yang diberikan benar.
                    </p>
                </div>

                <!-- Basic Information -->
                <div class="mb-6">
                    <label for="nama" class="mb-2 block text-sm font-medium text-gray-700">
                        Nama <span class="text-red-500">*</span>
                    </label>

                    <input type="text" name="nama" id="nama" required
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none" />
                </div>

                <div class="mb-6">
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" required
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                        required />
                </div>

                <div class="mb-6">
                    <label for="phone" class="mb-2 block text-sm font-medium text-gray-700">Nomor Handphone <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="phone" id="phone" required
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none" />
                </div>

                <div class="mb-6">
                    <label for="company" class="mb-2 block text-sm font-medium text-gray-700">Instansi/Perusahaan <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="company" id="company" required
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none" />
                </div>

                <div class="mb-6">
                    <label for="alamat" class="mb-2 block text-sm font-medium text-gray-700">Alamat <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="alamat" id="alamat" required
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none" />
                </div>

                <div class="mb-6">
                    <label for="loket" class="mb-2 block text-sm font-medium text-gray-700">
                        Pilih Loket <span class="text-red-500">*</span>
                    </label>

                    <select name="loket" id="loket" required
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                        <option value="">-- Pilih Loket --</option>
                        <option value="kantor-utama">Kantor Utama Balai POM Bogor</option>
                        <option value="mpp-bogor">MPP Kabupaten Bogor</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="jenis-usaha" class="mb-2 block text-sm font-medium text-gray-700">
                        Jenis Usaha/Komoditas <span class="text-red-500">*</span>
                    </label>
                    <select id="jenis-usaha" name="jenis_usaha" required
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                        <option value="">-- Pilih Jenis Usaha --</option>
                        <option value="pangan">Pangan Olahan</option>
                        <option value="obat-bahan-alam">Obat Bahan Alam</option>
                        <option value="obat">Obat</option>
                        <option value="suplemen">Suplemen Kesehatan</option>
                        <option value="kosmetik">Kosmetik</option>
                        <option value="umum">Umum</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="jenis-layanan" class="mb-2 block text-sm font-medium text-gray-700">
                        Jenis Layanan <span class="text-red-500">*</span>
                    </label>
                    <select id="jenis-layanan" name="jenis_layanan" required
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none">
                        <option value="">-- Pilih Jenis Layanan --</option>
                        <option value="informasi-obat">
                            Informasi Obat dan Makanan dan Pengaduan Masyarakat
                        </option>
                        <option value="sertifikasi-cdob">Sertifikasi CDOB</option>
                        <option value="persetujuan-denah">Persetujuan Denah PBF</option>
                        <option value="sertifikasi-cpotb">
                            Sertifikasi CPOTB secara Bertahap
                        </option>
                        <option value="sertifikasi-spa-cpkb">Sertifikasi SPA CPKB</option>
                        <option value="rekomendasi-kosmetik">
                            Penerbitan Rekomendasi sebagai Pemohon Notifikasi Kosmetik
                        </option>
                        <option value="izin-cppob">
                            Penerbitan Izin Penerapan CPPOB
                        </option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="petugas" class="mb-2 block text-sm font-medium text-gray-700">
                        Petugas <span class="text-red-500">*</span>
                    </label>
                    <select id="petugas" name="petugas" required required class="w-full h-12">
                        <option value="">Pilih atau ketik nama petugas</option>
                        <!-- Default kosong -->
                        <option value="Yuniartika Berliani">Yuniartika Berliani</option>
                        <option value="Eva Nikastri">Eva Nikastri</option>
                        <option value="Krisna Ayu">Krisna Ayu</option>
                        <option value="Defika Taqilala">Defika Taqilala</option>
                        <option value="Hefni Humaeda">Hefni Humaeda</option>
                        <option value="Luluatul Khodijah">Luluatul Khodijah</option>
                        <option value="Suci Tresnasari">Suci Tresnasari</option>
                        <option value="Taufik Saputra">Taufik Saputra</option>
                        <option value="Shanty Sarah">Shanty Sarah</option>
                        <option value="Defita Roza">Defita Roza</option>
                        <option value="Ester Junita">Ester Junita</option>
                        <option value="Suci Tresnaeni">Suci Tresnaeni</option>
                        <option value="Laila Khoiriyah">Laila Khoiriyah</option>
                        <option value="Vidia P">Vidia P</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="consultation-date" class="mb-2 block text-sm font-medium text-gray-700">Tanggal Konsultasi
                        <span class="text-red-500">*</span></label>
                    <input type="date" name="consultation-date" id="consultation-date"
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
                        required />
                </div>

                <div class="mb-6">
                    <label for="perihal" class="mb-2 block text-sm font-medium text-gray-700">Perihal <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="perihal" id="perihal" required
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none" />
                </div>

                <!-- Open-Ended Feedback -->
                <div class="mb-6">
                    <label for="liked-most" class="mb-2 block text-sm font-medium text-gray-700">Catatan Konsultasi</label>
                    <textarea name="liked-most" id="liked-most" rows="3"
                        class="w-full rounded-md border border-gray-300 p-3 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"></textarea>
                </div>

                <!-- Follow-up (opsional) -->
                <div class="mb-6 flex items-center">
                    <input type="checkbox" id="follow-up" name="follow_up"
                        class="form-checkbox h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="follow-up" class="ml-2 text-sm text-gray-600">
                        Saya bersedia dihubungi untuk tindak lanjut konsultasi.
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full rounded-md bg-indigo-600 px-6 py-3 font-medium text-white shadow-sm transition duration-300 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none">
                    Kirim Permohonan
                </button>
            </form>
        </div>
    </div>
@endsection
