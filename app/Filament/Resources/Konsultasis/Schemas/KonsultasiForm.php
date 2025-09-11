<?php

namespace App\Filament\Resources\Konsultasis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components as Forms;                // field components (TextInput, Select, DatePicker, Textarea)
use Filament\Schemas\Components\Tabs;                  // Tabs container
use Filament\Schemas\Components\Tabs\Tab;              // Tab item
use Filament\Schemas\Components\Fieldset;              // Fieldset (label + container)
use App\Models\Petugas;                                // Model Petugas for relationship and datalist

class KonsultasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Konsultasi')
                    ->contained(false)->columnSpanFull()
                    ->tabs([
                        Tab::make('Data Pemohon')
                            ->schema([
                                Fieldset::make('Data Pemohon')
                                    ->schema([
                                        Forms\TextInput::make('nama')->required(),
                                        Forms\TextInput::make('email')->email()->required(),
                                        Forms\TextInput::make('no_hp')->label('No. HP'),
                                        Forms\TextInput::make('instansi')->required(),
                                        Forms\Textarea::make('alamat')->required(),
                                    ]),
                            ]),

                        Tab::make('Detail Konsultasi')
                            ->schema([
                                Fieldset::make('Detail Konsultasi')
                                    ->schema([
                                        Forms\Select::make('loket_id')
                                            ->relationship('loket', 'nama_loket')
                                            ->label('Loket')
                                            ->required(),

                                        Forms\Select::make('komoditas_id')
                                            ->relationship('komoditas', 'nama_komoditas')
                                            ->label('Komoditas')
                                            ->required(),

                                        Forms\Select::make('jenis_layanan_id')
                                            ->relationship('jenisLayanan', 'nama_layanan')
                                            ->label('Jenis Layanan')
                                            ->required(),
                                    ]),
                            ]),

                        // Tab Petugas + Jadwal & Catatan
                        Tab::make('Petugas & Catatan')
                            ->schema([
                                Fieldset::make('Petugas')
                                    ->schema([
                                        // hidden id (akan di-set otomatis jika nama petugas ada di DB)
                                        Forms\Select::make('petugas_id')
                                            ->label('Nama Petugas')
                                            ->relationship('petugas', 'nama_petugas') // relasi ke model Petugas
                                            ->searchable() // bisa ketik untuk cari
                                            ->preload()    // preload data biar dropdown cepat (opsional)
                                            ->required()
                                            ->helperText('Pilih nama petugas dari database'),

                                    ]),

                                Fieldset::make('Jadwal & Catatan')
                                    ->schema([
                                        Forms\DatePicker::make('tanggal_konsultasi')->required(),
                                        Forms\TextInput::make('perihal')->required(),
                                        Forms\Textarea::make('catatan_konsultasi')->required(),
                                        Forms\Textarea::make('tindak_lanjut')->required(),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
