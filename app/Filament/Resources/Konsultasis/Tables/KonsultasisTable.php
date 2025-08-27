<?php

namespace App\Filament\Resources\Konsultasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables;

class KonsultasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('loket.nama_loket')->label('Loket'),
                Tables\Columns\TextColumn::make('komoditas.nama_komoditas')->label('Komoditas'),
                Tables\Columns\TextColumn::make('jenisLayanan.nama_komoditas')->label('Jenis Layanan'),
                Tables\Columns\TextColumn::make('petugas.nama_petugas')->label('Petugas'),
                Tables\Columns\TextColumn::make('tanggal_konsultasi')
                    ->label('Tanggal Konsultasi')
                    ->dateTime('d M Y H:i') // tampilkan tanggal + jam
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}