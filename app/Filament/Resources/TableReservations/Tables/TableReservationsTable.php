<?php

namespace App\Filament\Resources\TableReservations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class TableReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('customer_name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('customer_phone')
                    ->label('Téléphone')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('reservation_date')
                    ->label('Date')
                    ->date('d/m/Y')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('reservation_time')
                    ->label('Heure')
                    ->time('H:i')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('guests')
                    ->label('Convives')
                    ->numeric()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed', 'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'En attente',
                        'confirmed' => 'Confirmé',
                        'completed' => 'Terminé',
                        'cancelled' => 'Annulé',
                        default => $state,
                    }),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('reservation_date', 'desc')
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
