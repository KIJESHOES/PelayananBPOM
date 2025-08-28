<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Konsultasi;
use App\Jobs\SendKonsultasiPdfJob;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            Konsultasi::where('status', 'pending')
                ->where('tanggal_konsultasi', '<=', now()->subHours(12))
                ->get()
                ->each(fn($konsultasi) => SendKonsultasiPdfJob::dispatch($konsultasi));
        })->everyFiveMinutes(); // cek tiap 5 menit
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}