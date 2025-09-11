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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components as Forms; // <-- PENTING
use Carbon\Carbon;

class KonsultasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_konsultasi')
                    ->label('Tanggal Konsultasi')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('loket.nama_loket')
                    ->label('Loket')
                    ->limit(15)
                    ->wrap(),

                Tables\Columns\TextColumn::make('jenisLayanan.nama_layanan')
                    ->label('Jenis Layanan')
                    ->limit(15)
                    ->wrap(),

                Tables\Columns\TextColumn::make('petugas_db')
                    ->label('Petugas')
                    ->getStateUsing(fn($record) => $record->petugas?->nama_petugas ?? '-')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pending' => 'Pending',
                        'terkirim' => 'Terkirim',
                        'gagal' => 'Gagal',
                        default => $state,
                    })
                    ->badge()
                    ->colors([
                        'warning' => fn ($state) => $state === 'pending',
                        'success' => fn ($state) => $state === 'terkirim',
                        'danger' => fn ($state) => $state === 'gagal',
                    ]),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->icon('heroicon-o-envelope')
                    ->badge()
                    ->color('info')
                    ->limit(10),
            ])

            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'terkirim'  => 'Terkirim',
                        'gagal'     => 'Gagal',
                    ]),

                // Filter tanggal: gunakan Forms\DatePicker di schema()
                Filter::make('tanggal')
                    ->schema([
                        Forms\DatePicker::make('dari')->label('Dari'),
                        Forms\DatePicker::make('sampai')->label('Sampai'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['dari'] ?? null, fn($q, $date) => $q->whereDate('tanggal_konsultasi', '>=', $date))
                            ->when($data['sampai'] ?? null, fn($q, $date) => $q->whereDate('tanggal_konsultasi', '<=', $date));
                    }),

                SelectFilter::make('petugas_id')
                    ->label('Petugas')
                    ->relationship('petugas', 'nama_petugas'),
            ])

            ->defaultSort('tanggal_konsultasi', 'desc') // terbaru di atas

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
                            Carbon::parse($record->tanggal_konsultasi)->addHours(12)->isPast()
                        )
                        ->action(function ($record) {
                            $admins = \App\Models\User::where('is_admin', true)->get();

                            try {
                                if (Carbon::parse($record->tanggal_konsultasi)->addHours(12)->isPast() && $record->status === 'pending') {
                                    $record->update(['status' => 'gagal']);
                                    foreach ($admins as $admin) {
                                        \Filament\Notifications\Notification::make()
                                            ->title('Gagal mengirim PDF')
                                            ->body('Konsultasi sudah lewat 12 jam, status otomatis gagal.')
                                            ->danger()
                                            ->sendToDatabase($admin);
                                    }
                                    \Filament\Notifications\Notification::make()
                                        ->title('Gagal mengirim PDF')
                                        ->body('Konsultasi sudah lewat 12 jam, status otomatis gagal.')
                                        ->danger()
                                        ->send();
                                    return;
                                }

                                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.konsultasi', [
                                    'konsultasi' => $record,
                                ])->output();

                                \Illuminate\Support\Facades\Mail::to($record->email)
                                    ->send(new \App\Mail\KonsultasiMail($record, $pdf));

                                $record->update(['status' => 'terkirim']);

                                foreach ($admins as $admin) {
                                    \Filament\Notifications\Notification::make()
                                        ->title('PDF berhasil dikirim')
                                        ->body('Hasil konsultasi terkirim ke: ' . $record->email)
                                        ->success()
                                        ->sendToDatabase($admin);
                                }

                                \Filament\Notifications\Notification::make()
                                    ->title('PDF berhasil dikirim')
                                    ->body('Hasil konsultasi terkirim ke: ' . $record->email)
                                    ->success()
                                    ->send();
                            } catch (\Exception $e) {
                                $record->update(['status' => 'gagal']);
                                foreach ($admins as $admin) {
                                    \Filament\Notifications\Notification::make()
                                        ->title('Terjadi kesalahan')
                                        ->body('PDF gagal dikirim: ' . $e->getMessage())
                                        ->danger()
                                        ->sendToDatabase($admin);
                                }
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
                            fn() => print(\Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.konsultasi', [
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

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
