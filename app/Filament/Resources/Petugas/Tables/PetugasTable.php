<?php

namespace App\Filament\Resources\Petugas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Actions\DeleteAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\Action;
use Filament\Tables\Enums\RecordActionsPosition;

class PetugasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_petugas')->label('Nama Petugas')->searchable(),
                Tables\Columns\ImageColumn::make('tanda_tangan_upload')
                    ->label('TTD')
                    ->circular(false)
                    ->extraAttributes([
                        'class' => 'w-20 h-10 cursor-pointer', // width & height kecil
                    ])
                    ->url(fn($record) => $record->tanda_tangan_upload ? asset('storage/' . $record->tanda_tangan_upload) : null)
                    ->openUrlInNewTab(), // klik thumbnail buka di tab baru
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),

                    Action::make('download_ttd')
                        ->label('Unduh TTD')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->url(fn($record) => $record->tanda_tangan_upload
                            ? asset('storage/' . $record->tanda_tangan_upload)
                            : null)
                        ->visible(fn($record) => filled($record->tanda_tangan_upload))
                        ->openUrlInNewTab(),


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
