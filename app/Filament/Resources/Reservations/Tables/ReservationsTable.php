<?php

namespace App\Filament\Resources\Reservations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('room.number')
                    ->label('Chambre')
                    ->sortable(),
                TextColumn::make('customer_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('customer_email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('check_in')
                    ->label('Arrivée')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('check_out')
                    ->label('Départ')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('total_amount')
                    ->label('Total')
                    ->money('EUR')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'En attente',
                        'confirmed' => 'Confirmée',
                        'cancelled' => 'Annulée',
                        default => $state,
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
