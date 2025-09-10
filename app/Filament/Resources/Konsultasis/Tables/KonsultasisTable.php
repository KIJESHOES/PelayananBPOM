<?php

namespace App\Filament\Resources\Konsultasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Enums\RecordActionsPosition;
use Carbon\Carbon;

class KonsultasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->label('Email')
                    ->label('Email')
                    ->icon('heroicon-o-envelope')
                    ->badge() // tampil dalam kotak (chip/badge)
                    ->color('info') // warna biru
                    ->limit(5),

                Tables\Columns\TextColumn::make('tanggal_konsultasi')
                    ->label('Tanggal Konsultasi')
                    ->dateTime('d M Y H:i') // tampilkan tanggal + jam
                    ->sortable(),

                Tables\Columns\TextColumn::make('loket.nama_loket')->label('Loket')->limit(10)
                    ->wrap(),

                Tables\Columns\TextColumn::make('komoditas.nama_komoditas')->label('Komoditas')->limit(10)
                    ->wrap(),

                Tables\Columns\TextColumn::make('jenisLayanan.nama_layanan')->label('Jenis Layanan')->limit(10)
                    ->wrap(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn($state) => match ($state) {
                        'pending' => 'Pending',
                        'terkirim' => 'Terkirim',
                        'gagal' => 'Gagal',
                        default => $state,
                    })
                    ->badge()
                    ->colors([
                        'warning' => fn($state) => $state === 'pending',
                        'success' => fn($state) => $state === 'terkirim',
                        'danger' => fn($state) => $state === 'gagal',
                    ]),

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
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),
                    Action::make('kirimPdf')
                        ->label('Kirim PDF')
                        ->icon('heroicon-o-paper-airplane')
                        ->color('success')
                        ->requiresConfirmation()
                        ->hidden(
                            fn($record) =>
                            $record->status !== 'pending' ||
                            \Carbon\Carbon::parse($record->tanggal_konsultasi)->addHours(12)->isPast()
                        )
                        ->action(function ($record) {

                            // ambil semua admin
                            $admins = \App\Models\User::where('is_admin', true)->get();

                            try {
                                // cek 12 jam
                                if (\Carbon\Carbon::parse($record->tanggal_konsultasi)->addHours(12)->isPast() && $record->status === 'pending') {
                                    $record->status = 'gagal';
                                    $record->save();

                                    // notif database untuk semua admin
                                    foreach ($admins as $admin) {
                                        \Filament\Notifications\Notification::make()
                                            ->title('Gagal mengirim PDF')
                                            ->body('Konsultasi sudah lewat 12 jam, status otomatis gagal.')
                                            ->danger()
                                            ->sendToDatabase($admin);
                                    }

                                    // notif pop-up
                                    \Filament\Notifications\Notification::make()
                                        ->title('Gagal mengirim PDF')
                                        ->body('Konsultasi sudah lewat 12 jam, status otomatis gagal.')
                                        ->danger()
                                        ->send();

                                    return;
                                }

                                // generate PDF & kirim email
                                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.konsultasi', [
                                    'konsultasi' => $record,
                                ])->output();

                                \Illuminate\Support\Facades\Mail::to($record->email)
                                    ->send(new \App\Mail\KonsultasiMail($record, $pdf));

                                $record->status = 'terkirim';
                                $record->save();

                                // notif sukses untuk semua admin
                                foreach ($admins as $admin) {
                                    \Filament\Notifications\Notification::make()
                                        ->title('PDF berhasil dikirim')
                                        ->body('Hasil konsultasi terkirim ke: ' . $record->email)
                                        ->success()
                                        ->sendToDatabase($admin);
                                }

                                // notif pop-up
                                \Filament\Notifications\Notification::make()
                                    ->title('PDF berhasil dikirim')
                                    ->body('Hasil konsultasi terkirim ke: ' . $record->email)
                                    ->success()
                                    ->send();

                            } catch (\Exception $e) {
                                $record->status = 'gagal';
                                $record->save();

                                // notif error untuk semua admin
                                foreach ($admins as $admin) {
                                    \Filament\Notifications\Notification::make()
                                        ->title('Terjadi kesalahan')
                                        ->body('PDF gagal dikirim: ' . $e->getMessage())
                                        ->danger()
                                        ->sendToDatabase($admin);
                                }

                                // notif pop-up
                                \Filament\Notifications\Notification::make()
                                    ->title('Terjadi kesalahan')
                                    ->body('PDF gagal dikirim: ' . $e->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        }),


                    Action::make('downloadPdf')
                        ->label('Download PDF')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('gray')
                        ->action(fn($record) => response()->streamDownload(
                            fn() => print (\Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.konsultasi', [
                                'konsultasi' => $record,
                            ])->output()),
                            'konsultasi-' . preg_replace('/[^A-Za-z0-9\-]/', '', $record->nama) . '.pdf'
                        )),

                    DeleteAction::make()->label('Hapus'),
                ])
                    ->label('Aksi')
                    ->button()
                    ->size('sm')
                    ->color('gray'),
            ])
            ->recordActionsPosition(RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}