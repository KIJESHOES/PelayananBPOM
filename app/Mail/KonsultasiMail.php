<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KonsultasiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $konsultasi;
    public $pdf;

    public function __construct($konsultasi, $pdf)
    {
        $this->konsultasi = $konsultasi;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->subject('Laporan Konsultasi - '.$this->konsultasi->nama)
            ->view('emails.konsultasi')
            ->with(['konsultasi' => $this->konsultasi])
            ->attachData($this->pdf, 'konsultasi.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}