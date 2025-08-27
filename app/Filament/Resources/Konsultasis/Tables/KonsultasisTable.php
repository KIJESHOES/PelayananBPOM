<?php

namespace App\Filament\Resources\Konsultasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\KonsultasiMail;
use Filament\Actions\Action;


class KonsultasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('loket.nama_loket')->label('Loket')->limit(50)
                    ->wrap(),
                Tables\Columns\TextColumn::make('komoditas.nama_komoditas')->label('Komoditas')->limit(50)
                    ->wrap(),
                Tables\Columns\TextColumn::make('jenisLayanan.nama_layanan')->label('Jenis Layanan')->limit(50)
                    ->wrap(),
                Tables\Columns\TextColumn::make('petugas_nama')
                    ->label('Petugas')
                    ->getStateUsing(function ($record) {
                        // jika ada petugas dari master, pakai nama dari relasi
                        if ($record->petugas_id) {
                            return $record->petugas->nama_petugas;
                        }
                        // jika petugas manual, pakai nama manual
                        return $record->nama_petugas_manual ?? '-';
                    }),
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
                Action::make('kirimPdf')
                    ->label('Kirim PDF')
                    ->icon('heroicon-o-paper-airplane')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $pdf = Pdf::loadView('pdf.konsultasi', ['konsultasi' => $record])->output();
                        Mail::to($record->email)->send(new KonsultasiMail($record, $pdf));
                    })
                    ->color('success'),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}