<?php

namespace App\Filament\Resources\Konsultasis\Pages;

use App\Filament\Resources\Konsultasis\KonsultasiResource;
use Filament\Resources\Pages\ListRecords;

class ListKonsultasis extends ListRecords
{
    protected static string $resource = KonsultasiResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public static function getLabel(): string
    {
        return 'Permohonan Konsultasi'; // 👈 ini buat judul halaman create/edit
    }
}