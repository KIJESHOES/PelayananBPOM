<?php

namespace App\Filament\Resources\JenisLayanans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class JenisLayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('nama_layanan')
                    ->label('Nama Layanan')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
