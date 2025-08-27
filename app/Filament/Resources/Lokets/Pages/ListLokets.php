<?php

namespace App\Filament\Resources\Lokets\Pages;

use App\Filament\Resources\Lokets\LoketResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLokets extends ListRecords
{
    protected static string $resource = LoketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
