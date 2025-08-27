<?php

namespace App\Filament\Resources\Lokets\Pages;

use App\Filament\Resources\Lokets\LoketResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLoket extends CreateRecord
{
    protected static string $resource = LoketResource::class;

    // Tambahkan ini biar setelah save langsung balik ke index
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}