<?php

namespace App\Filament\Resources\Konsultasis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;


class KonsultasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('no_hp')->label('No. HP'),
                Forms\Components\TextInput::make('instansi')->required(),

                Forms\Components\Select::make('loket_id')
                    ->relationship('loket', 'nama_loket')
                    ->label('Loket')
                    ->required(),

                Forms\Components\Select::make('komoditas_id')
                    ->relationship('komoditas', 'nama_komoditas')
                    ->label('Komoditas')
                    ->required(),

                Forms\Components\Select::make('jenis_layanan_id')
                    ->relationship('jenisLayanan', 'nama_layanan')
                    ->label('Jenis Layanan')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_konsultasi')->required(),

                Forms\Components\Select::make('petugas_id')
                    ->relationship('petugas', 'nama_petugas')
                    ->label('Petugas')
                    ->searchable()
                    ->required(),

                Forms\Components\Textarea::make('alamat')->required(),
                Forms\Components\Textarea::make('catatan_konsultasi')->required(),
                Forms\Components\Textarea::make('tindak_lanjut')->required(),
            ]);
    }
}
