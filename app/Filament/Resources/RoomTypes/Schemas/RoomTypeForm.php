<?php

namespace App\Filament\Resources\RoomTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoomTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nom')
                    ->required(),
                TextInput::make('capacity')
                    ->label('Capacité')
                    ->required()
                    ->numeric(),
                TextInput::make('base_price')
                    ->label('Prix de base')
                    ->required()
                    ->numeric()
                    ->prefix('€'),
            ]);
    }
}
