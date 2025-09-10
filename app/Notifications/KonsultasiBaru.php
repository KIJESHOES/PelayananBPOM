<?php

namespace App\Notifications;

use App\Models\Konsultasi;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class KonsultasiBaru extends Notification
{
    use Queueable;

    protected Konsultasi $konsultasi;

    /**
     * Create a new notification instance.
     */
    public function __construct(Konsultasi $konsultasi)
    {
        $this->konsultasi = $konsultasi;
    }

    /**
     * Tentukan channel notifikasi.
     */
    public function via(object $notifiable): array
    {
        // Hanya database
        return ['database'];

        // Jika ingin database + email:
        // return ['database', 'mail'];
    }

    /**
     * Data untuk database notifications.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Konsultasi Baru',
            'body' => 'Pengguna ' . $this->konsultasi->nama . ' mengirim permohonan konsultasi.',
            // URL langsung ke admin Filament resource
            'url' => url('/admin/resources/konsultasis'),
        ];
    }

    /**
     * Jika juga ingin kirim via email.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Konsultasi Baru')
            ->line('Pengguna ' . $this->konsultasi->nama . ' mengirim permohonan konsultasi.')
            ->action('Lihat Detail', url('/admin/resources/konsultasis'));
    }

    /**
     * Array representation.
     */
    public function toArray(object $notifiable): array
    {
        return [];
    }
}