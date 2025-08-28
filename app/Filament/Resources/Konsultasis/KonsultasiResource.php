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
use App\Enums\NavigationGroup;

class KonsultasiResource extends Resource
{
    protected static ?string $model = Konsultasi::class;

    protected static string|\UnitEnum|null $navigationGroup = NavigationGroup::Layanan;

    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'konsultasi';

    protected static ?string $navigationLabel = 'Permohonan Konsultasi';
    
    protected static ?string $pluralLabel = 'Permohonan Konsultasi'; // untuk tabel/index
    
    protected static ?string $modelLabel = 'Permohonan Konsultasi';  // untuk form/edit view
    
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $recordTitleAttribute = 'nama';

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

    public static function getNavigationBadge(): ?string
    {
        return (string) Konsultasi::count(); // total semua petugas
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info'; // warna biru, bisa: primary, success, warning, danger, info
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKonsultasis::route('/'),
            'edit' => EditKonsultasi::route('/{record}/edit'),
        ];
    }
}