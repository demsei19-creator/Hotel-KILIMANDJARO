<?php

namespace App\Filament\Resources\TableReservations\Schemas;

use Filament\Schemas\Schema;

class TableReservationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Group::make()
                    ->schema([
                        \Filament\Schemas\Components\TextInput::make('customer_name')
                            ->label('Nom du client')
                            ->required()
                            ->maxLength(255),
                        \Filament\Schemas\Components\TextInput::make('customer_email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        \Filament\Schemas\Components\TextInput::make('customer_phone')
                            ->label('Téléphone')
                            ->tel()
                            ->maxLength(20),
                    ])->columns(3),
                \Filament\Schemas\Components\Group::make()
                    ->schema([
                        \Filament\Schemas\Components\DatePicker::make('reservation_date')
                            ->label('Date')
                            ->required(),
                        \Filament\Schemas\Components\TimePicker::make('reservation_time')
                            ->label('Heure')
                            ->required(),
                        \Filament\Schemas\Components\TextInput::make('guests')
                            ->label('Convives')
                            ->numeric()
                            ->required()
                            ->minValue(1),
                        \Filament\Schemas\Components\Select::make('status')
                            ->label('Statut')
                            ->options([
                                'pending' => 'En attente',
                                'confirmed' => 'Confirmé',
                                'cancelled' => 'Annulé',
                                'completed' => 'Terminé',
                            ])
                            ->default('pending')
                            ->required(),
                    ])->columns(4),
            ]);
    }
}
