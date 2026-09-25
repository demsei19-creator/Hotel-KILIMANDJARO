<?php

namespace App\Filament\Resources\Reservations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReservationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('room_id')
                    ->relationship('room', 'number')
                    ->label('Chambre')
                    ->required(),
                TextInput::make('customer_name')
                    ->label('Nom du client')
                    ->required(),
                TextInput::make('customer_email')
                    ->label('Email du client')
                    ->email()
                    ->required(),
                DatePicker::make('check_in')
                    ->label('Date d\'arrivée')
                    ->required(),
                DatePicker::make('check_out')
                    ->label('Date de départ')
                    ->required(),
                TextInput::make('total_amount')
                    ->label('Montant total')
                    ->suffix('FCFA')
                    ->required()
                    ->numeric(),
                \Filament\Forms\Components\Select::make('status')
                    ->label('Statut')
                    ->options([
                        'pending' => 'En attente',
                        'confirmed' => 'Confirmée',
                        'cancelled' => 'Annulée',
                    ])
                    ->required()
                    ->default('pending'),
            ]);
    }
}
