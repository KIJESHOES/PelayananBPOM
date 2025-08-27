<?php

namespace App\Filament\Resources\Lokets\Pages;

use App\Filament\Resources\Lokets\LoketResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLoket extends EditRecord
{
    protected static string $resource = LoketResource::class;

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