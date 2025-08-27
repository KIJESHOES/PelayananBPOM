<?php

namespace App\Filament\Resources\Konsultasis;

use App\Filament\Resources\Konsultasis\Pages\EditKonsultasi;
use App\Filament\Resources\Konsultasis\Pages\ListKonsultasis;
use App\Filament\Resources\Konsultasis\Schemas\KonsultasiForm;
use App\Filament\Resources\Konsultasis\Tables\KonsultasisTable;
use App\Models\Konsultasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KonsultasiResource extends Resource
{
    protected static ?string $model = Konsultasi::class;

    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return KonsultasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KonsultasisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

        public static function getNavigationLabel(): string
    {
        return 'Permohonan Konsultasi';
    }

     public static function getLabel(): string
    {
        return 'Permohonan Konsultasi'; // 👈 ini buat judul halaman create/edit
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKonsultasis::route('/'),
            'ezzzzzzzzzzzdit' => EditKonsultasi::route('/{record}/edit'),
        ];
    }
}