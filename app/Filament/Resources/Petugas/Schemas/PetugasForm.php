<?php

namespace App\Filament\Resources\Petugas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class PetugasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('nama_petugas')
                    ->label('Nama Petugas')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}