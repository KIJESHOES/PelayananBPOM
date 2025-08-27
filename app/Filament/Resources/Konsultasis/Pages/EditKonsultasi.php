<?php

namespace App\Filament\Resources\Konsultasis\Pages;

use App\Filament\Resources\Konsultasis\KonsultasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKonsultasi extends EditRecord
{
    protected static string $resource = KonsultasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    // Tambahkan ini biar setelah save langsung balik ke index
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}