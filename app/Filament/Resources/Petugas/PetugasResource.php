<?php

namespace App\Filament\Resources\Petugas;

use App\Filament\Resources\Petugas\Pages\CreatePetugas;
use App\Filament\Resources\Petugas\Pages\EditPetugas;
use App\Filament\Resources\Petugas\Pages\ListPetugas;
use App\Filament\Resources\Petugas\Schemas\PetugasForm;
use App\Filament\Resources\Petugas\Tables\PetugasTable;
use App\Models\Petugas;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Enums\NavigationGroup;

class PetugasResource extends Resource
{
    protected static ?string $model = Petugas::class;

    protected static string|\UnitEnum|null $navigationGroup = NavigationGroup::MasterData;

    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;


    protected static ?string $recordTitleAttribute = 'nama_petugas';

    protected static ?string $navigationLabel = 'Petugas';

    public static function form(Schema $schema): Schema
    {
        return PetugasForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PetugasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Petugas::count(); // total semua petugas
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info'; // warna biru, bisa: primary, success, warning, danger, info
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPetugas::route('/'),
            'create' => CreatePetugas::route('/create'),
            'edit' => EditPetugas::route('/{record}/edit'),
        ];
    }
}