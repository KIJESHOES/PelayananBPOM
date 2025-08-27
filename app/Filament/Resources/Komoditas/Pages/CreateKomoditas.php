<?php

namespace App\Filament\Resources\Komoditas\Pages;

use App\Filament\Resources\Komoditas\KomoditasResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKomoditas extends CreateRecord
{
    protected static string $resource = KomoditasResource::class;

        // Tambahkan ini biar setelah save langsung balik ke index
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}