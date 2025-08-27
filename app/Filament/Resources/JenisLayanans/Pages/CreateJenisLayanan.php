<?php

namespace App\Filament\Resources\JenisLayanans\Pages;

use App\Filament\Resources\JenisLayanans\JenisLayananResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJenisLayanan extends CreateRecord
{
    protected static string $resource = JenisLayananResource::class;

    // Tambahkan ini biar setelah save langsung balik ke index
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}