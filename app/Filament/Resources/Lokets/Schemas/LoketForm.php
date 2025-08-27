<?php

namespace App\Filament\Resources\Lokets\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class LoketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
            Forms\Components\TextInput::make('nama_loket')
                ->label('Nama Loket')
                ->required()
                ->maxLength(255),
        ]);
    }
}