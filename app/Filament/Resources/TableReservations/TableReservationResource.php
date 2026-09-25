<?php

namespace App\Filament\Resources\TableReservations;

use App\Filament\Resources\TableReservations\Pages\CreateTableReservation;
use App\Filament\Resources\TableReservations\Pages\EditTableReservation;
use App\Filament\Resources\TableReservations\Pages\ListTableReservations;
use App\Filament\Resources\TableReservations\Schemas\TableReservationForm;
use App\Filament\Resources\TableReservations\Tables\TableReservationsTable;
use App\Models\TableReservation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TableReservationResource extends Resource
{
    protected static ?string $model = TableReservation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    public static function getNavigationGroup(): ?string
    {
        return 'Restaurant';
    }

    public static function getNavigationLabel(): string
    {
        return 'Réservations de Table';
    }

    public static function getModelLabel(): string
    {
        return 'Réservation';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Réservations';
    }

    public static function form(Schema $schema): Schema
    {
        return TableReservationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TableReservationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTableReservations::route('/'),
            'create' => CreateTableReservation::route('/create'),
            'edit' => EditTableReservation::route('/{record}/edit'),
        ];
    }
}
