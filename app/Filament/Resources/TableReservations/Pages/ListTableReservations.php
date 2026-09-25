<?php

namespace App\Filament\Resources\TableReservations\Pages;

use App\Filament\Resources\TableReservations\TableReservationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTableReservations extends ListRecords
{
    protected static string $resource = TableReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
