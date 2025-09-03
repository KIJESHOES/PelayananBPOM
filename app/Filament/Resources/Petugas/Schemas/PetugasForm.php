<?php

namespace App\Filament\Resources\Petugas\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

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
                ->directory('tanda_tangan')
                ->maxSize(2048)
                ->helperText(new HtmlString('<em>Format gambar: PNG, JPG, JPEG. Maksimal ukuran: 2 MB.</em>'))
                ->extraAttributes(['class' => 'italic text-sm'])
                ->downloadable()
                ->openable()
                ->required(),
        ]);
    }
}