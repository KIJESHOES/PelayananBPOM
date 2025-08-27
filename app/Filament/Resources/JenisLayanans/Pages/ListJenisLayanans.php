<?php

namespace App\Filament\Resources\JenisLayanans\Pages;

use App\Filament\Resources\JenisLayanans\JenisLayananResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJenisLayanans extends ListRecords
{
    protected static string $resource = JenisLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
