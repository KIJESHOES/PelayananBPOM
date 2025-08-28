<?php

namespace App\Filament\Resources\Konsultasis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Closure;


class KonsultasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('no_hp')->label('No. HP'),
                Forms\Components\TextInput::make('instansi'),
                Forms\Components\Textarea::make('alamat'),

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

                Forms\Components\Select::make('petugas_id')
                    ->relationship('petugas', 'nama_petugas')
                    ->label('Petugas')
                    ->searchable()
                    ->required(fn($get) => !$get('nama_petugas_manual')) // wajib kalau manual kosong
                    ->visible(fn($get) => !$get('nama_petugas_manual')), // sembunyikan jika manual diisi

                Forms\Components\TextInput::make('nama_petugas_manual')
                    ->label('Nama Petugas Lainnya')
                    ->required(fn($get) => !$get('petugas_id')) // wajib kalau master kosong
                    ->placeholder('Isi jika tidak memilih petugas dari master')
                    ->visible(fn($get) => !$get('petugas_id')), // sembunyikan jika master dipilih

                Forms\Components\DatePicker::make('tanggal_konsultasi')->required(),
                Forms\Components\TextInput::make('perihal'),
                Forms\Components\Textarea::make('catatan_konsultasi'),
                Forms\Components\Textarea::make('tindak_lanjut'),
            ]);
    }
}