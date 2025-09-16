<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Komoditas;
use App\Models\JenisLayanan;
use App\Models\Petugas;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use App\Models\User;

class KonsultasiController extends Controller
{
    // Tampilkan form
    public function create()
    {
        $lokets = Loket::all();
        $komoditas = Komoditas::all();
        $jenisLayanan = JenisLayanan::all();
        $petugas = Petugas::all();

        return view('form', compact('lokets', 'komoditas', 'jenisLayanan', 'petugas'));
    }

    // Simpan data form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'instansi' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'loket_id' => 'required|exists:lokets,id',
            'komoditas_id' => 'required|exists:komoditas,id',
            'jenis_layanan_id' => 'required|exists:jenis_layanans,id',
            'tanggal_konsultasi' => 'required|date',
            'perihal' => 'required|string|max:255',

            'petugas_id' => 'nullable',

            
        ]);

        if ($request->filled('signature')) {
            $image = str_replace('data:image/png;base64,', '', $request->signature);
            $image = str_replace(' ', '+', $image);

            $imageName = "ttd_" . time() . ".png";
            $path = "tanda_tangan/{$imageName}";

            \Illuminate\Support\Facades\Storage::disk('public')->put(
                $path,
                base64_decode($image)
            );

            $validated['signature'] = $path;
        }

        // simpan data
        $konsultasi = Konsultasi::create($validated + ['status' => 'pending']);

        // notif admin
        $admins = User::where('is_admin', true)->get();
        foreach ($admins as $admin) {
            $admin->notifyNow(new \App\Notifications\KonsultasiBaru($konsultasi));
        }

        return redirect()
            ->route('konsultasi.success')
            ->with('success', 'Formulir konsultasi berhasil dikirim!');
    }


}
