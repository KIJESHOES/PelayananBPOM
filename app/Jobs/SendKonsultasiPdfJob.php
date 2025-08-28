<?php

namespace App\Jobs;

use App\Mail\KonsultasiMail;
use App\Models\Konsultasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendKonsultasiPdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $konsultasi;

    public function __construct(Konsultasi $konsultasi)
    {
        $this->konsultasi = $konsultasi;
    }

    public function handle()
    {
        if ($this->konsultasi->status !== 'pending') {
            return; // hanya kirim jika masih pending
        }

        $pdf = Pdf::loadView('pdf.konsultasi', [
            'konsultasi' => $this->konsultasi,
        ])->output();

        Mail::to($this->konsultasi->email)
            ->send(new KonsultasiMail($this->konsultasi, $pdf));

        $this->konsultasi->status = 'terkirim';
        $this->konsultasi->save();
    }
}