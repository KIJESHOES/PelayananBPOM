<?php

namespace App\Filament\Resources\JenisLayanans\Pages;

use App\Filament\Resources\JenisLayanans\JenisLayananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJenisLayanan extends EditRecord
{
    protected static string $resource = JenisLayananResource::class;

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