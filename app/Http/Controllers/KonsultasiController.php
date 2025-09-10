<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Komoditas;
use App\Models\JenisLayanan;
use App\Models\Petugas;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\KonsultasiBaru;

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
            'nama_petugas_manual' => 'nullable|string|max:255',
        ]);

        // Validasi custom
        if ($request->petugas_id === 'manual') {
            if (!$request->filled('nama_petugas_manual')) {
                return back()
                    ->withErrors(['nama_petugas_manual' => 'Silakan isi nama petugas manual.'])
                    ->withInput();
            }
            $validated['petugas_id'] = null;
        } elseif ($request->filled('petugas_id')) {
            if (!\App\Models\Petugas::where('id', $request->petugas_id)->exists()) {
                return back()
                    ->withErrors(['petugas_id' => 'Petugas yang dipilih tidak valid.'])
                    ->withInput();
            }
            $validated['nama_petugas_manual'] = null;
        } else {
            return back()
                ->withErrors(['petugas_id' => 'Silakan pilih petugas atau isi nama manual.'])
                ->withInput();
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