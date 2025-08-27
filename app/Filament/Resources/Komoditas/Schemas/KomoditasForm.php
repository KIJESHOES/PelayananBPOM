<?php

namespace App\Filament\Resources\Komoditas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class KomoditasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('nama_komoditas')
                    ->label('Nama Komoditas')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
