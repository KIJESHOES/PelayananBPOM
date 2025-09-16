<?php

namespace App\Filament\Resources\Petugas\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PetugasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Forms\Components\TextInput::make('nama_petugas')
                ->label('Nama Petugas')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('tanda_tangan_upload')
                ->label('Upload Tanda Tangan')
                ->image()
                ->disk('public') // tujuan akhirnya public
                ->directory('tanda_tangan')
                ->maxSize(2048),
        ]);
    }
}
