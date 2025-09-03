<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Log::info('Scheduler jalan: ' . now());

            \App\Models\Konsultasi::where('status', 'pending')
                ->where('tanggal_konsultasi', '<', now()->subHours(12))
                ->update(['status' => 'gagal']);
        })->everyMinute();
    }



    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}