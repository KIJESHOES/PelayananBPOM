<?php

namespace App\Filament\Resources\JenisLayanans;

use App\Filament\Resources\JenisLayanans\Pages\CreateJenisLayanan;
use App\Filament\Resources\JenisLayanans\Pages\EditJenisLayanan;
use App\Filament\Resources\JenisLayanans\Pages\ListJenisLayanans;
use App\Filament\Resources\JenisLayanans\Schemas\JenisLayananForm;
use App\Filament\Resources\JenisLayanans\Tables\JenisLayanansTable;
use App\Models\JenisLayanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Enums\NavigationGroup;

class JenisLayananResource extends Resource
{
    protected static ?string $model = JenisLayanan::class;

    protected static string|\UnitEnum|null $navigationGroup = NavigationGroup::Layanan;

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $recordTitleAttribute = 'nama_layanan';

    public static function form(Schema $schema): Schema
    {
        return JenisLayananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JenisLayanansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) JenisLayanan::count(); // total semua petugas
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info'; // warna biru, bisa: primary, success, warning, danger, info
    }

    public static function getPluralLabel(): string
    {
        return 'Jenis Layanan'; // 👈 ini buat judul halaman list
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJenisLayanans::route('/'),
            'create' => CreateJenisLayanan::route('/create'),
            'edit' => EditJenisLayanan::route('/{record}/edit'),
        ];
    }
}